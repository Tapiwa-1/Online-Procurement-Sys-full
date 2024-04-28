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
             $table->text('purpose');
            $table->text('programProject');
            $table->text('description');
            $table->unsignedBigInteger('participant1')->nullable();
            $table->unsignedBigInteger('participant2')->nullable();
            $table->unsignedBigInteger('participant3')->nullable();
            $table->unsignedBigInteger('participant4')->nullable();
            $table->boolean('participant1approval')->default(false);
            $table->boolean('participant2approval')->default(false);
            $table->boolean('participant3approval')->default(false);
            $table->boolean('participant4approval')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
