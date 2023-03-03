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
        Schema::create('app_wtd_type_claim_documents', function (Blueprint $table) {
            $table->id();
            $table->string('claim_doc_code');
            $table->string('doc_desc');
            $table->string('doc_desc_my');
            $table->string('mandatory');
            $table->string('wtd_type_code');
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
        Schema::dropIfExists('app_wtd_type_claim_documents');
    }
};
