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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->decimal('price',9, 2); // 2,859,893.50
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id')->comment('Created By User');//จำนวนเต็มบวก
            $table->foreign('user_id')->references('id')->on('users');//ความสัมพันธ์ของ2table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
