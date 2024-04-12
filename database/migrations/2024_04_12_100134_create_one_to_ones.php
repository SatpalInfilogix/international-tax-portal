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
        Schema::create('one_to_ones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('introducer_id');
            $table->integer('advisor_id');
            $table->text('request_message')->nullable();
            $table->text('reply_message')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->enum('status', ['Open', 'Closed', 'Cancelled'])->default('Open');
            $table->timestamps();

            $table->foreign('introducer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('one_to_ones');
    }
};
