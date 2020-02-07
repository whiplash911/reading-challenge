<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > [Profile]
Breadcrumbs::for('profile', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('profile', $user->id));
});

// Home > Challenges
Breadcrumbs::for('challenges', function ($trail) {
    $trail->parent('home');
    $trail->push('Challenges', route('challenges'));
});

// Home > Challenges > Create
Breadcrumbs::for('challenges_create', function ($trail) {
    $trail->parent('challenges');
    $trail->push('Create new Challenge', route('challenges'));
});

// Home > Challenges > [Challenge]
Breadcrumbs::for('challenges_show', function ($trail, $challenge) {
    $trail->parent('challenges');
    $trail->push($challenge->name, route('challenges', $challenge->id));
});
