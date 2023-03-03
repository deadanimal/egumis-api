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
        Schema::create('app_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('announcement_en')->nullable();
            $table->string('announcement_my')->nullable();
            $table->date('expiryDate')->nullable();
            $table->string('newContent')->nullable();
            $table->integer('new_content_count')->nullable();
            $table->string('status')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_my')->nullable();
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
        Schema::dropIfExists('app_announcements');
    }
};
