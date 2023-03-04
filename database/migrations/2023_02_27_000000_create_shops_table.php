<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('update_user_id');
            $table->foreign('update_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('name');
            $table->text('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};