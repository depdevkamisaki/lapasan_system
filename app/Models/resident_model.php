<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_resident';
    protected $primaryKey ='resident_id';    
    protected $fillable = ['resident_firstname','resident_middlename','resident_lastname','resident_suffix','resident_birthdate','resident_gender','resident_contactnumber','resident_housenumber','resident_sitio','resident_street','resident_barangay','resident_city','resident_province','resident_zipcode','resident_occupation','resident_monthlyincome','resident_civilstatus','resident_spouse','resident_dateofresidency','resident_village','resident_srid','resident_pwdid','resident_sector','resident_image','resident_fullname','resident_deleted','resident_longitude','resident_latitude','resident_message'];
}




            
