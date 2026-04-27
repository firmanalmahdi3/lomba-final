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
        Schema::table('votes', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('email')->nullable();

            $table->dropForeign(['candidate_id']);
            $table->dropUnique(['candidate_id', 'voter_ip']);
            
            $table->foreign('candidate_id')->references('id')->on('candidates')->cascadeOnDelete();
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropUnique(['user_id']);
            $table->foreign('candidate_id')->references('id')->on('candidates')->cascadeOnDelete();

            $table->unique(['candidate_id', 'voter_ip']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'email']);
        });
    }
};
