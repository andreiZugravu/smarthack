<?php

return [

    'sidebar' => [
        'menu' => [
            'items' => [
                [
                    'title' => 'Teams',
                    'route' => 'teams.index',
                    'icon' => 'icon-stack4'
                ],
//                [
//                    'title' => "Admin",
//                    'icon' => 'icon-user-tie',
//                    'items' => [
//                        [
//                            'title' => 'Users',
//                            'route' => 'users.index',
//                            'icon' => 'icon-users'
//                        ],
//                        [
//                            'title' => 'Categories',
//                            'route' => 'categories.index',
//                            'icon' => 'icon-list-unordered'
//                        ],
//                        [
//                            'title' => 'Roles and permissions',
//                            'route' => 'admin.rolesAndPermissions',
//                            'icon' => 'icon-add-to-list'
//                        ],
//                        [
//                            'title' => 'Website configuration',
//                            'route' => 'admin.index',
//                            'icon' => 'icon-gear'
//                        ]
//                    ]
//                ],
                [
                    'title' => 'Tasks',
                    'route' => 'tasks.index',
                    'icon' => 'icon-graph'
                ]
            ]
        ]
    ],
];