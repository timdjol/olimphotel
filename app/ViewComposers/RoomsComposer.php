<?php

namespace App\ViewComposers;

use App\Support\SiteCache;
use Illuminate\View\View;

class RoomsComposer
{
    public function compose(View $view){
        $view->with('rooms', SiteCache::rooms());
    }
}