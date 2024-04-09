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
        Schema::create('user_additional_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('country', 100);
            $table->enum('company_size', ['Small', 'Medium', 'Large'])->default('Small');
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 100)->nullable();
            $table->string('company_phone_number', 100)->nullable();
            $table->string('company_description')->nullable();
            $table->string('company_year_established', 100)->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('headshot_path')->nullable();
            $table->string('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_additional_data');
    }
};
