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
        Schema::create('app_rfd_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdInfo::class)->constrained()->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_ref_no')->nullable();
            $table->string('idd_file_name')->nullable();
            $table->string('status')->nullable();
            $table->string('status_date')->nullable();
            $table->string('status_desciption')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('app_rfd_statuses');
    }
};
