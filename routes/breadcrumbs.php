<?php

//home
Breadcrumbs::register('teams.index', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('teams.index'));
});