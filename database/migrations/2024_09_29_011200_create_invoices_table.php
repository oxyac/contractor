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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('contract_id')->nullable()->constrained('contracts')->onDelete('cascade'); // Foreign key to the contract
            $table->integer('stage_num')->nullable(); // Stage number (nullable)
            $table->timestamp('due_date')->nullable(); // Invoice due date
            $table->text('product_description'); // Description of the product/service
            $table->float('product_quantity'); // Quantity of the product/service
            $table->decimal('product_price'); // Price of the product/service
            $table->decimal('total'); // Total invoice price

            $table->foreignId('legal_entity_id')->constrained('legal_entities'); // Foreign key to the company (nullable

            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
