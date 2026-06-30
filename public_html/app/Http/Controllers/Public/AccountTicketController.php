<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountTicketController extends Controller
{
    public function show(string $ticket): View
    {
        return view('pages.public.account.tickets.show', [
            'ticket' => $this->findUserTicket($ticket),
        ]);
    }

    public function editName(Request $request, string $ticket): View
    {
        $ticketData = $this->findUserTicket($ticket);

        $from = $request->query('from', 'detail');

        $backUrl = match ($from) {
            'tickets' => route('account.tickets'),
            default => route('account.tickets.show', $ticketData->ticket_number),
        };

        $backLabel = match ($from) {
            'tickets' => 'Retour à mes tickets',
            default => 'Retour au ticket #' . $ticketData->ticket_number,
        };

        return view('pages.public.account.tickets.edit-name', [
            'ticket' => $ticketData,
            'from' => $from,
            'backUrl' => $backUrl,
            'backLabel' => $backLabel,
        ]);
    }

    public function updateName(Request $request, string $ticket): RedirectResponse
    {
        $ticketData = $this->findUserTicket($ticket);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'from' => ['nullable', 'in:tickets,detail'],
        ]);

        if ($ticketData->status !== 'valid') {
            return back()->withErrors([
                'first_name' => 'Ce ticket ne peut plus être modifié.',
            ]);
        }

        $oldFirstName = $ticketData->participant_first_name;
        $oldLastName = $ticketData->participant_last_name;

        $ticketData->update([
            'participant_first_name' => $validated['first_name'],
            'participant_last_name' => $validated['last_name'],
        ]);

        $ticketData->nameChanges()->create([
            'changed_by' => $request->user()->id,
            'old_first_name' => $oldFirstName,
            'old_last_name' => $oldLastName,
            'new_first_name' => $validated['first_name'],
            'new_last_name' => $validated['last_name'],
            'changed_at' => now(),
        ]);

        if (($validated['from'] ?? 'detail') === 'tickets') {
            return redirect()
                ->route('account.tickets')
                ->with('status', 'Le nom du participant a bien été modifié.');
        }

        return redirect()
            ->route('account.tickets.show', $ticketData->ticket_number)
            ->with('status', 'Le nom du participant a bien été modifié.');
    }

    public function download(string $ticket)
    {
        $ticketData = $this->findUserTicket($ticket);

        $qrAbsolutePath = $ticketData->qr_code_path
            ? storage_path('app/public/' . $ticketData->qr_code_path)
            : null;

        $pdf = Pdf::loadView('pages.public.account.tickets.pdf', [
            'ticket' => $ticketData,
            'qrAbsolutePath' => $qrAbsolutePath,
        ])->setPaper('a4');

        return $pdf->download('ticket-' . $ticketData->ticket_number . '.pdf');
    }

    private function findUserTicket(string $ticket): Ticket
    {
        return auth()->user()
            ->tickets()
            ->with(['event', 'ticketType', 'order'])
            ->where('ticket_number', $ticket)
            ->firstOrFail();
    }
}
