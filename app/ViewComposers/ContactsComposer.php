<?php

namespace App\ViewComposers;

use App\Support\SiteCache;
use Illuminate\View\View;

class ContactsComposer
{
    public function compose(View $view){
        $view->with('contacts', SiteCache::contacts());
    }
}