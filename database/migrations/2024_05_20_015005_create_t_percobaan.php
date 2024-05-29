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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id();
            $table->string('percobaan 1');
            $table->string('percobaan 2');
            $table->string('percobaan 3');
            $table->string('percobaan 4');
            $table->string('percobaan 5');
            $table->string('percobaan 6');
            $table->string('percobaan 7');
            $table->string('percobaan 8');
            $table->string('percobaan 9');
            $table->string('percobaan 10');
            $table->string('percobaan 11');
            $table->string('percobaan 12');
            $table->string('percobaan 13');
            $table->string('percobaan 14');
            $table->string('percobaan 15');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
