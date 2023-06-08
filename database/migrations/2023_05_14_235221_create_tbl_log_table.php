<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_log', function (Blueprint $table) {

            $table->increments('log_id'); 
            $table->string('personel_id')->nullable();
            $table->string('log_time')->nullable();
            $table->string('log_description')->nullable();
            $table->string('resident_id')->nullable();
            $table->string('blotter_id')->nullable();
            $table->string('personel_added_id')->nullable();
      
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_log');
    }
}

