<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ticket {{ $ticket->ticket_number }}</title>

    <style>
        body {
            margin: 0;
            padding: 32px;
            background: #ffffff;
            color: #1a1a1a;
            font-family: DejaVu Sans, sans-serif;
        }

        .ticket-pdf {
            border: 2px solid #3498DB;
            border-radius: 18px;
            padding: 28px;
        }

        .header {
            border-bottom: 1px solid #dddddd;
            padding-bottom: 18px;
            margin-bottom: 24px;
        }

        .brand {
            color: #3498DB;
            font-size: 22px;
            font-weight: bold;
        }

        h1 {
            margin: 10px 0 0;
            font-size: 28px;
            text-transform: uppercase;
        }

        .status {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 12px;
            border-radius: 999px;
            background: #e7f7ee;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .content {
            width: 100%;
        }

        .qr {
            width: 230px;
            vertical-align: top;
            text-align: center;
        }

        .qr-box {
            width: 190px;
            height: 190px;
            margin: 0 auto;
            border: 1px solid #cccccc;
            border-radius: 12px;
            text-align: center;
            line-height: 190px;
            font-size: 22px;
            font-weight: bold;
        }

        .qr img {
            width: 190px;
            height: 190px;
        }

        .details {
            vertical-align: top;
            padding-left: 28px;
        }

        .detail {
            margin-bottom: 16px;
        }

        .label {
            display: block;
            margin-bottom: 4px;
            color: #777777;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .value {
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            margin-top: 26px;
            padding-top: 18px;
            border-top: 1px solid #dddddd;
            color: #777777;
            font-size: 11px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<section class="ticket-pdf">
    <div class="header">
        <div class="brand">La Jeunesse Aubinoise</div>

        <h1>Ticket #{{ $ticket->ticket_number }}</h1>

        <span class="status">{{ $ticket->status_label }}</span>
    </div>

    <table class="content">
        <tr>
            <td class="qr">
                @if (! empty($qrAbsolutePath) && file_exists($qrAbsolutePath))
                    <img src="{{ $qrAbsolutePath }}" alt="QR code">
                @else
                    <div class="qr-box">
                        QR
                    </div>
                @endif

                <p>
                    À scanner à l’entrée
                </p>
            </td>

            <td class="details">
                <div class="detail">
                    <span class="label">Participant</span>
                    <span class="value">{{ $ticket->participant_name }}</span>
                </div>

                <div class="detail">
                    <span class="label">Type de billet</span>
                    <span class="value">{{ $ticket->ticketType?->name ?? 'Ticket' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Événement</span>
                    <span class="value">{{ $ticket->event?->name ?? 'Événement' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Date</span>
                    <span class="value">
                        {{ $ticket->event?->starts_at?->format('d/m/Y H:i') ?? 'Date à confirmer' }}
                    </span>
                </div>

                <div class="detail">
                    <span class="label">Lieu</span>
                    <span class="value">{{ $ticket->event?->location ?? 'Aubin-Neufchâteau' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Commande</span>
                    <span class="value">{{ $ticket->order?->order_number }}</span>
                </div>

                <div class="detail">
                    <span class="label">Ticket</span>
                    <span class="value">{{ $ticket->ticket_number }}</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="footer">
        Ce ticket est personnel et doit être présenté à l’entrée. Une fois scanné, il ne pourra plus être réutilisé.
        En cas de problème, contactez la Jeunesse Aubinoise.
    </div>
</section>
</body>
</html>
