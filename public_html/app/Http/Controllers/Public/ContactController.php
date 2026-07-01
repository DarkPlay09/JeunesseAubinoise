<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    private function recipients(): array
    {
        return [
            'general' => [
                'label' => 'Jeunesse Aubinoise',
                'email' => 'jeunesseaubinoise.1949@gmail.com',
            ],

            'president' => [
                'label' => 'Président - Noah Xhonneux',
                'email' => 'EMAIL_DU_PRESIDENT@exemple.com',
            ],

            'secretariat' => [
                'label' => 'Secrétariat - Antoine Ploemmen',
                'email' => 'EMAIL_DU_SECRETARIAT@exemple.com',
            ],

            'tresorerie' => [
                'label' => 'Trésorerie',
                'email' => 'EMAIL_DE_LA_TRESORERIE@exemple.com',
            ],

            'support' => [
                'label' => 'Support technique',
                'email' => 'loiccarlier45@gmail.com',
            ],
        ];
    }

    private function subjects(): array
    {
        return [
            'billetterie' => 'Billetterie / tickets',
            'qr_code' => 'QR code / compte utilisateur',
            'organisation' => 'Organisation',
            'partenariat' => 'Partenariat',
            'benevolat' => 'Bénévolat',
            'autre' => 'Autre',
        ];
    }

    public function create(?string $recipient = null)
    {
        $recipients = $this->recipients();

        $selectedRecipient = array_key_exists($recipient, $recipients)
            ? $recipient
            : 'general';

        return view('pages.public.contact.form', [
            'recipients' => $recipients,
            'subjects' => $this->subjects(),
            'selectedRecipient' => $selectedRecipient,
        ]);
    }

    public function send(Request $request)
    {
        $recipients = $this->recipients();
        $subjects = $this->subjects();

        $validated = $request->validate([
            'recipient' => ['required', Rule::in(array_keys($recipients))],
            'lastname' => ['required', 'string', 'max:120'],
            'firstname' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', Rule::in(array_keys($subjects))],
            'message' => ['required', 'string', 'max:5000'],

            // Anti-spam invisible.
            'website' => ['nullable', 'max:0'],
        ]);

        $recipient = $recipients[$validated['recipient']];
        $subjectLabel = $subjects[$validated['subject']];
        $senderName = trim($validated['firstname'] . ' ' . $validated['lastname']);

        Mail::send('emails.contact-message', [
            'recipient' => $recipient,
            'subjectLabel' => $subjectLabel,
            'data' => $validated,
            'senderName' => $senderName,
        ], function ($message) use ($recipient, $subjectLabel, $validated, $senderName) {
            $message
                ->to($recipient['email'], $recipient['label'])
                ->replyTo($validated['email'], $senderName)
                ->subject('[Contact site] ' . $subjectLabel . ' - ' . $senderName);
        });

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dès que possible.');
    }
}
