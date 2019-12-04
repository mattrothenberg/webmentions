<?php

namespace Mattrothenberg\Webmentions;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \Mattrothenberg\Webmentions\Webmentions::class
    ];
}
