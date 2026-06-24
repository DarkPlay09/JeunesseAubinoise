<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Gallery albums
    |--------------------------------------------------------------------------
    |
    | Structure temporaire avant passage en base de données.
    | Plus tard, cette structure pourra être remplacée par des tables :
    | gallery_albums, gallery_photos, gallery_categories.
    |
    */

    'albums' => [
        [
            'slug' => 'safari-2024',
            'title' => 'Safari 2024',
            'category' => 'safari',
            'category_label' => 'Safari',
            'year' => 2024,
            'cover' => 'images/gallery/safari-2024/cover.jpg',
            'description' => 'Revivez les meilleurs moments de la Safari 2024.',
            'photos_count' => 3,
            'photos' => [
                [
                    'src' => 'images/gallery/safari-2024/photo-1.jpg',
                    'alt' => 'Ambiance Safari 2024',
                ],
                [
                    'src' => 'images/gallery/safari-2024/photo-2.jpg',
                    'alt' => 'Public Safari 2024',
                ],
                [
                    'src' => 'images/gallery/safari-2024/photo-3.jpg',
                    'alt' => 'Soirée Safari 2024',
                ],
            ],
        ],

        [
            'slug' => 'storm-2024',
            'title' => 'Storm 2024',
            'category' => 'storm',
            'category_label' => 'Storm',
            'year' => 2024,
            'cover' => 'images/gallery/storm-2024/cover.jpg',
            'description' => 'Revivez l’énergie de la soirée Storm 2024.',
            'photos_count' => 3,
            'photos' => [
                [
                    'src' => 'images/gallery/storm-2024/photo-1.jpg',
                    'alt' => 'Ambiance Storm 2024',
                ],
                [
                    'src' => 'images/gallery/storm-2024/photo-2.jpg',
                    'alt' => 'DJ Storm 2024',
                ],
                [
                    'src' => 'images/gallery/storm-2024/photo-3.jpg',
                    'alt' => 'Public Storm 2024',
                ],
            ],
        ],
    ],
];
