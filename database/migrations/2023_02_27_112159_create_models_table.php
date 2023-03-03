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
        Schema::create('models', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->nullable();

            $table->unsignedBigInteger('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('update_user_id');
            $table->foreign('update_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('update_controll_id');
            $table->foreign('update_controll_id')->references('id')->on('update_controll')->onDelete('cascade')->nullable();

            $table->text('name');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
