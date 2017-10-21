<?php

//home
Breadcrumbs::register('teams.index', function ($breadcrumbs) {
    $breadcrumbs->parent('landing.index');

    $breadcrumbs->push('Teams', route('teams.index'));
});

Breadcrumbs::register('landing.index', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('landing.index'));
});

Breadcrumbs::register('teams.show', function ($breadcrumbs, $team) {
    $breadcrumbs->parent('teams.index');

    $breadcrumbs->push($team->display_name, route('teams.show', $team->id));
});