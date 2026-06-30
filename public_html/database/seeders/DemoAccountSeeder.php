<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoAccountSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@jeunesseaubinoise.be')->firstOrFail();

        $safari = Event::updateOrCreate(
            ['slug' => 'safari-2026'],
            [
                'name' => 'Safari Party',
                'category' => 'party',
                'description' => 'La soirée Safari de la Jeunesse Aubinoise.',
                'starts_at' => '2026-09-11 21:30:00',
                'ends_at' => '2026-09-12 03:00:00',
                'location' => 'Aubin-Neufchâteau',
                'is_active' => true,
            ]
        );

        $storm = Event::updateOrCreate(
            ['slug' => 'storm-2026'],
            [
                'name' => 'Storm Festival',
                'category' => 'party',
                'description' => 'La soirée techno Storm de la Jeunesse Aubinoise.',
                'starts_at' => '2026-09-13 22:00:00',
                'ends_at' => '2026-09-14 03:00:00',
                'location' => 'Aubin-Neufchâteau',
                'is_active' => true,
            ]
        );

        $duo = TicketType::updateOrCreate(
            ['code' => 'duo_safari_storm'],
            [
                'name' => 'Duo Safari + Storm',
                'description' => 'Un accès Safari et un accès Storm pour le même participant.',
                'price_cents' => 2200,
                'fee_cents' => 50,
                'is_bundle' => true,
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        $safariSolo = TicketType::updateOrCreate(
            ['code' => 'safari_solo'],
            [
                'name' => 'Safari Solo',
                'description' => 'Entrée simple pour la soirée Safari.',
                'price_cents' => 1500,
                'fee_cents' => 50,
                'is_bundle' => false,
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        $stormSolo = TicketType::updateOrCreate(
            ['code' => 'storm_solo'],
            [
                'name' => 'Storm Solo',
                'description' => 'Entrée simple pour la soirée Storm.',
                'price_cents' => 1200,
                'fee_cents' => 50,
                'is_bundle' => false,
                'is_active' => true,
                'sort_order' => 3,
            ]
        );

        $order2026 = Order::updateOrCreate(
            ['order_number' => 'LJA-2026-8492'],
            [
                'user_id' => $user->id,
                'status' => 'paid',
                'subtotal_cents' => 3700,
                'fees_cents' => 100,
                'total_cents' => 3800,
                'paid_at' => now()->subDays(5),
            ]
        );

        $duoItem = OrderItem::updateOrCreate(
            [
                'order_id' => $order2026->id,
                'ticket_type_id' => $duo->id,
                'label' => 'Duo Safari + Storm',
            ],
            [
                'quantity' => 1,
                'unit_price_cents' => 2200,
                'unit_fee_cents' => 50,
                'total_cents' => 2250,
            ]
        );

        $safariItem = OrderItem::updateOrCreate(
            [
                'order_id' => $order2026->id,
                'ticket_type_id' => $safariSolo->id,
                'label' => 'Safari Solo',
            ],
            [
                'quantity' => 1,
                'unit_price_cents' => 1500,
                'unit_fee_cents' => 50,
                'total_cents' => 1550,
            ]
        );

        $this->upsertTicket($order2026, $duoItem, $user, $safari, $duo, 'JA-8492-SAFARI', 'Antoine', 'Ploemmen', 'valid');
        $this->upsertTicket($order2026, $duoItem, $user, $storm, $duo, 'JA-8492-STORM', 'Antoine', 'Ploemmen', 'valid');
        $this->upsertTicket($order2026, $safariItem, $user, $safari, $safariSolo, 'JA-8493-SAFARI', 'Jean', 'Dupont', 'valid');

        $order2025 = Order::updateOrCreate(
            ['order_number' => 'LJA-2025-1234'],
            [
                'user_id' => $user->id,
                'status' => 'paid',
                'subtotal_cents' => 2400,
                'fees_cents' => 100,
                'total_cents' => 2500,
                'paid_at' => now()->subMonths(8),
            ]
        );

        $stormItem = OrderItem::updateOrCreate(
            [
                'order_id' => $order2025->id,
                'ticket_type_id' => $stormSolo->id,
                'label' => 'Storm Solo',
            ],
            [
                'quantity' => 2,
                'unit_price_cents' => 1200,
                'unit_fee_cents' => 50,
                'total_cents' => 2500,
            ]
        );

        $this->upsertTicket($order2025, $stormItem, $user, $storm, $stormSolo, 'JA-1234-STORM-1', 'Marie', 'Martin', 'used');
        $this->upsertTicket($order2025, $stormItem, $user, $storm, $stormSolo, 'JA-1234-STORM-2', 'Lucas', 'Lambert', 'valid');

        Notification::updateOrCreate(
            [
                'user_id' => $user->id,
                'title' => 'Vos tickets sont disponibles',
            ],
            [
                'type' => 'ticket',
                'message' => 'Vos tickets de démonstration sont disponibles dans votre espace membre.',
                'url' => '/mes-tickets',
                'icon' => 'local_activity',
            ]
        );

        Notification::updateOrCreate(
            [
                'user_id' => $user->id,
                'title' => 'Paiement confirmé',
            ],
            [
                'type' => 'payment',
                'message' => 'Votre commande LJA-2026-8492 a bien été confirmée.',
                'url' => '/mes-achats',
                'icon' => 'receipt_long',
            ]
        );
    }

    private function upsertTicket(
        Order $order,
        OrderItem $orderItem,
        User $user,
        Event $event,
        TicketType $ticketType,
        string $ticketNumber,
        string $firstName,
        string $lastName,
        string $status
    ): void {
        Ticket::updateOrCreate(
            ['ticket_number' => $ticketNumber],
            [
                'order_id' => $order->id,
                'order_item_id' => $orderItem->id,
                'user_id' => $user->id,
                'event_id' => $event->id,
                'ticket_type_id' => $ticketType->id,
                'participant_first_name' => $firstName,
                'participant_last_name' => $lastName,
                'qr_token' => hash('sha256', $ticketNumber . '|jeunesse-aubinoise-demo'),
                'qr_code_path' => null,
                'status' => $status,
                'scanned_at' => $status === 'used' ? now()->subMonths(8) : null,
            ]
        );
    }
}
