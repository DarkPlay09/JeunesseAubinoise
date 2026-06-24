<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Support\Gallery\GalleryAlbumRepository;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(GalleryAlbumRepository $repository): View
    {
        return view('pages.public.galerie.index', [
            'albums' => $repository->all(),
            'categories' => $repository->categories(),
        ]);
    }

    public function show(string $slug, GalleryAlbumRepository $repository): View
    {
        return view('pages.public.galerie.show', [
            'album' => $repository->findBySlugOrFail($slug),
        ]);
    }
}
