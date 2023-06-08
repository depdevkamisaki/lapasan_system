<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gurdian_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_gurdian';
    protected $primaryKey ='gurdian_id';    
    protected $fillable = ['resident_id','gurdian_name','gurdian_relation'];
}
