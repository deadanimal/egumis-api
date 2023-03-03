<?php

use App\Models\SecUser;
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
        Schema::create('sec_audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SecUser::class)->constrained()->cascadeOnDelete();
            $table->date('date_logged_in')->nullable();
            $table->date('date_logged_out')->nullable();
            $table->string('full_name')->nullable();
            $table->string('http_method')->nullable();
            $table->string('ip_address')->nullable();
            $table->time('requested_time')->nullable();
            $table->time('requested_url')->nullable();
            $table->string('session_id')->nullable();
            $table->string('username')->nullable();
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
        Schema::dropIfExists('sec_audit_logs');
    }
};
