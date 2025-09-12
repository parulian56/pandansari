<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id'); // ✅ relasi ke tabel candidates
            $table->unsignedBigInteger('user_id')->nullable(); // kalau ada user
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->after('id');
        });

    }
};
