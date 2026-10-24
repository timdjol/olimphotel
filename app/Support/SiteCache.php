<?php

namespace App\Support;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Slider;
use App\Models\Travel;
use App\Models\Vantage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SiteCache
{
    public const ROOMS = 'site.rooms';
    public const CONTACTS = 'site.contacts';
    public const SLIDERS = 'site.sliders';
    public const VANTAGES = 'site.vantages';
    public const TRAVELS = 'site.travels';
    public const RENTS = 'site.rents';
    public const FAQS = 'site.faqs';

    public static function rooms(): Collection
    {
        return Cache::remember(self::ROOMS, 3600, function () {
            return Room::query()->get()->sortBy('sort')->values();
        });
    }

    public static function contacts(): Collection
    {
        return Cache::remember(self::CONTACTS, 3600, fn () => Contact::query()->get());
    }

    public static function sliders(): Collection
    {
        return Cache::remember(self::SLIDERS, 3600, fn () => Slider::query()->get());
    }

    public static function vantages(): Collection
    {
        return Cache::remember(self::VANTAGES, 3600, fn () => Vantage::query()->get());
    }

    public static function travels(): Collection
    {
        return Cache::remember(self::TRAVELS, 3600, fn () => Travel::query()->get());
    }

    public static function rents(): Collection
    {
        return Cache::remember(self::RENTS, 3600, fn () => Rent::query()->get());
    }

    public static function faqs()
    {
        return Cache::remember(self::FAQS, 3600, fn () => Faq::query()->get());
    }

    public static function page(int $id): ?Page
    {
        return Cache::remember('site.page.'.$id, 3600, fn () => Page::query()->find($id));
    }

    public static function forgetPages(): void
    {
        foreach ([4, 5, 6] as $id) {
            Cache::forget('site.page.'.$id);
        }
    }
}
