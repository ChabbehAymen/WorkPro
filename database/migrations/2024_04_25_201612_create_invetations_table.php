<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\Auth;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invetations', function (Blueprint $table) {
            $table->foreignId('sender_id')->default(Auth::id())->constrained('users');
            $table->foreignId('receiver_id')->constrained('users');
            $table->foreignId('project_id')->constrained('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invetations');
    }
};
