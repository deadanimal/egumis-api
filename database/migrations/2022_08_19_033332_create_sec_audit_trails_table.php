<?php

use App\Models\SecAuditLog;
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
        Schema::create('sec_audit_trails', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SecAuditLog::class)->constrained()->cascadeOnDelete();
            $table->string('menu_name_en')->nullable();
            $table->string('menu_name_ms')->nullable();
            $table->string('menu_url')->nullable();
            $table->string('method_name')->nullable();
            $table->string('module_name')->nullable();
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
        Schema::dropIfExists('sec_audit_trails');
    }
};
