<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blotter_model extends Model
{
    use HasFactory;


    protected $table = 'tbl_blotter';
    protected $primaryKey ='blotter_id';    
    protected $fillable = ['blotter_status','blotter_date','blotter_complainant','blotter_offender','blotter_category','blotter_remarks','blotter_description','personel_id','blotter_deleted'];
}
