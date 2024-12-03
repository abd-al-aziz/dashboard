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
        Schema::create('pets', function (Blueprint $table) {
            $table->id(); // BIGINT and auto-increment (primary key)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('name', 255);
            $table->string('image')->nullable()->change();
            $table->enum('type', ['dog', 'cat']);
            $table->string('breed', 255)->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->text('special_needs')->nullable();
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
        Schema::dropIfExists('pets');
    }
};
