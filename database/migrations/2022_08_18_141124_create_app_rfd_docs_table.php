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
        Schema::create('app_rfd_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdInfo::class)->constrained()->cascadeOnDelete();
            $table->string('claim_doc_code');
            $table->string('description')->nullable();
            $table->string('descriptionMy')->nullable();
            $table->string('doc_category')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mandatory')->nullable();
            $table->string('name')->nullable();
            $table->string('name_my')->nullable();
            $table->string('recordId')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('reupload')->nullable();
            $table->string('wtd_type_code')->nullable();
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
        Schema::dropIfExists('app_rfd_docs');
    }
};
