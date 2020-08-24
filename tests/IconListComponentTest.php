<?php

namespace Caneco\Blicons;

use Caneco\Blicons\TestCase;
use Caneco\Blicons\Components\Icon;
use Illuminate\Support\Facades\View;
use Caneco\Blicons\Components\IconList;

class IconListComponentTest extends TestCase
{
    /** @test */
    public function it_can_render_an_empty_icon_list()
    {
        $compiled = $this->renderComponent(IconList::class, []);

          $expected = <<<HTML
<svg hidden>
    <defs>
            </defs>
</svg>
HTML;

        $this->assertSame($compiled, $expected);
    }

    /** @test */
    public function it_can_render_an_icon_list()
    {
        $required = $this->renderComponent(Icon::class, ['type' => 'user']);

        $compiled = $this->renderComponent(IconList::class, []);

        $expected = <<<HTML
<svg hidden>
    <defs>
                    <g id="icon:user"></g>
            </defs>
</svg>
HTML;

        $this->assertSame($compiled, $expected);
    }
}
