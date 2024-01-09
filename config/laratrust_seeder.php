<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'owner' => [
            'roles'                       => 'c,r,u,d',
            'admins'                      => 'c,r,u,d',
            'users'                       => 'c,r,u,d',
            'grades'                      => 'c,r,u,d',
            'class_rooms'                 => 'c,r,u,d',
            'sections'                    => 'c,r,u,d',
            'teachers'                    => 'c,r,u,d',
            'students'                    => 'c,r,u,d',
            'rooms'                       => 'c,r,u,d',
            'courses'                     => 'c,r,u,d',
        ],

        'admin' => [] ,
        'user' => [] ,


    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ],

    'roles_structure_arabic' => [
        'superadmin'    => 'مشرف عام',
        'admin'         => 'مشرف',
        'user'          => 'مستخدم'
    ],

    'roles_structure_color' => [
        'superadmin'    => '#F00',
        'admin'         => '#00F',
        'user'          => '#080'
    ],
];
