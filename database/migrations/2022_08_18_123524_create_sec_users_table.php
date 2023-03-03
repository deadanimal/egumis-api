<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_users', function (Blueprint $table) {
            $table->id();
            $table->integer('userEntity_id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('full_name')->nullable();
            $table->string('activation_email')->nullable();
            $table->string('active_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('claimant_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('country')->nullable();
            $table->date('dob')->nullable();
            $table->string('fax_no')->nullable();
            $table->boolean('first_login')->nullable();
            $table->string('gender')->nullable();
            $table->string('home_no')->nullable();
            $table->string('identity_number');
            $table->string('identity_type')->nullable();
            $table->timestamp('last_logged_in_date')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('office_no')->nullable();
            $table->timestamp('password_modified_date')->nullable();
            $table->string('position')->nullable();
            $table->string('postcode')->nullable();
            $table->string('profileUpdated')->nullable();
            $table->string('reset_password_email')->nullable();
            $table->bigInteger('search_count')->nullable();
            $table->timestamp('search_date')->nullable();
            $table->string('password');
            $table->string('cpassword')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->boolean('enabled')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('sec_users');
    }
};
