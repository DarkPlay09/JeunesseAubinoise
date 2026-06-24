<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Support\Programme\ProgrammeEventRepository;
use Carbon\CarbonImmutable;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProgrammeController extends Controller
{
    public function index(ProgrammeEventRepository $repository): View
    {
        return view('pages.public.programme.index', [
            'events' => $repository->all(),
            'categories' => $repository->categories(),
        ]);
    }

    public function calendar(string $slug, ProgrammeEventRepository $repository): Response
    {
        $event = $repository->findBySlugOrFail($slug);

        $start = CarbonImmutable::parse($event['start_at'], 'Europe/Brussels')->utc();
        $end = CarbonImmutable::parse($event['end_at'], 'Europe/Brussels')->utc();

        $uid = $event['slug'] . '@jeunesseaubinoise.com';

        $ics = implode("\r\n", [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//Jeunesse Aubinoise//Programme//FR',
            'CALSCALE:GREGORIAN',
            'METHOD:PUBLISH',
            'BEGIN:VEVENT',
            'UID:' . $uid,
            'DTSTAMP:' . now('UTC')->format('Ymd\THis\Z'),
            'DTSTART:' . $start->format('Ymd\THis\Z'),
            'DTEND:' . $end->format('Ymd\THis\Z'),
            'SUMMARY:' . $this->escapeIcs($event['title']),
            'DESCRIPTION:' . $this->escapeIcs($event['summary']),
            'LOCATION:' . $this->escapeIcs($event['location']),
            'END:VEVENT',
            'END:VCALENDAR',
            '',
        ]);

        return response($ics, 200, [
            'Content-Type' => 'text/calendar; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $event['slug'] . '.ics"',
        ]);
    }

    private function escapeIcs(string $value): string
    {
        return str_replace(
            ["\\", ";", ",", "\n", "\r"],
            ["\\\\", "\;", "\,", "\\n", ""],
            $value
        );
    }
}
