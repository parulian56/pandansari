<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('calons', function (Blueprint $table) {
        $table->id();
        $table->string('nik')->unique();
        $table->string('nama_lengkap');
        $table->text('visi');
        $table->text('misi');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
