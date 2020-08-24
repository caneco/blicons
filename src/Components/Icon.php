<?php

namespace Caneco\Blicons\Components;

use Illuminate\View\Component;

final class Icon extends Component
{
    public string $type;

    public string $class;

    public function __construct(string $type = 'default', string $class = '')
    {
        $this->type = $type;
        $this->class = $class;
    }

    public function render()
    {
        return view('blicons::components.icon');
    }
}
