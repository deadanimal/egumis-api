<?php

use App\Models\SecUser;
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
        Schema::create('app_rfd_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SecUser::class)->constrained()->cascadeOnDelete();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city')->nullable();
            $table->date('claim_date')->nullable();
            $table->string('claimanIdType')->nullable();
            $table->string('claimanIdName')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('email_status')->nullable();
            $table->integer('express')->nullable();
            $table->string('fax_no')->nullable();
            $table->integer('idd_created')->nullable();
            $table->string('idd_file_name')->nullable();
            $table->integer('joint_account')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('postcode')->nullable();
            $table->string('record_count')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('state')->nullable();
            $table->string('status')->nullable();
            $table->date('status_date')->nullable();
            $table->integer('total_claim')->nullable();
            $table->string('validateStatus')->nullable();
            $table->string('status_description')->nullable();
            $table->string('varified_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('app_rfd_infos');
    }
};
