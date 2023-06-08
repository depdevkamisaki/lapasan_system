<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personel_model extends Model
{
    use HasFactory;
    protected $table = 'tbl_personel';
    protected $primaryKey ='personel_id';    
    protected $fillable = ['personel_name','personel_username','personel_password'];
}
