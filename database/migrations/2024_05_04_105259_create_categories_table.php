<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // السماح للشعار بأن يكون فارغًا
            $table->text('description')->nullable(); // السماح للوصف بأن يكون فارغًا
            $table->text('meta_description')->nullable(); 
            $table->text('_token')->nullable();// السماح لميتا الوصف بأن يكون فارغًا
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
