<?php

return [
    'events' => [
        [
            'slug' => 'safari-2026',
            'title' => 'Safari Party',
            'category' => 'soiree',
            'category_label' => 'Soirée',
            'year' => 2026,
            'date_label' => 'Ven. 11 septembre 2026',
            'start_at' => '2026-09-11 21:30:00',
            'end_at' => '2026-09-12 03:00:00',
            'location' => 'Chapiteau de la Jeunesse Aubinoise, Aubin',
            'image' => 'images/programme/safari.jpg',
            'summary' => 'La soirée Safari revient pour une nouvelle édition sauvage.',
            'details' => [
                [
                    'time' => '21:30',
                    'title' => 'Ouverture des portes',
                    'description' => 'Début de la soirée Safari.',
                    'icon' => 'schedule',
                ],
                [
                    'time' => '22:00',
                    'title' => 'Début de la soirée',
                    'description' => 'Ambiance jungle, musique et animations.',
                    'icon' => 'celebration',
                ],
            ],
            'actions' => [
                'ticket' => [
                    'label' => 'Acheter des billets',
                    'url' => '/billetterie/safari',
                ],
                'registration' => null,
                'calendar' => true,
            ],
        ],

        [
            'slug' => 'storm-2026',
            'title' => 'Storm Festival',
            'category' => 'soiree',
            'category_label' => 'Soirée',
            'year' => 2026,
            'date_label' => 'Dim. 13 septembre 2026',
            'start_at' => '2026-09-13 22:00:00',
            'end_at' => '2026-09-14 03:00:00',
            'location' => 'Chapiteau de la Jeunesse Aubinoise, Aubin',
            'image' => 'images/programme/storm.jpg',
            'summary' => 'Une soirée électro intense dans l’esprit Storm.',
            'details' => [
                [
                    'time' => '22:00',
                    'title' => 'Ouverture des portes',
                    'description' => 'Début de la soirée Storm.',
                    'icon' => 'schedule',
                ],
                [
                    'time' => '23:00',
                    'title' => 'Line-up DJ',
                    'description' => 'Plusieurs DJs pour une ambiance rave et électro.',
                    'icon' => 'music_note',
                ],
            ],
            'actions' => [
                'ticket' => [
                    'label' => 'Acheter des billets',
                    'url' => '/billetterie/storm',
                ],
                'registration' => null,
                'calendar' => true,
            ],
        ],

        [
            'slug' => 'tournoi-flechettes-2026',
            'title' => 'Tournoi de fléchettes',
            'category' => 'activite',
            'category_label' => 'Activité',
            'year' => 2026,
            'date_label' => 'Sam. 19 septembre 2026',
            'start_at' => '2026-09-19 18:00:00',
            'end_at' => '2026-09-19 23:00:00',
            'location' => 'Chapiteau de la Jeunesse Aubinoise, Aubin',
            'image' => 'images/programme/flechettes.jpg',
            'summary' => 'Un tournoi convivial de fléchettes ouvert aux participants.',
            'details' => [
                [
                    'time' => '18:00',
                    'title' => 'Début des inscriptions',
                    'description' => 'Accueil des participants et validation des équipes.',
                    'icon' => 'edit_calendar',
                ],
                [
                    'time' => '19:00',
                    'title' => 'Début du tournoi',
                    'description' => 'Lancement des matchs.',
                    'icon' => 'sports_esports',
                ],
            ],
            'actions' => [
                'ticket' => null,
                'registration' => [
                    'label' => 'S’inscrire',
                    'url' => '#',
                ],
                'calendar' => true,
            ],
        ],

        [
            'slug' => 'spectacle-2026',
            'title' => 'Spectacle',
            'category' => 'spectacle',
            'category_label' => 'Spectacle',
            'year' => 2026,
            'date_label' => 'Dim. 20 septembre 2026',
            'start_at' => '2026-09-20 20:00:00',
            'end_at' => '2026-09-20 22:30:00',
            'location' => 'Chapiteau de la Jeunesse Aubinoise, Aubin',
            'image' => 'images/programme/spectacle.jpg',
            'summary' => 'Un spectacle familial organisé sous le chapiteau.',
            'details' => [
                [
                    'time' => '20:00',
                    'title' => 'Début du spectacle',
                    'description' => 'Spectacle ouvert au public.',
                    'icon' => 'theater_comedy',
                ],
            ],
            'actions' => [
                'ticket' => null,
                'registration' => null,
                'calendar' => true,
            ],
        ],
    ],
];
