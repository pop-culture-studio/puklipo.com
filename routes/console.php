<?php

use App\Console\Commands\NostrBotCommand;
use App\Jobs\SitemapJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sitemap', function () {
    SitemapJob::dispatch();
})->dailyAt('14:00');

Schedule::command(NostrBotCommand::class)->hourlyAt(30);
