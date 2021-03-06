<?php

namespace App\Traits;

trait MenuTrait {
    public static function getMenu() {
    return [
        'menu' => [
                        // Navbar items:
                        [
                            'type'         => 'navbar-search',
                            'text'         => 'search',
                            'topnav_right' => true,
                        ],
                        [
                            'type'         => 'fullscreen-widget',
                            'topnav_right' => true,
                        ],

                        // Sidebar items:
                        [
                            'type' => 'sidebar-menu-search',
                            'text' => 'search',
                        ],
                        [
                            'text' => 'blog',
                            'url'  => 'admin/blog',
                            'can'  => 'manage-blog',
                        ],
                        [
                            'text'        => 'Dassboard',
                            'url'         => '/home',
                            'icon'        => 'far fa-fw fa-file',
                            // 'label'       => 4,
                            'label_color' => 'success',
                        ],
                        ['header' => 'account_settings'],
                        [
                            'text' => 'profile',
                            'url'  => 'admin/settings',
                            'icon' => 'fas fa-fw fa-user',
                        ],
                        [
                            'text' => 'change_password',
                            'url'  => 'admin/settings',
                            'icon' => 'fas fa-fw fa-lock',
                        ],
                        [
                            'text'    => 'multilevel',
                            'icon'    => 'fas fa-fw fa-share',
                            'submenu' => [
                                [
                                    'text' => 'level_one',
                                    'url'  => '#',
                                ],
                                [
                                    'text'    => 'level_one',
                                    'url'     => '#',
                                    'submenu' => [
                                        [
                                            'text' => 'level_two',
                                            'url'  => '#',
                                        ],
                                        [
                                            'text'    => 'level_two',
                                            'url'     => '#',
                                            'submenu' => [
                                                [
                                                    'text' => 'level_three',
                                                    'url'  => '#',
                                                ],
                                                [
                                                    'text' => 'level_three',
                                                    'url'  => '#',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'text' => 'level_one',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                        ['header' => 'labels'],
                        [
                            'text'       => 'important',
                            'icon_color' => 'red',
                            'url'        => '#',
                        ],
                        [
                            'text'       => 'warning',
                            'icon_color' => 'yellow',
                            'url'        => '#',
                        ],
                        [
                            'text'       => 'information',
                            'icon_color' => 'cyan',
                            'url'        => '#',
                        ],
                    ]
            ];
    }
}
