<?php

namespace App\Support\Programme;

use Illuminate\Support\Collection;

class ProgrammeEventRepository
{
    public function all(): Collection
    {
        return collect(config('programme.events', []))
            ->sortBy('start_at')
            ->values();
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->all()->firstWhere('slug', $slug);
    }

    public function findBySlugOrFail(string $slug): array
    {
        $event = $this->findBySlug($slug);

        abort_if($event === null, 404);

        return $event;
    }

    public function categories(): array
    {
        return [
            'all' => 'Tous',
            'soiree' => 'Soirées',
            'activite' => 'Activités',
            'spectacle' => 'Spectacles',
        ];
    }
}
