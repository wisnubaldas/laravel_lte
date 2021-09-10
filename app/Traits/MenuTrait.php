<?php

namespace App\Traits;

trait MenuTrait {
    public static function buildMenu($event)
    {
        // Add some items to the menu...

        $event->menu->add([
            'text' => 'KETINGGIAN AIR',
            'icon'    => 'fas fa-water',
            'submenu' => [
                [
                    'text' => 'Dashboard',
                    'url' => '/flood-banjir',
                    'icon'    => 'fas fa-fw fa-folder',
                ],
                [
                    'text' => 'Device',
                    'icon'    => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tambah Alat',
                            'url' => '/create-alat-pengukur',
                            'shift'   => 'ml-1',
                        ],
                        [
                            'text' => 'Report',
                            'url' => 'home/report',
                            'shift'   => 'ml-1',
                        ],
                    ]
                ]
            ]
        ]);

        $event->menu->add([
            'text' => 'PEOPLE COUNTING',
            'icon'    => 'fas fa-users-cog',
            'submenu' => [
                [
                    'text' => 'Dashboard',
                    'url' => '/people-counting',
                    'icon'    => 'fas fa-fw fa-folder',
                ],
                [
                    'text' => 'Device',
                    'icon'    => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tambah Alat',
                            'url' => '/people-counting/create-alat',
                            'shift'   => 'ml-1',

                        ],
                        [
                            'text' => 'Report',
                            'url' => 'people-counting/report',
                            'shift'   => 'ml-1',

                        ],
                    ]
                ]
            ]
        ]);
        $event->menu->add([
            'text' => 'MONITORING SUHU',
            'icon'    => 'fas fa-temperature-high',
            'submenu' => [
                [
                    'text' => 'Dashboard',
                    'url' => '/deteksi-suhu',
                    'icon'    => 'fas fa-fw fa-folder',
                ],
                [
                    'text' => 'Device',
                    'icon'    => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tambah Alat',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                        [
                            'text' => 'Report',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                    ]
                ]
            ]
        ]);
        $event->menu->add([
            'text' => 'CONTROL AC',
            'icon'    => 'fas fa-digital-tachograph',
            'submenu' => [
                [
                    'text' => 'Dashboard',
                    'url' => '#',
                    'icon'    => 'fas fa-fw fa-folder',
                ],
                [
                    'text' => 'Device',
                    'icon'    => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tambah Alat',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                        [
                            'text' => 'Report',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                    ]
                ]
            ]
        ]);

        $event->menu->add([
            'text' => 'PANEL LISTRIK',
            'icon'    => 'fas fa-bolt',
            'submenu' => [
                [
                    'text' => 'Dashboard',
                    'url' => '#',
                    'icon'    => 'fas fa-fw fa-folder',
                ],
                [
                    'text' => 'Device',
                    'icon'    => 'fas fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => 'Tambah Alat',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                        [
                            'text' => 'Report',
                            'url' => '#',
                            'shift'   => 'ml-1',

                        ],
                    ]
                ]
            ]
        ]);


        $event->menu->add([
            'text' => 'SETTING',
            'icon'    => 'fas fa-fw fa-tasks',
            'submenu' => [
                [
                    'text' => 'User',
                    'url' => '#',
                ],
                [
                    'text' => 'Group',
                    'url' => '#',
                ],
            ]
        ]);
    }
}
