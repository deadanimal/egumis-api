<?php

use App\Models\AppFaqHeader;
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
        Schema::create('app_faq_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppFaqHeader::class)->constrained()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->string('answer_en')->nullable();
            $table->string('answer_my')->nullable();
            $table->string('display_order')->nullable();
            $table->string('question_en')->nullable();
            $table->string('question_my')->nullable();
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
        Schema::dropIfExists('app_faq_details');
    }
};
