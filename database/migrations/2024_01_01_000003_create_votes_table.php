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
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete();
            $table->string('voter_ip', 45);
            $table->string('voter_session')->nullable();
            $table->timestamps();

            // Satu IP hanya bisa vote satu kali per kandidat
            $table->unique(['candidate_id', 'voter_ip']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
