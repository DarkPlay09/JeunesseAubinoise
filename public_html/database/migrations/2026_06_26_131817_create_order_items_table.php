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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('ticket_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('label');
            $table->integer('quantity')->default(1);

            $table->integer('unit_price_cents');
            $table->integer('unit_fee_cents')->default(0);
            $table->integer('total_cents');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
