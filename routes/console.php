<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Kalau Korang Tak Panjat Pokok Banana, Macam Mana Nak Dapat Banana?');
