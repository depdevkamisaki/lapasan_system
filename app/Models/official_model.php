<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class official_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_official';
    protected $primaryKey ='official_id';    
    protected $fillable = ['official_name','official_position','official_deleted','official_sitio','official_intro','official_docs'];
}