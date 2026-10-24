<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Slider;
use App\Models\Travel;
use App\Models\Vantage;
use App\Support\SiteCache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('routeactive', function($route){
           return "<?php echo Route::currentRouteNamed($route) ? 'class=\"current\"' : ''  ?>";
        });

        Blade::if('admin', function(){
            return Auth::user()?->isAdmin() ?? false;
        });

        $forget = function (string $key) {
            return function () use ($key) {
                Cache::forget($key);
            };
        };

        foreach ([Room::class => SiteCache::ROOMS, Contact::class => SiteCache::CONTACTS, Slider::class => SiteCache::SLIDERS, Vantage::class => SiteCache::VANTAGES, Travel::class => SiteCache::TRAVELS, Rent::class => SiteCache::RENTS, Faq::class => SiteCache::FAQS] as $model => $key) {
            $model::saved($forget($key));
            $model::deleted($forget($key));
            if (in_array(SoftDeletes::class, class_uses_recursive($model), true)) {
                $model::restored($forget($key));
            }
        }

        Page::saved(fn () => SiteCache::forgetPages());
        Page::deleted(fn () => SiteCache::forgetPages());
    }
}
