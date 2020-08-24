<?php

namespace Caneco\Blicons;

use Caneco\Blicons\TestCase;
use Caneco\Blicons\Components\Icon;

class IconComponentTest extends TestCase
{
    /** @test */
    public function it_can_render_an_icon()
    {
        $compiled = $this->renderComponent(Icon::class, ['type' => 'user']);

        $expected = <<<HTML
<svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img" data-icon>
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon:user" />
</svg>
HTML;
        $this->assertSame($compiled, $expected);
    }

    /** @test */
    public function it_can_render_an_icon_with_default_classes()
    {
        $compiled = $this->renderComponent(Icon::class, []);

        $expected = <<<HTML
<svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img" data-icon>
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon:default" />
</svg>
HTML;

        $this->assertSame($compiled, $expected);
    }

    /** @test */
    public function it_can_render_an_icon_with_default_classes_and_added_classes()
    {
        $compiled = $this->renderComponent(Icon::class, ['class' => 'text-red-500 w-12 h-12']);

        $expected = <<<HTML
<svg class="text-red-500 w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img" data-icon>
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon:default" />
</svg>
HTML;

        $this->assertSame($compiled, $expected);
    }
}
