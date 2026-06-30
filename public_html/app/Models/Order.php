<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'stripe_session_id',
        'stripe_payment_intent_id',
        'status',
        'subtotal_cents',
        'fees_cents',
        'total_cents',
        'paid_at',
        'cancelled_at',
        'refunded_at',
    ];

    protected function casts(): array
    {
        return [
            'paid_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'refunded_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return number_format($this->total_cents / 100, 2, ',', ' ') . ' €';
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'paid' => 'Payé',
            'pending' => 'En attente',
            'cancelled' => 'Annulé',
            'refunded' => 'Remboursé',
            default => ucfirst($this->status),
        };
    }
}
