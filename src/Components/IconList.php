<?php

namespace Caneco\Blicons\Components;

use Illuminate\View\Component;

final class IconList extends Component
{
    public array $list;

    public function __construct()
    {
        $this->list = rescue(fn () => require bootstrap_path('cache/icons.php'), []);
    }

    public function render()
    {
        return view('blicons::components.icon-list');
    }
}
