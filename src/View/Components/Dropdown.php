<?php

namespace MrShaneBarron\Dropdown\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public function __construct(
        public string $position = 'bottom-start',
        public string $trigger = 'click',
        public bool $closeOnClick = true,
        public bool $closeOnOutsideClick = true,
        public int $offset = 4,
        public bool $animation = true,
        public string $width = 'w-48',
        public string $align = 'left'
    ) {}

    public function render(): View
    {
        return view('ld-dropdown::components.dropdown');
    }
}
