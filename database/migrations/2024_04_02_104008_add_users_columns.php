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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 15)->nullable()->after('email');
            $table->integer('role')->default('2')->after('email');
            $table->string('areas_of_expertise')->nullable()->after('email');
            $table->string('facebook_link')->nullable()->after('role');
            $table->string('linkedin_link')->nullable()->after('facebook_link');
            $table->string('twitter_link')->nullable()->after('linkedin_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('role');
            $table->dropColumn('areas_of_expertise');
            $table->dropColumn('facebook_link');
            $table->dropColumn('linkedin_link');
            $table->dropColumn('twitter_link');
        });
    }
};
