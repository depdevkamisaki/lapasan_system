<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBlotterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_blotter', function (Blueprint $table) {

            $table->increments('blotter_id'); 
            $table->string('blotter_status')->nullable();

            $table->string('blotter_date')->nullable();
            $table->string('blotter_complainant')->nullable();
            $table->string('blotter_offender')->nullable();
            $table->string('blotter_category')->nullable();
            $table->mediumText('blotter_remarks')->nullable();
            $table->mediumText('blotter_description')->nullable();
            $table->mediumText('blotter_deleted')->nullable();
            $table->string('personel_id')->nullable();



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
        Schema::dropIfExists('tbl_blotter');
    }
}


