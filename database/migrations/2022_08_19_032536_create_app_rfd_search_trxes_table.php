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
        Schema::create('app_rfd_search_trxes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppRfdInfo::class)->constrained()->cascadeOnDelete();
            $table->string('full_name')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('search_date')->nullable();
            $table->string('search_value')->nullable();
            $table->string('username')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('app_rfd_search_trxes');
    }
};
