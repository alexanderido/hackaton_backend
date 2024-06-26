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
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);
            $table->integer('pets')->default(0);
            $table->string('origin');
            $table->string('status')->default('pending');
            $table->timestamps();


            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_requests');
    }
};
