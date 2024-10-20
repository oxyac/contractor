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
        Schema::create('legal_entities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Company name
            $table->string('entity_type')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 50)->nullable();
            $table->text('address')->nullable();
            $table->text('bank_details')->nullable();
            $table->text('iban')->nullable();
            $table->foreignId('belongs_to_legal_entity_id')->nullable()->constrained('legal_entities');
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_entity_id')->nullable()->constrained('legal_entities');
            $table->foreignId('to_entity_id')->nullable()->constrained('legal_entities');
            $table->string('currency', 10)->nullable();
            $table->string('language_code', 5)->nullable();
            $table->date('contract_date')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_due_date')->nullable();
            $table->decimal('total')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_parsed')->default(false);

            $table->boolean('is_limited')->default(false); // Whether the contract is a subscription
            $table->boolean('is_subscription')->default(false); // Whether the contract is a subscription
            $table->boolean('is_in_rates')->default(false); // Whether the cont

            $table->json('services')->nullable();
            $table->json('parse_result')->nullable();
            $table->text('text')->nullable();


            $table->foreignId('legal_entity_id')->constrained('legal_entities'); // Foreign key to the company (nullable

            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('legal_entity_id')->nullable()->constrained('legal_entities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['legal_entity_id']);
            $table->dropColumn('legal_entity_id');
        });
        Schema::dropIfExists('contracts');
    }
};
