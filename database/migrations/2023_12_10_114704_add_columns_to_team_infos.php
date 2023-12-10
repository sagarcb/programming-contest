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
        Schema::table('team_infos', function (Blueprint $table) {
            $table->tinyInteger('email_verified')->default(0);
            $table->text('verification_token')->nullable();
            $table->unsignedBigInteger('contest_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_infos', function (Blueprint $table) {
            //
        });
    }
};
