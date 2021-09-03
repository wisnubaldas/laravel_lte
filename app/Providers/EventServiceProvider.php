<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add('MONITORING BANJIR');
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => 'home',
            ]);
            $event->menu->add([
                'text' => 'Alat Pengukur Air',
                'url' => '/create-alat-pengukur',
            ]);
            $event->menu->add([
                'text' => 'Report',
                'url' => 'home/report',
            ]);
            // $event->menu->add('PEOPLE COUNTING');
            // $event->menu->add('MONITORING SUHU');
            // $event->menu->add('CONTROL AC');
            // $event->menu->add('PANEL LISTRIK');

        });
    }
}
