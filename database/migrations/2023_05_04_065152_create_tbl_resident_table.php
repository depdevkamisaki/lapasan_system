<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblResidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_resident', function (Blueprint $table) {

            $table->increments('resident_id'); 
            $table->string('resident_firstname')->nullable();
            $table->string('resident_middlename')->nullable();
            $table->string('resident_lastname')->nullable();
            $table->string('resident_suffix')->nullable();
            $table->string('resident_birthdate')->nullable();
            $table->string('resident_gender')->nullable();
            $table->string('resident_contactnumber')->nullable();
            $table->string('resident_housenumber')->nullable();
            $table->string('resident_sitio')->nullable();
            $table->string('resident_street')->nullable();
            $table->string('resident_barangay')->nullable();
            $table->string('resident_village')->nullable();
            $table->string('resident_city')->nullable();
            $table->string('resident_province')->nullable();
            $table->string('resident_zipcode')->nullable();
            $table->string('resident_occupation')->nullable();
            $table->string('resident_monthlyincome')->nullable();
            $table->string('resident_civilstatus')->nullable();
            $table->string('resident_spouse')->nullable();
            $table->string('resident_dateofresidency')->nullable();
            $table->string('resident_sector')->nullable();
            $table->string('resident_pwdid')->nullable();
            $table->string('resident_srid')->nullable();
            $table->string('resident_fullname')->nullable();
            $table->string('resident_deleted')->nullable();
            $table->string('resident_longitude')->nullable();
            $table->string('resident_latitude')->nullable();
            $table->mediumText('resident_image')->nullable();
            $table->string('resident_message')->nullable();






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
        Schema::dropIfExists('tbl_resident');
    }
}
