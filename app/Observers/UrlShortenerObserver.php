<?php

namespace App\Observers;

use App\UrlShortener;

class UrlShortenerObserver
{
    /**
     * Handle the url shortener "created" event.
     *
     * @param  \App\UrlShortener  $urlShortener
     * @return void
     */
    public function created(UrlShortener $urlShortener)
    {
        $urlShortener->short_url = url('/').'/s/'.UrlShortener::generateId64($urlShortener->getKey());
        $urlShortener->save();
    }

    /**
     * Handle the url shortener "updated" event.
     *
     * @param  \App\UrlShortener  $urlShortener
     * @return void
     */
    public function updated(UrlShortener $urlShortener)
    {
        //
    }

    /**
     * Handle the url shortener "deleted" event.
     *
     * @param  \App\UrlShortener  $urlShortener
     * @return void
     */
    public function deleted(UrlShortener $urlShortener)
    {
        //
    }

    /**
     * Handle the url shortener "restored" event.
     *
     * @param  \App\UrlShortener  $urlShortener
     * @return void
     */
    public function restored(UrlShortener $urlShortener)
    {
        //
    }

    /**
     * Handle the url shortener "force deleted" event.
     *
     * @param  \App\UrlShortener  $urlShortener
     * @return void
     */
    public function forceDeleted(UrlShortener $urlShortener)
    {
        //
    }
}
