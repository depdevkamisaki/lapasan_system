<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class child_model extends Model
{
    use HasFactory;

    protected $table = 'tbl_child';
    protected $primaryKey ='child_id';    
    protected $fillable = ['resident_id','child_name','child_relation'];
}
