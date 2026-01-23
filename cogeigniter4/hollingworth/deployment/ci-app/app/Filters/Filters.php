<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;

class Filters extends BaseFilters
{
    // ...existing code...

    public array $globals = [
        'before' => [
            // ...existing filters...
        ],
        'after' => [
            'toolbar',
            // ...existing filters...
        ],
    ];

    // Add or update this property to enable method spoofing
    public array $methods = [
        'post' => ['csrf'],
        'get'  => ['csrf'],
    ];

    // ...existing code...
}