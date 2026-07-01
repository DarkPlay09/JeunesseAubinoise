<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class StormArtistController extends Controller
{
    private function artists(): array
    {
        return [
            '25emeheure' => [
                'slug' => '25emeheure',
                'name' => '25EMEHEURE',
                'style' => 'Techno & Hard Techno',
                'time' => 'Bientôt disponible',
                'image' => 'images/pages/artists/25emeheure.png',
                'event' => 'Storm Festival',
                'tagline' => 'Une énergie brute, sombre et électrique.',

                // Remplace les # par les vrais liens officiels quand tu les as.
                'socials' => [
                    [
                        'label' => 'Instagram',
                        'url' => '#',
                        'icon' => 'alternate_email',
                    ],
                    [
                        'label' => 'Spotify',
                        'url' => '#',
                        'icon' => 'graphic_eq',
                    ],
                ],

                'description' => [
                    '25EMEHEURE plonge STORM dans une ambiance industrielle, rythmée par des kicks puissants, des montées sous tension et une atmosphère taillée pour la nuit.',
                    'Un set pensé pour faire grimper la pression progressivement, entre techno sombre, hard techno et énergie rave.',
                ],

                'stats' => [
                    [
                        'label' => 'Univers',
                        'value' => 'Sombre',
                    ],
                    [
                        'label' => 'Énergie',
                        'value' => 'Intense',
                    ],
                    [
                        'label' => 'Moment',
                        'value' => 'Peak time',
                    ],
                ],

                'gallery' => [
                    [
                        'src' => 'images/pages/artists/25emeheure.png',
                        'alt' => 'Portrait de 25EMEHEURE',
                    ],
                    [
                        'src' => 'images/pages/home/storm_affiche.png',
                        'alt' => 'Affiche Storm Festival',
                    ],
                    [
                        'src' => 'images/pages/home/home_galerie_01.png',
                        'alt' => 'Ambiance Storm Festival',
                    ],
                ],

                // Place ta vidéo ici si tu en as une.
                // Exemple : public/videos/events/storm/25emeheure-preview.mp4
                'video' => [
                    'src' => 'videos/events/storm/25emeheure-preview.mp4',
                    'poster' => 'images/pages/artists/25emeheure.png',
                    'title' => 'Preview vidéo',
                ],
            ],

            // Exemple pour ajouter un autre DJ plus tard :
            /*
            'furax' => [
                'slug' => 'furax',
                'name' => 'DJ FURAX',
                'style' => 'Hard Dance / Jumpstyle',
                'time' => 'Bientôt disponible',
                'image' => 'images/pages/artists/furax.png',
                'event' => 'Storm Festival',
                'tagline' => 'Un set culte, énergique et explosif.',
                'socials' => [
                    ['label' => 'Instagram', 'url' => '#', 'icon' => 'alternate_email'],
                    ['label' => 'Spotify', 'url' => '#', 'icon' => 'graphic_eq'],
                ],
                'description' => [
                    'Description du DJ ici.',
                    'Deuxième paragraphe ici.',
                ],
                'stats' => [
                    ['label' => 'Univers', 'value' => 'Classique'],
                    ['label' => 'Énergie', 'value' => 'Explosive'],
                    ['label' => 'Moment', 'value' => 'Peak time'],
                ],
                'gallery' => [
                    ['src' => 'images/pages/artists/furax.png', 'alt' => 'Portrait DJ Furax'],
                ],
                'video' => [
                    'src' => 'videos/events/storm/furax-preview.mp4',
                    'poster' => 'images/pages/artists/furax.png',
                    'title' => 'Preview vidéo',
                ],
            ],
            */
        ];
    }

    public function show(string $artist)
    {
        $artists = $this->artists();

        abort_unless(isset($artists[$artist]), 404);

        return view('pages.public.storm.artist-show', [
            'artist' => $artists[$artist],
            'artists' => $artists,
        ]);
    }
}
