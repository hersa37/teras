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
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id_tenant', 255)->primary();
            $table->string('nama_tenant', 255);
            $table->string('kategori_tenant', 255);
            $table->foreign('kategori_tenant')->references('nama_kategori')->on('kategori');
            $table->string('password', 255);
            $table->string('no_telp', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
