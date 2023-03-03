<?php

use App\Models\AppRfdBo;
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
        Schema::create('app_rfd_joints', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdBo::class)->constrained()->cascadeOnDelete();
            $table->integer('financial_year')->nullable();
            $table->integer('id_uma3')->nullable();
            $table->integer('name')->nullable();
            $table->integer('new_ic_number')->nullable();
            $table->integer('old_ic_number')->nullable();
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
        Schema::dropIfExists('app_rfd_joints');
    }
};
