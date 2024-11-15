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
        {
            Schema::create('task', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->date('due_date')->nullable();
                $table->string('email')->nullable();
                $table->unsignedBigInteger('opportunity')->nullable();
                $table->unsignedBigInteger('contact')->nullable();
                $table->unsignedBigInteger('manager')->nullable();
                $table->boolean('accomplished')->default(false);
                $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
                $table->timestamps();
    
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
