<?php

namespace App\Traits;

trait MenuTrait {
    public static function buildMenu($event)
    {
        // Add some items to the menu...

        $event->menu->add([
            'text' => 'KETINGGIAN AIR',
            'icon'    => 'fas fa-water',
            'url' => '/flood-banjir',
        ]);
        $event->menu->add([
            'text' => 'Alat Pengukur Air',
            // 'icon'    => 'fas fa-fw fa-tachometer-alt',
            'submenu' => [
                [
                    'text' => 'Tambah Alat',
                    'url' => '/create-alat-pengukur',
                ],
                [
                    'text' => 'Report',
                    'url' => 'home/report',
                ],
            ]
        ]);


        $event->menu->add([
            'text' => 'PEOPLE COUNTING',
            'icon'    => 'fas fa-users-cog',
            'url' => '#',
        ]);
        $event->menu->add([
            'text' => 'Alat People Counting',
            'submenu' => [
                [
                    'text' => 'Tambah Alat',
                    'url' => '#',
                ],
                [
                    'text' => 'Report',
                    'url' => '#',
                ],
            ]
        ]);


        $event->menu->add([
            'text' => 'MONITORING SUHU',
            'icon'    => 'fas fa-temperature-high',
            'url' => '#',
        ]);
        $event->menu->add([
            'text' => 'Alat Monitoring Suhu',
            'submenu' => [
                [
                    'text' => 'Tambah Alat',
                    'url' => '#',
                ],
                [
                    'text' => 'Report',
                    'url' => '#',
                ],
            ]
        ]);


        $event->menu->add([
            'text' => 'CONTROL AC',
            'icon'    => 'fas fa-digital-tachograph',
            'url' => '#',
        ]);
        $event->menu->add([
            'text' => 'Alat Control AC',
            'submenu' => [
                [
                    'text' => 'Tambah Alat',
                    'url' => '#',
                ],
                [
                    'text' => 'Report',
                    'url' => '#',
                ],
            ]
        ]);


        $event->menu->add([
            'text' => 'PANEL LISTRIK',
            'icon'    => 'fas fa-bolt',
            'url' => '#',
        ]);
        $event->menu->add([
            'text' => 'Alat Panel Listrik',
            'submenu' => [
                [
                    'text' => 'Tambah Alat',
                    'url' => '#',
                ],
                [
                    'text' => 'Report',
                    'url' => '#',
                ],
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
