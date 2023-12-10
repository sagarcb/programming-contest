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
        Schema::create('team_infos', function (Blueprint $table) {
            $table->id();
            $table->string('team_name',150);
            $table->string('university_name', 255);
            $table->string('coach_name',150);
            $table->string('coach_email',150);
            $table->string('coach_mobile_number');
            $table->string('coach_tshirt_size',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_infos');
    }
};
