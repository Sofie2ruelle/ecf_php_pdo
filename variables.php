<?php
// variables.php

$user = [
        'pseudo' => 'Admin',
        'email' => 'admin@test.com',
        'password' => '$argon2i$v=19$m=65536,t=4,p=1$Z253VDlRSWNFUGNZZ0tlUg$I5nIoToVjVwDYR3kJDCWvYJOiDeuUqguXxgmxCcQ1UY'
        ];

$article = [
    [
        'id_article' => '1',
        'title' => 'Lorem ipsum',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue posuere ipsum at euismod. Nullam tristique, augue vel lacinia lobortis, dui nibh rhoncus est, ac pretium ligula ex ultricies arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc eu ligula ut nibh porta dictum eget sed nisl. Curabitur vitae laoreet dolor, ac interdum magna.',
        'created_at' => '2022-03-09 13:53:53',
        'is_enabled' => true,
    ],
    [
        'id_article' => '2',
        'title' => 'Nulla eu justo tellus',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue posuere ipsum at euismod. Nullam tristique, augue vel lacinia lobortis, dui nibh rhoncus est, ac pretium ligula ex ultricies arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc eu ligula ut nibh porta dictum eget sed nisl. Curabitur vitae laoreet dolor, ac interdum magna.',
        'created_at' => '2022-03-10 10:54:47',
        'is_enabled' => true,
    ],
    [
        'id_article' => '3',
        'title' => 'Veni vedi vici',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue posuere ipsum at euismod. Nullam tristique, augue vel lacinia lobortis, dui nibh rhoncus est, ac pretium ligula ex ultricies arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc eu ligula ut nibh porta dictum eget sed nisl. Curabitur vitae laoreet dolor, ac interdum magna.',
        'created_at' => '2022-03-11 11:54:47',
        'is_enabled' => true,
    ],
    [   'id_article' => '4',
        'title' => 'Alea jacta es',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue posuere ipsum at euismod. Nullam tristique, augue vel lacinia lobortis, dui nibh rhoncus est, ac pretium ligula ex ultricies arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc eu ligula ut nibh porta dictum eget sed nisl. Curabitur vitae laoreet dolor, ac interdum magna.',
        'created_at' => '2022-05-10  16:21:00',
        'is_enabled' => true,
    ],
];

if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = (int) $_GET['limit'];
} else {
    $limit = 100;
}
