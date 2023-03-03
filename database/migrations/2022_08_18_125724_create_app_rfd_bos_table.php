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
        Schema::create('app_rfd_bos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdInfo::class);
            $table->float('amount');
            $table->integer('boMasterId');
            $table->float('claimAmount');
            $table->string('description')->nullable();
            $table->string('entity_code')->nullable();
            $table->string('entity_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_refno')->nullable();
            $table->string('financial_year')->nullable();
            $table->integer('id_uma3')->nullable();
            $table->integer('id_uma4')->nullable();
            $table->string('name')->nullable();
            $table->string('new_ic_number')->nullable();
            $table->string('old_ic_number')->nullable();
            $table->string('other_ref_no')->nullable();
            $table->string('selected')->nullable();
            $table->string('status_date')->nullable();
            $table->string('unclaimed_amount')->nullable();
            $table->string('wtd_type')->nullable();
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
        Schema::dropIfExists('app_rfd_bos');
    }
};
