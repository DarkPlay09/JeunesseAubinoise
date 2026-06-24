<?php

namespace App\Support\Gallery;

use Illuminate\Support\Collection;

class GalleryAlbumRepository
{
    public function all(): Collection
    {
        return collect(config('gallery.albums', []))
            ->sortByDesc('year')
            ->values();
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->all()
            ->firstWhere('slug', $slug);
    }

    public function findBySlugOrFail(string $slug): array
    {
        $album = $this->findBySlug($slug);

        abort_if($album === null, 404);

        return $album;
    }

    public function categories(): array
    {
        return [
            'all' => 'Tous',
            'safari' => 'Safari',
            'storm' => 'Storm',
        ];
    }
}
