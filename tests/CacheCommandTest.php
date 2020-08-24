<?php

namespace Caneco\Blicons;

use Caneco\Blicons\TestCase;

class CacheCommandTest extends TestCase
{
    /** @test */
    public function it_caches_icon_file()
    {
        $this->artisan('cache:icons')
            ->expectsOutput('Configuration cached successfully!');
    }
}
