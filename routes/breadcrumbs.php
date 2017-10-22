<?php

//home

Breadcrumbs::register('teams.index', function ($breadcrumbs) {
    $breadcrumbs->push('Teams', route('teams.index'));
});

Breadcrumbs::register('tasks.index', function ($breadcrumbs) {
    $breadcrumbs->push('Tasks', route('tasks.index'));
});

Breadcrumbs::register('teams.show', function ($breadcrumbs, $team) {
    $breadcrumbs->parent('teams.index');

    $breadcrumbs->push($team->display_name, route('teams.show', $team->id));
});