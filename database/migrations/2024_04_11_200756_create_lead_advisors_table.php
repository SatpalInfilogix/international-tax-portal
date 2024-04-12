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
        Schema::create('lead_advisors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('introducer_id');
            $table->unsignedBigInteger('advisor_id');
            $table->timestamps();
            
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->foreign('introducer_id')->references('id')->on('users');
            $table->foreign('advisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_advisors');
    }
};
