<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persewaan', function (Blueprint $table) {
            $table->string('id_persewaan', 10)->primary();
            $table->string('id_tenant');
            $table->foreign('id_tenant')->references('id_tenant')->on('tenants')->onDelete('cascade');
            $table->string('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
            $table->string('id_lokasi');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persewaans');
    }
};
