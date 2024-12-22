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
       
            Schema::create('adoption', function (Blueprint $table) {
                $table->id(); // عمود ID تلقائي
                $table->unsignedBigInteger('user_id')->nullable(); // معرّف المستخدم، يمكن أن يكون NULL
                $table->string('name'); // اسم الحيوان
                $table->string('image'); // صورة الحيوان
                $table->string('breed'); // السلالة
                $table->integer('age'); // العمر
                $table->string('color'); // اللون
                $table->string('personality'); // الشخصية
                $table->boolean('is_adopted')->default(0); // حالة التبني، افتراضي: 0
                $table->timestamps(); // أعمدة created_at و updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption');
    }
};
