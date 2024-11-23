<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('booking_services', function (Blueprint $table) {
            $table->id(); // BIGINT and auto-increment (primary key)
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Foreign key to bookings table
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Foreign key to services table
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_services');
    }
};
