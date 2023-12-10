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
        Schema::create('member_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('email', 150);
            $table->string('image',255)->nullable();
            $table->string('tshirt_size',10);
            $table->unsignedBigInteger('team_info_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_infos');
    }
};
