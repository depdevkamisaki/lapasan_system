<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_log';
    protected $primaryKey ='log_id';    
    protected $fillable = ['personel_id','log_time','log_description','resident_id','blotter_id','personel_added_id'];
}
