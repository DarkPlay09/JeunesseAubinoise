<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $fillable = [
        'order_id',
        'order_item_id',
        'user_id',
        'event_id',
        'ticket_type_id',
        'ticket_number',
        'participant_first_name',
        'participant_last_name',
        'qr_token',
        'qr_code_path',
        'status',
        'scanned_at',
        'scanned_by',
    ];

    protected function casts(): array
    {
        return [
            'scanned_at' => 'datetime',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function ticketType(): BelongsTo
    {
        return $this->belongsTo(TicketType::class);
    }

    public function scanner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }

    public function nameChanges(): HasMany
    {
        return $this->hasMany(TicketNameChange::class);
    }

    public function scans(): HasMany
    {
        return $this->hasMany(TicketScan::class);
    }

    public function getParticipantNameAttribute(): string
    {
        return trim($this->participant_first_name . ' ' . $this->participant_last_name);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'valid' => 'Valide',
            'used' => 'Déjà scanné',
            'cancelled' => 'Annulé',
            default => ucfirst($this->status),
        };
    }

    public function getIsUsedAttribute(): bool
    {
        return $this->status === 'used';
    }

    public function getVisualClassAttribute(): string
    {
        if ($this->is_used) {
            return 'account-ticket-card__visual--used';
        }

        $code = $this->ticketType?->code ?? '';

        if (str_contains($code, 'duo')) {
            return 'account-ticket-card__visual--duo';
        }

        if (str_contains($code, 'safari')) {
            return 'account-ticket-card__visual--safari';
        }

        return 'account-ticket-card__visual--storm';
    }

    public function getVisualIconAttribute(): string
    {
        if ($this->is_used) {
            return 'qr_code_scanner';
        }

        $code = $this->ticketType?->code ?? '';

        return str_contains($code, 'duo') ? 'local_activity' : 'confirmation_number';
    }
}
