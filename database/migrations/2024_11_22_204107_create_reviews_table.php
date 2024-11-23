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
        Schema::create('reviews', function (Blueprint $table) {
            
                $table->id(); // BIGINT and auto-increment (primary key)
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Foreign key to bookings table
                $table->integer('rating')->default(1); // Default rating value
                $table->enum('status', ['Reject','Accept'])->default('Reject');
                $table->text('comment')->nullable(); // Optional comment field
                $table->timestamps(); // created_at and updated_at
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
