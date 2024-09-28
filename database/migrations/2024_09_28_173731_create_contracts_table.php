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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->boolean('is_active');
            $table->enum('payment_status', ['paid', 'awaiting_payment', 'overdue', 'cancelled']);

            $table->foreignId('billed_to')->constrained('companies');
            $table->foreignId('created_by')->constrained('companies');

            $table->json('services');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
