<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

class TemplateComposer
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    public function compose(View $view)
    {
        $data = [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'notifications' => auth()->user()->notifications,
            'totalNotification' => auth()->user()->notifications->count()
        ];

        $view->with($data);
    }
}