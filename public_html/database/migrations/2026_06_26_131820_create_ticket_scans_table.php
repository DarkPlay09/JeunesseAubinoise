<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_scans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ticket_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('scanned_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('qr_token');

            $table->string('status');
            $table->string('message')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();

            $table->index(['ticket_id', 'status']);
            $table->index('qr_token');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_scans');
    }
};
