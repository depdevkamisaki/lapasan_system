<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOfficialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_official', function (Blueprint $table) {
            $table->increments('official_id'); 
            $table->string('official_name')->nullable();
            $table->string('official_position')->nullable();
            $table->string('official_deleted')->nullable();
            $table->string('official_sitio')->nullable();
            $table->string('official_intro')->nullable();
            $table->string('official_docs')->nullable();
            
        
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
        Schema::dropIfExists('tbl_official');
    }
}
