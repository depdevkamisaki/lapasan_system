<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Str;
use PDF;


use Exception;
use Twilio\Rest\Client;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
   public function send_message_broken()
    {
        $receiverNumber = "+63 926 875 2571";
        $message = "Barangay Lapasan test Message.";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            dd('SMS Sent Successfully.');
            return back()->with('notification',"Successfully sent");
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
            return back()->with('notification',"Error: ". $e->getMessage());
        }
    }


    public function login_personel(Request $req)
    {
        if($req->input('username') == "admin" && $req->input('password') == "admin"){
            session()->put('session_admin_on',"on");
            session()->put('session_personel_id', "admin");
            session()->put('session_personel_name',"Admin");
            return redirect('/dashboard')->with('notification','Welcome');
        } 
        else{
            $personel = DB::select('select * from tbl_personel');
            $success = false;
            foreach ($personel as $per) {
                if($req->input('username') == $per->personel_username && Hash::check($req->input('password'), $per->personel_password)){
                    $success = true;
                    session()->put('session_personel_id', $per->personel_id);
                    session()->put('session_personel_name', $per->personel_name);
                    return redirect('/dashboard')->with('notification','Welcome');
                }
            }  
            
            if(!$success){
                return redirect('/')->with('notification','Wrong Credentials.');
            }
        }
    }
    
    
    
    
    public function log_out(){
        return back()->with('log_out','log_out_dat');
    }

    public function dashboard(Request $req)
    {
        if(session()->get('session_personel_id') ==""){
            return redirect('/')->with('notification','Session Expired Please Login Again.');
        }
        $resident = DB::select('select * from tbl_resident'); 
        $official = DB::select('select * from tbl_official');

        $total = 0;
        $male = 0;
        $female = 0;
        $indigent = 0;
        $pwd = 0;



        foreach ($resident as $res) {
            $total = $total + 1;
            if($res->resident_gender == "Female"){
                $female = $female + 1;
            }
            if($res->resident_gender == "Male"){
                $male = $male + 1;
            }
            if($res->resident_monthlyincome <= 10000){
                $indigent = $indigent + 1;
            }
            if($res->resident_sector == "PWD"){
                $pwd = $pwd + 1;
            }
        } 

        session()->put('total',$total);
        session()->put('male',$male); 
        session()->put('female',$female);
        session()->put('indigent',$indigent); 
        session()->put('pwd',$pwd);
        
        if($total != 0){
            session()->put('per_male',round(($male/$total)*100,0)); 
            session()->put('per_female',round(($female/$total)*100,0)); 

            session()->put('per_indigent',round(($indigent/$total)*100,0)); 
            session()->put('per_pwd',round(($pwd/$total)*100,0)); 
        }


        return view('personel.dashboard',compact('resident','official'));
    }
    
    public function upload_new_image(Request $req){
        $filename = "";
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/user_img/',$filename);
        }
        else {
                $filename = "def.png";
        }
        $data = array(
            "resident_image"=>$filename,
        );
        DB::table('tbl_resident')->insert($data);
        return back();
    }
    
    public function delete_resident(Request $req){
        DB::update('update tbl_resident set  
            resident_deleted = ?
            where resident_id = ?',
            [
                "yes",
                $req->input('resident_id')
            ]);
        
        // DB::delete('DELETE FROM tbl_resident where resident_id = ? ',[$req->input('resident_id')]);
        
        return redirect('/resident_records')->with('notification','Deleted');
    }


    public function add_resident(Request $req)
    {
        $rid = "";
        $not_resident_already = true;

        $resident_check = DB::select('select * from tbl_resident where resident_firstname = ? and resident_lastname = ? ',[$req->input('resident_firstname'), $req->input('resident_lastname')]);

        foreach($resident_check as $check){

            if($check->resident_middlename ==  $req->input('resident_middlename') && $check->resident_suffix ==  $req->input('resident_suffix') &&  $check->resident_birthdate ==  $req->input('resident_birthdate')){

                $not_resident_already = false;              
                $rid = $check->resident_id;

                session()->put('session_resident_id', $rid);
                if($check->resident_deleted == "yes"){
                   return redirect('/view_adding_bene')->with('notification','Resident Already Registered but account deleted, but you can restore it below'); 
                }
                else{
                    return redirect('/view_adding_bene')->with('notification','Resident Already Registered, But you can Update Information Below'); 
                }
            }
        }

        if($not_resident_already){
            $data = array(
                "resident_firstname"=>$req->input('resident_firstname'),
                "resident_middlename"=>$req->input('resident_middlename'),
                "resident_lastname"=>$req->input('resident_lastname'), 
                "resident_suffix"=>$req->input('resident_suffix'),  
                "resident_birthdate"=>$req->input('resident_birthdate'), 
                "resident_gender"=>$req->input('resident_gender'), 
                "resident_contactnumber"=>$req->input('resident_contactnumber'), 
                "resident_housenumber"=>$req->input('resident_housenumber'), 
                "resident_sitio"=>$req->input('resident_sitio'), 
                "resident_street"=>$req->input('resident_street'), 
                "resident_barangay"=>$req->input('resident_barangay'), 
                "resident_village"=>$req->input('resident_village'), 
                "resident_city"=>$req->input('resident_city'), 
                "resident_province"=>$req->input('resident_province'), 
                "resident_zipcode"=>$req->input('resident_zipcode'), 
                "resident_srid"=>$req->input('resident_srid'), 
                "resident_occupation"=>$req->input('resident_occupation'), 
                "resident_civilstatus"=>$req->input('resident_civilstatus'), 
                "resident_spouse"=>$req->input('resident_spouse'), 
                "resident_monthlyincome"=>$req->input('resident_monthlyincome'), 
                "resident_dateofresidency"=>$req->input('resident_dateofresidency'), 
                "resident_sector"=>$req->input('resident_sector'), 
                "resident_pwdid"=>$req->input('resident_pwdid'), 
                "resident_fullname"=>Str::lower($req->input('resident_lastname'))." ".Str::lower($req->input('resident_firstname'))." ".Str::lower($req->input('resident_middlename'))." ".Str::lower($req->input('resident_suffix')), 
                "resident_longitude"=>$req->input('resident_longitude_name'), 
                "resident_latitude"=>$req->input('resident_latitude_name'), 
            );
            DB::table('tbl_resident')->insert($data);

            $resident_new = DB::select('select * from tbl_resident where resident_firstname = ? and resident_lastname = ? ',[$req->input('resident_firstname'), $req->input('resident_lastname')]);
            $new_res_id  = "";

        
            foreach($resident_new as $check2){
                if($check2->resident_middlename ==  $req->input('resident_middlename') && $check2->resident_suffix ==  $req->input('resident_suffix') &&  $check2->resident_birthdate ==  $req->input('resident_birthdate')){
                    $new_res_id = $check2->resident_id;
                }
            }


            session()->put('session_resident_id', $new_res_id);
            
            return redirect('/view_adding_bene')->with('notification','Resident Added');
        }


    }

    public function view_adding_bene(Request $req)
    {
        $res_id = session()->get('session_resident_id');


        $resident = DB::select('select * from tbl_resident where resident_id = ? ',[$res_id]); 
        $child = DB::select('select * from tbl_child where resident_id = ? ',[$res_id]);
        $gurdian = DB::select('select * from tbl_gurdian where resident_id = ? ',[$res_id]);
        return view('personel.adding_bene_resident_page', compact('resident','child','gurdian'));
    }


    public function finish_adding_resident()
    {
        // ==============================================
        $time_now = Carbon::now()->toDateTimeString();
        $data = array(
            "personel_id"=>session()->get('session_personel_id'),
            "log_time"=>$time_now,
            "log_description"=>"Added a new Resident",  
            "resident_id"=>session()->get('session_resident_id'),
        );
        DB::table('tbl_log')->insert($data);  
        // ===============================================

        return redirect('/dashboard')->with('notification','Resident Registration Success.');
    }


    public function save_resident(Request $req)
    {
        DB::update('update tbl_resident set  
            resident_firstname = ?,
            resident_middlename = ?,
            resident_lastname = ?,
            resident_suffix = ?,
            resident_birthdate = ?,
            resident_gender = ?,
            resident_contactnumber = ?,
            resident_housenumber = ?,
            resident_sitio = ?,
            resident_street = ?,
            resident_barangay = ?,
            resident_village = ?,
            resident_city = ?,
            resident_province = ?,
            resident_zipcode = ?,
            resident_srid = ?,
            resident_occupation = ?,
            resident_civilstatus = ?,
            resident_spouse = ?,
            resident_monthlyincome = ?,
            resident_dateofresidency = ?,
            resident_sector = ?,
            resident_pwdid = ?,
            resident_fullname = ?,
            resident_longitude = ?,
            resident_latitude = ?
            where resident_id = ?',
             [
                $req->input('resident_firstname'),
                $req->input('resident_middlename'),
                $req->input('resident_lastname'),
                $req->input('resident_suffix'),
                $req->input('resident_birthdate'),
                $req->input('resident_gender'),
                $req->input('resident_contactnumber'),
                $req->input('resident_housenumber'),
                $req->input('resident_sitio'),
                $req->input('resident_street'),
                $req->input('resident_barangay'),
                $req->input('resident_village'),
                $req->input('resident_city'),
                $req->input('resident_province'),
                $req->input('resident_zipcode'),
                $req->input('resident_srid'),
                $req->input('resident_occupation'),
                $req->input('resident_civilstatus'),
                $req->input('resident_spouse'),
                $req->input('resident_monthlyincome'),
                $req->input('resident_dateofresidency'),
                $req->input('resident_sector'),
                $req->input('resident_pwdid'),
                Str::lower($req->input('resident_lastname'))." ".Str::lower($req->input('resident_firstname'))." ".Str::lower($req->input('resident_middlename'))." ".Str::lower($req->input('resident_suffix')), 
                $req->input('resident_longitude_name'),
                $req->input('resident_latitude_name'),
                $req->input('resident_id')
        ]);

        return back()->with('notification','Information Saved')->with('notification','Information Updated');
    }



    public function save_resident_info(Request $req)
    {
        DB::update('update tbl_resident set  
            resident_firstname = ?,
            resident_middlename = ?,
            resident_lastname = ?,
            resident_suffix = ?,
            resident_birthdate = ?,
            resident_gender = ?,
            resident_contactnumber = ?,
            resident_housenumber = ?,
            resident_sitio = ?,
            resident_street = ?,
            resident_barangay = ?,
            resident_village = ?,
            resident_city = ?,
            resident_province = ?,
            resident_zipcode = ?,
            resident_srid = ?,
            resident_occupation = ?,
            resident_civilstatus = ?,
            resident_spouse = ?,
            resident_monthlyincome = ?,
            resident_dateofresidency = ?,
            resident_sector = ?,
            resident_pwdid = ?,
            resident_fullname = ?,
            resident_longitude = ?,
            resident_latitude = ?
            where resident_id = ?',
             [
                $req->input('resident_firstname'),
                $req->input('resident_middlename'),
                $req->input('resident_lastname'),
                $req->input('resident_suffix'),
                $req->input('resident_birthdate'),
                $req->input('resident_gender'),
                $req->input('resident_contactnumber'),
                $req->input('resident_housenumber'),
                $req->input('resident_sitio'),
                $req->input('resident_street'),
                $req->input('resident_barangay'),
                $req->input('resident_village'),
                $req->input('resident_city'),
                $req->input('resident_province'),
                $req->input('resident_zipcode'),
                $req->input('resident_srid'),
                $req->input('resident_occupation'),
                $req->input('resident_civilstatus'),
                $req->input('resident_spouse'),
                $req->input('resident_monthlyincome'),
                $req->input('resident_dateofresidency'),
                $req->input('resident_sector'),
                $req->input('resident_pwdid'),
                Str::lower($req->input('resident_lastname'))." ".Str::lower($req->input('resident_firstname'))." ".Str::lower($req->input('resident_middlename'))." ".Str::lower($req->input('resident_suffix')), 
                $req->input('resident_longitude_name'),
                $req->input('resident_latitude_name'),
                $req->input('resident_id')
        ]);




        return redirect('/view_resident_after_session_set')->with('notification','Information Updated');
    }
    

    public function add_child(Request $req)
    {
        $data = array(
            "resident_id"=>$req->input('resident_id'),
            "child_name"=>$req->input('child_name'),  
        );
        DB::table('tbl_child')->insert($data); 

        // return redirect('view_adding_bene/#bottom');  
        return back()->with('notification','Child Added');     
    }

    public function add_gurdian(Request $req)
    {
        $data = array(
            "resident_id"=>$req->input('resident_id'),
            "gurdian_name"=>$req->input('gurdian_name'),
            "gurdian_relation"=>$req->input('gurdian_relation'),  

        );
        DB::table('tbl_gurdian')->insert($data); 

        // return redirect('view_adding_bene/#bottom'); 
        return back()->with('notification','Gurdian Added');      
               
    }



    public function delete_child(Request $req)
    {
        DB::delete('DELETE FROM tbl_child where child_id = ? ',[$req->input('child_id')]);
        // return redirect('view_adding_bene/#bottom'); 
        return back();      
        
    }

    public function delete_gurdian(Request $req)
    {

        DB::delete('DELETE FROM tbl_gurdian where gurdian_id = ? ',[$req->input('gurdian_id')]);
        // return redirect('view_adding_bene/#bottom');    
        return back();   
         
    }



    public function discard_adding_resident(Request $req)
    {
        DB::delete('DELETE FROM tbl_resident where resident_id = ? ',[$req->input('resident_id')]);

        DB::delete('DELETE FROM tbl_child where resident_id = ? ',[$req->input('resident_id')]);

        DB::delete('DELETE FROM tbl_gurdian where resident_id = ? ',[$req->input('resident_id')]);
   
        return Redirect('/new_resident')->with('notification','Registration Cancelled'); 
    }


    public function update_image_resident(Request $req)
    {
        $filename = "";
            if($req->hasfile('image')){
                $file = $req->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/user_img/',$filename);
            }
            else {
                    $filename = "def.png";
            }
            DB::update('update tbl_resident set  
            resident_image = ?
            where resident_id = ?',
             [
                $filename ,
                $req->input('resident_id')
        ]);

        return back()->with('notification','Image Updated.');

    }


    public function resident_records()
    {
        $residents = DB::select('select * from tbl_resident order by resident_fullname asc');

        return view('personel.resident_records',compact('residents'));
    }


    public function messaging()
    {
        $residents =  DB::table('tbl_resident')
        ->paginate(10);


        $residents_selected =  DB::table('tbl_resident')
        ->where('resident_message','LIKE','%'."yes".'%')
        ->get();

        return view('personel.message_resident',compact('residents','residents_selected'));
    }




    public function add_to_recepient(Request $req)
    {
            DB::update('update tbl_resident set 
            resident_message = ?
            where resident_id = ?',
             [
                "yes",
                $req->input('resident_id')
        ]);
        return back();
    }

    public function remove_to_recepient(Request $req)
    {
            DB::update('update tbl_resident set 
            resident_message = ?
            where resident_id = ?',
            [
                "",
            $req->input('resident_id')
        ]);
        return back();
    }


    public function remove_all_re(Request $req)
    {
        DB::update('update tbl_resident set 
            resident_message = ?
            where resident_message = ?',
            [
                "",
                "yes"
        ]);
        return back();
    }


    public function send_message(Request $req)
    {
        $message_in = $req->input('message');
        if($req->input('type') == "multiple"){
            $residents = DB::select('select * from tbl_resident where resident_message = ?',["yes"]);
            foreach ($residents as $res) {
                // ==============================
                // "+63 926 875 2571"
                $receiverNumber = $res->resident_contactnumber;
                $message = $message_in;
          
                try {
          
                    $account_sid = getenv("TWILIO_SID");
                    $auth_token = getenv("TWILIO_TOKEN");
                    $twilio_number = getenv("TWILIO_FROM");
          
                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create($receiverNumber, [
                        'from' => $twilio_number, 
                        'body' => $message]);
          
                    // dd('SMS Sent Successfully.');
                    // return back()->with('notification',"Successfully sent");
          
                } catch (Exception $e) {
                    // dd("Error: ". $e->getMessage());
                    // return back()->with('notification',"Error: ". $e->getMessage());
                }
                        // ===============================
            }
            // dd('SMS Sent Successfully.');
            return back()->with('notification',"Successfully sent");
        }

        if($req->input('type') == "single"){
            
                // ==============================
                // "+63 926 875 2571"
                $receiverNumber = $req->input('resident_contactnumber');
                $message = $message_in;
          
                try {
          
                    $account_sid = getenv("TWILIO_SID");
                    $auth_token = getenv("TWILIO_TOKEN");
                    $twilio_number = getenv("TWILIO_FROM");
          
                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create($receiverNumber, [
                        'from' => $twilio_number, 
                        'body' => $message]);
          
                    // dd('SMS Sent Successfully.');
                    // return back()->with('notification',"Successfully sent");
          
                } catch (Exception $e) {
                    // dd("Error: ". $e->getMessage());
                    // return back()->with('notification',"Error: ". $e->getMessage());
                }
                        // ===============================
            
            // dd('SMS Sent Successfully.');
            return back()->with('notification',"Successfully sent");
        }
    }

    public function single_message(Request $req)
    {
        $resident = DB::select('select * from tbl_resident where resident_id = ?',[$req->input('resident_id')]);
        return view('personel.resident_message',compact('resident'));
    }   

    

    

    public function resident_records_bin()
    {
        $residents = DB::select('select * from tbl_resident order by resident_fullname asc');

        return view('personel.resident_records_bin',compact('residents'));
    }

    

    public function view_resident(Request $req)
    {
        $res_id = $req->input('resident_id');
        session()->put('session_current_resident_id',$res_id);

        return redirect('/view_resident_after_session_set');
    }


    public function view_resident_after_session_set()
    {
        $res_id = session()->get('session_current_resident_id');
        $resident = DB::select('select * from tbl_resident where resident_id = ? ',[$res_id]); 
        $child = DB::select('select * from tbl_child where resident_id = ? ',[$res_id]);
        $gurdian = DB::select('select * from tbl_gurdian where resident_id = ? ',[$res_id]);
        return view('personel.resident_info', compact('resident','child','gurdian'));
    }

    public function search_resident(Request $req)
    {
        $residents = DB::table('tbl_resident')
        ->where('resident_fullname','LIKE','%'.$req->input('search').'%')
        ->get();
        return view('personel.resident_records',compact('residents'));
    }


    public function search_blotter(Request $req)
    {
        if(session()->get('session_current_blotter_stat') == "unsettled"){
            $blotter = DB::table('tbl_blotter')
            ->where('blotter_complainant','LIKE','%'.$req->input('search').'%')
            ->where('blotter_status','Not Settled')
            ->paginate(10);
            return view('personel.blotter_records_page',compact('blotter'));
        }
        if(session()->get('session_current_blotter_stat') == "settled"){
            $blotter = DB::table('tbl_blotter')
            ->where('blotter_complainant','LIKE','%'.$req->input('search').'%')
            ->where('blotter_status','Settled')
            ->paginate(10);
            return view('personel.blotter_records_page',compact('blotter'));
        }
    }


    public function blotter_records_unsettled()
    {
        session()->put('session_current_blotter_stat','unsettled');
        $blotter = DB::table('tbl_blotter')
        ->where('blotter_status','Not Settled')
        ->orderBy('blotter_id','desc')->paginate(5);

        return view('personel.blotter_records_page',compact('blotter'));
    }

    public function blotter_records_settled()
    {
        session()->put('session_current_blotter_stat','settled');
        $blotter = DB::table('tbl_blotter')
        ->where('blotter_status','Settled')
        ->orderBy('blotter_id','desc')->paginate(5);

        return view('personel.blotter_records_page',compact('blotter'));
    }

    public function open_new_blotter(Request $req)
    {
        return view('personel.new_blotter');
    }

    public function blotter_info(Request $req)
    {
        $blotter = DB::select('select * from tbl_blotter where blotter_id = ?',[$req->input('blotter_id')]);
        return view('personel.blotter_info',compact('blotter'));
    }

    public function add_blotter(Request $req)
    {
        $data = array(
            "blotter_complainant"=>$req->input('blotter_complainant'),
            "blotter_offender"=>$req->input('blotter_offender'),
            "blotter_remarks"=>$req->input('blotter_remarks'),  
            "blotter_date"=>$req->input('blotter_date'),  
            "blotter_status"=>$req->input('blotter_status'),
            "blotter_category"=>$req->input('blotter_category'),  
            "blotter_description"=>$req->input('blotter_description'),  
            "personel_id"=>"",
        );
        DB::table('tbl_blotter')->insert($data);

         // ==============================================
        $time_now = Carbon::now()->toDateTimeString();
        $data = array(
            "personel_id"=>session()->get('session_personel_id'),
            "log_time"=>$time_now,
            "log_description"=>"Added a new Blotter Complainant:" . $req->input('blotter_complainant')." Offender: ".$req->input('blotter_offender'), 
            "blotter_id"=>"New Blotter",

        );
        DB::table('tbl_log')->insert($data);  
        // ===============================================

        return back()->with('notification','Blotter Added');
    }




    public function save_blotter_info(Request $req)
    {
        DB::update('update tbl_blotter set 
            blotter_status = ?,
            blotter_date = ?,
            blotter_complainant = ?,
            blotter_offender = ?,
            blotter_category = ?,
            blotter_remarks = ?,
            blotter_description = ?
            where blotter_id = ?',
             [
                $req->input('blotter_status'),
                $req->input('blotter_date'),
                $req->input('blotter_complainant'),
                $req->input('blotter_offender'),
                $req->input('blotter_category'),
                $req->input('blotter_remarks'),
                $req->input('blotter_description'),
                $req->input('blotter_id')
        ]);

        return back()->with('notification','Blotter Info updated!');
    }

    public function delete_blotter(Request $req)
    {
        DB::update('update tbl_blotter set  
            blotter_deleted = ?
            where blotter_id = ?',
            [
                "yes",
                $req->input('blotter_id')
        ]);
        // DB::delete('DELETE FROM tbl_blotter where blotter_id = ? ',[$req->input('blotter_id')]);
        return redirect('/blotter_records')->with('notification','Deleted'); 
    }



    public function request_documents()
    {
        return view('personel.file_menu');
    }

    public function open_barangay_indigency()
    {
        session()->put('session_document_name',"indigency");
        return redirect('/search_for_request_document_');
    }

    public function open_barangay_clearance()
    {
        session()->put('session_document_name',"clearance");
        return redirect('/search_for_request_document_');
    }

    public function open_barangay_residency()
    {
        session()->put('session_document_name',"residency");
        return redirect('/search_for_request_document_');
    }

// ===============================================


    public function open_barangay_indigency_v2()
    {
        session()->put('session_document_name',"indigency");
        return redirect('/rq_document_resident_official_template');
    }

    public function open_barangay_clearance_v2()
    {
        session()->put('session_document_name',"clearance");
        return redirect('/rq_document_resident_official_template');
    }

    public function open_barangay_residency_v2()
    {
        session()->put('session_document_name',"residency");
        return redirect('/rq_document_resident_official_template');
    }
    
    public function rq_document_resident_official_template(){
        $resident = DB::select('select * from tbl_resident order by resident_fullname asc');
        $officials = DB::select('select * from tbl_official');
        $position = DB::select('select distinct(official_position) from tbl_official order by official_position asc');
        
        
        return view('personel.request_document_page_all_in_one',compact('resident','officials','position'));
    }
    
    
    public function search_resident_for_document_v2(Request $req){
        $resident = DB::table('tbl_resident')
        ->where('resident_fullname','LIKE','%'.$req->input('search').'%')
        ->get();
        $officials = DB::select('select * from tbl_official');
        $position = DB::select('select distinct(official_position) from tbl_official order by official_position asc');
        return view('personel.request_document_page_all_in_one',compact('resident','officials','position'));
    }
    
    public function set_resident_for_document_request(Request $req){
        
       
        session()->put('session_resident_for_document_v2',$req->input('resident_id'));
        return back();
    }

    public function set_official_for_document_request(Request $req){
        session()->put('session_official_name_for_document_v2',$req->input('official_name'));
        session()->put('session_official_position_for_document_v2',$req->input('official_position'));
        return back();
    }
    
    public function set_document_template_v2_def(){
        session()->put('session_template_for_document_v2',"default");
        return back();
    }
    

// ===============================================


    public function search_for_request_document_()
    {
        $resident = DB::select('select * from tbl_resident');
        return view('personel.search_for_request_document_page',compact('resident'));
    }

    public function search_for_document_request_1(Request $req)
    {
        $resident = DB::table('tbl_resident')
        ->where('resident_fullname','LIKE','%'.$req->input('search').'%')
        ->get();
        return view('personel.search_for_request_document_page',compact('resident'));
    }

    public function assign_official_session(Request $req)
    {
        session()->put('session_official_name',$req->input('official_name'));
        session()->put('session_official_position',$req->input('official_position'));

        return back();
    }

    public function open_for_document_official_select(Request $req)
    {
        session()->put('session_resident_id_for_document',$req->input('resident_id'));
        $position = DB::select('select distinct(official_position) from tbl_official');
        $officials = DB::select('select * from tbl_official');
        return view('personel.official_select_for_document',compact('officials','position'));
    }

    public function add_sitio_leader(Request $req)
    {
        $data = array(
            "official_name"=>$req->input('official_name'),
            "official_position"=>"Sitio Leader",
            "official_sitio"=>$req->input('official_sitio'),  

        );
        DB::table('tbl_official')->insert($data);

        return back()->with('notification','Sitio Leader Added');
    }




    public function final_printing(Request $req)
    {
        

        session()->put('session_document_purpose',$req->input('purpose'));
        session()->put('session_document_remarks',$req->input('remarks'));

        if(session()->get('session_document_name') == "indigency"){
            $resident = DB::select('select * from tbl_resident where resident_id = ?',[session()->get('session_resident_id_for_document')]);
            return view('personel.barangay_indigency',compact('resident'));
        }

        if(session()->get('session_document_name') == "clearance"){
            $resident = DB::select('select * from tbl_resident where resident_id = ?',[session()->get('session_resident_id_for_document')]);
            return view('personel.barangay_clearance',compact('resident'));
        }

        if(session()->get('session_document_name') == "residency"){
            $resident = DB::select('select * from tbl_resident where resident_id = ?',[session()->get('session_resident_id_for_document')]);
            return view('personel.barangay_residency',compact('resident'));
        }

    }


    public function generatePDF()
    {
        $resident = DB::select('select * from tbl_resident where resident_id = ?',[session()->get('session_resident_id_for_document')]);
        $official = DB::select('select * from tbl_official');

        $image = base64_encode(file_get_contents(public_path('uploads/user_img/Picture1.png')));
        $pdf = PDF::loadView('personel.barangay_indigency',compact('resident','image'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('itsolutionstuff.pdf');
    }







// ----------------------------------------------------------------

    public function open_new_personel(Request $req)
    {
        $personel = DB::select('select * from tbl_personel');
    	return view('admin.new_personel',compact('personel'));
    }

    public function save_personel(Request $req)
    {
        DB::update('update tbl_personel set  
            personel_name = ?,
            personel_username = ?,
            personel_password =? 
            where personel_id = ?',
             [
                $req->input('personel_name'),
                $req->input('personel_username'),
                Hash::make($req->input('personel_password')),  
                $req->input('personel_id')
        ]);

        return back()->with('notification','Personel Info Updated.');
    }
    public function add_personel(Request $req)
    { 
        if(session()->get('session_admin_on') == ""){
            return back()->with('notification','You are not Logged in As Admin');
        }
        

        $data = array(
            "personel_name"=>$req->input('personel_name'),
            "personel_username"=>$req->input('personel_username'),
            "personel_password"=>Hash::make($req->input('personel_password')),  
        );
        DB::table('tbl_personel')->insert($data);
        return back()->with('notification','Personel Added');
    }

    public function delete_personel(Request $req)
    {
        DB::delete('DELETE FROM tbl_personel where personel_id = ? ',[$req->input('personel_id')]);
        return back(); 
    }


    public function open_new_official(Request $req)
    {
        $official = DB::select('select * from tbl_official');
        return view('admin.new_official',compact('official'));
    }

    public function add_official(Request $req)
    { 
        $data = array(
            "official_name"=>$req->input('official_name'),
            "official_position"=>$req->input('official_position'),  
        );
        DB::table('tbl_official')->insert($data);
        return back()->with('notification','Official Added');
    }


    public function save_official(Request $req)
    {
        DB::update('update tbl_official set  
            official_name = ?,
            official_position = ?
            where official_id = ?',
             [
                $req->input('official_name'),
                $req->input('official_position'),  
                $req->input('official_id')
        ]);
        return back()->with('notification','Official Info Updated.');

    }


    public function save_sitio_leader(Request $req)
    {
        DB::update('update tbl_official set  
            official_name = ?,
            official_sitio = ?
            where official_id = ?',
             [
                $req->input('official_name'),
                $req->input('official_sitio'),  
                $req->input('official_id')
        ]);
        return back()->with('notification','Leader Info Updated.');

    }

    public function delete_official(Request $req)
    {
        DB::update('update tbl_official set  
            official_deleted = ?
            where official_id = ?',
            [
                "yes",
                $req->input('official_id')
        ]);
        // DB::delete('DELETE FROM tbl_official where official_id = ? ',[$req->input('official_id')]);
        return back()->with('notification','Deleted.');
    }


    public function settings_page(Request $req)
    {

        if(session()->get('session_personel_id') ==""){
            return redirect('/')->with('notification','Session Expired Please Login Again.');
        }
        $resident = DB::select('select * from tbl_resident'); 
        

        $total = 0;
        $male = 0;
        $female = 0;
        $indigent = 0;
        $pwd = 0;

        foreach ($resident as $res) {
            $total = $total + 1;
            if($res->resident_gender == "Female"){
                $female = $female + 1;
            }
            if($res->resident_gender == "Male"){
                $male = $male + 1;
            }
            if($res->resident_monthlyincome <= 10000){
                $indigent = $indigent + 1;
            }
            if($res->resident_sector == "PWD"){
                $pwd = $pwd + 1;
            }
        } 

        session()->put('total',$total);
        session()->put('male',$male); 
        session()->put('female',$female);
        session()->put('indigent',$indigent); 
        session()->put('pwd',$pwd);
        
        if($total != 0){
            session()->put('per_male',round(($male/$total)*100,0)); 
            session()->put('per_female',round(($female/$total)*100,0)); 

            session()->put('per_indigent',round(($indigent/$total)*100,0)); 
            session()->put('per_pwd',round(($pwd/$total)*100,0)); 
        }

        $log = DB::table('tbl_log')->orderBy('log_id','desc')->paginate(5);
        $official = DB::table('tbl_official')->orderBy('official_id','desc')->paginate(5);
        $personel = DB::table('tbl_personel')->orderBy('personel_id','desc')->paginate(5);



        return view('personel.settings',compact('log','official','personel'));
    }


    public function welcome_()
    {
        session()->put('session_admin_on',"");
        return view('welcome');
    }
    
    
    public function restore_data(Request $req){
        $type = $req->input('data_type');
        
        
        if($type == "resident"){
            DB::update('update tbl_resident set  
            resident_deleted = ?
            where resident_id = ?',
            [
                "",
                $req->input('resident_id')
            ]);
            return back()->with('notification','Resident Information Restored.');
        }

        if($type == "blotter"){
            DB::update('update tbl_blotter set  
            blotter_deleted = ?
            where blotter_id = ?',
            [
                "",
                $req->input('blotter_id')
            ]);
            return back()->with('notification','Resident Information Restored.');
        }

        if($type == "official"){
            DB::update('update tbl_official set  
            official_deleted = ?
            where official_id = ?',
            [
                "",
                $req->input('official_id')
            ]);
            return back()->with('notification','Resident Information Restored.');
        }
        
        
        
        
    }




      




// ------------------------
}
