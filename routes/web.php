<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Controller::class, 'welcome_']);

Route::get('/login_personel', [Controller::class, 'login_personel']);

Route::get('/log_out', [Controller::class, 'log_out']);


// =========================================
Route::get('/new_resident', function () {
    return view('personel.new_resident_page');
});

Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::get('/restore_data', [Controller::class, 'restore_data']);

Route::get('/send_message', [Controller::class, 'send_message']);



Route::get('/add_resident', [Controller::class, 'add_resident']);
Route::get('/discard_adding_resident', [Controller::class, 'discard_adding_resident']);
Route::get('/save_resident', [Controller::class, 'save_resident']);

Route::get('/save_resident_info', [Controller::class, 'save_resident_info']);
Route::get('/view_resident_after_session_set', [Controller::class, 'view_resident_after_session_set']);



Route::get('/finish_adding_resident', [Controller::class, 'finish_adding_resident']);
Route::post('/update_image_resident', [Controller::class, 'update_image_resident']);
Route::get('/view_adding_bene', [Controller::class, 'view_adding_bene']);
Route::get('/delete_resident', [Controller::class, 'delete_resident']);
// Route::post('/upload_new_image', [Controller::class, 'upload_new_image']);



Route::get('/resident_records', [Controller::class, 'resident_records']);
Route::get('/view_resident', [Controller::class, 'view_resident']);
Route::get('/search_resident', [Controller::class, 'search_resident']);


Route::get('/resident_records_bin', [Controller::class, 'resident_records_bin']);



// ================================= v2 ========================
Route::get('/search_resident_for_document_v2', [Controller::class, 'search_resident_for_document_v2']);
Route::get('/set_resident_for_document_request', [Controller::class, 'set_resident_for_document_request']);
Route::get('/set_official_for_document_request', [Controller::class, 'set_official_for_document_request']);
Route::get('/set_document_template_v2_def', [Controller::class, 'set_document_template_v2_def']);

Route::get('/open_barangay_indigency_v2', [Controller::class, 'open_barangay_indigency_v2']);
Route::get('/open_barangay_clearance_v2', [Controller::class, 'open_barangay_clearance_v2']);
Route::get('/open_barangay_residency_v2', [Controller::class, 'open_barangay_residency_v2']);

// ===============================================================







Route::get('/add_child', [Controller::class, 'add_child']);
Route::get('/delete_child', [Controller::class, 'delete_child']);
Route::get('/add_gurdian', [Controller::class, 'add_gurdian']);
Route::get('/delete_gurdian', [Controller::class, 'delete_gurdian']);




Route::get('/blotter_records_unsettled', [Controller::class, 'blotter_records_unsettled']);
Route::get('/blotter_records_settled', [Controller::class, 'blotter_records_settled']);


Route::get('/add_blotter', [Controller::class, 'add_blotter']);
Route::get('/open_new_blotter', [Controller::class, 'open_new_blotter']);
Route::get('/blotter_info', [Controller::class, 'blotter_info']);
Route::get('/save_blotter_info', [Controller::class, 'save_blotter_info']);
Route::get('/delete_blotter', [Controller::class, 'delete_blotter']);
Route::get('/search_blotter', [Controller::class, 'search_blotter']);




Route::get('/request_documents', [Controller::class, 'request_documents']);


Route::get('/open_barangay_indigency', [Controller::class, 'open_barangay_indigency']);
Route::get('/open_barangay_clearance', [Controller::class, 'open_barangay_clearance']);
Route::get('/open_barangay_residency', [Controller::class, 'open_barangay_residency']);





Route::get('/rq_document_resident_official_template', [Controller::class, 'rq_document_resident_official_template']);




Route::get('/assign_official_session', [Controller::class, 'assign_official_session']);

Route::get('/final_printing', [Controller::class, 'final_printing']);




Route::get('generate-pdf', [Controller::class, 'generatePDF']);



Route::get('/search_for_request_document_', [Controller::class, 'search_for_request_document_']);
Route::get('/open_for_document_official_select', [Controller::class, 'open_for_document_official_select']);


// Route::get('/open_for_document_print', [Controller::class, 'open_for_document_print']);

Route::get('/search_for_document_request_1', [Controller::class, 'search_for_document_request_1']);
// Route::get('/search_for_document_request_2', [Controller::class, 'search_for_document_request_2']);







// =========================================



Route::get('/open_new_personel', [Controller::class, 'open_new_personel']);
Route::get('/add_personel', [Controller::class, 'add_personel']);
Route::get('/save_personel', [Controller::class, 'save_personel']);
Route::get('/delete_personel', [Controller::class, 'delete_personel']);


Route::get('/settings_page', [Controller::class, 'settings_page']);

Route::get('/add_sitio_leader', [Controller::class, 'add_sitio_leader']);

Route::get('/save_sitio_leader', [Controller::class, 'save_sitio_leader']);


Route::get('/messaging', [Controller::class, 'messaging']);
Route::get('/add_to_recepient', [Controller::class, 'add_to_recepient']);

Route::get('/remove_to_recepient', [Controller::class, 'remove_to_recepient']);

Route::get('/remove_all_re', [Controller::class, 'remove_all_re']);


Route::get('/send_message', [Controller::class, 'send_message']);


Route::get('/single_message', [Controller::class, 'single_message']);






Route::get('/open_new_official', [Controller::class, 'open_new_official']);
Route::get('/save_official', [Controller::class, 'save_official']);
Route::get('/add_official', [Controller::class, 'add_official']);
Route::get('/delete_official', [Controller::class, 'delete_official']);
