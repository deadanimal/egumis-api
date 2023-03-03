<?php

use App\Models\AppRfdInfo;
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
        Schema::create('app_rfd_payees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdInfo::class)->constrained()->cascadeOnDelete();
            $table->string('acc_no')->nullable();
            $table->string('address')->nullable();
            $table->string('bankCode')->nullable();
            $table->string('city')->nullable();
            $table->string('claimAmount')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('id_no')->nullable();
            $table->string('idType')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('postcode')->nullable();
            $table->string('validateStatus')->nullable();
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
        Schema::dropIfExists('app_rfd_payees');
    }
};
