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
        Schema::create('ref_user_code_details', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_my')->nullable();
            $table->string('length')->nullable();
            $table->boolean('required');
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
        Schema::dropIfExists('ref_user_code_details');
    }
};
