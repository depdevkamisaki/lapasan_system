<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGurdianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gurdian', function (Blueprint $table) {
            $table->increments('gurdian_id'); 
            $table->string('resident_id')->nullable();
            $table->string('gurdian_name')->nullable();
            $table->string('gurdian_relation')->nullable();

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
        Schema::dropIfExists('tbl_gurdian');
    }
}
