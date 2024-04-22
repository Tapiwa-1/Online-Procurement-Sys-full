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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('purpose');
            $table->string('programProject');
            $table->string('description');
            $table->unsignedBigInteger('participant1');
            $table->string('participant1approval')->nullable();
            $table->foreign('participant1')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('participant2')->nullable();
            $table->string('participant2approval')->nullable();
            $table->foreign('participant1')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('participant3')->nullable();
            $table->string('participant3approval')->nullable();
            $table->foreign('participant1')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('participant4')->nullable();
            $table->string('participant4approval')->nullable();
            $table->foreign('participant1')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('status')->nullable();
            // $table->int('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
