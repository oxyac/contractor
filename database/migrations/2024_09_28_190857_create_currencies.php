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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code_alphabetic')->unique();
            $table->string('code_numeric')->unique();
            $table->integer('decimal_digits');
            $table->string('name');
            $table->string('name_plural');
            $table->float('rounding');
            $table->string('symbol');
            $table->string('symbol_native');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
