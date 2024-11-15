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
        Schema::create('opportunity', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_name');
            $table->string('phase');
            $table->string('tag')->nullable();
            $table->string('organization');
            $table->string('contact');
            $table->string('responsible');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->decimal('value', 15, 2);
            $table->date('date_closing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity');
    }
};
