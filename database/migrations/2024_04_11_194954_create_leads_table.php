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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('introducer_id');
            $table->string('client_name', 100);
            $table->string('client_email', 100);
            $table->string('client_phoneno', 15)->nullable();
            $table->string('when_to_contact', 100)->nullable();
            $table->text('background')->nullable();
            $table->string('services')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('aprox_deal')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('introducer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
