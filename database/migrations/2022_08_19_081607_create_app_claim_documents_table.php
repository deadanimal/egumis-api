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
        Schema::create('app_claim_documents', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('descriptionMy')->nullable();
            $table->string('doc_category')->nullable();
            $table->string('doc_code')->nullable();
            $table->string('mandatory')->nullable();
            $table->string('name')->nullable();
            $table->string('name_my')->nullable();
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
        Schema::dropIfExists('app_claim_documents');
    }
};
