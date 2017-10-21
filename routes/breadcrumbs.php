<?php

//home
Breadcrumbs::register('teams.index', function ($breadcrumbs) {
    $breadcrumbs->parent('landing.index');

    $breadcrumbs->push('Teams', route('teams.index'));
});

Breadcrumbs::register('landing.index', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('landing.index'));
});