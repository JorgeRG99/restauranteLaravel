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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->time('hour');
            $table->integer('phone');
            $table->unsignedInteger('commensals');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable();
            $table->string('allergies')->nullable();
            $table->unsignedBigInteger('credit_card_id');

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('credit_card_id')->references('id')->on('credit_cards')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
