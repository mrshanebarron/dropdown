<?php

namespace MrShaneBarron\Dropdown\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dropdown extends Component
{
    public string $position = 'bottom-start';
    public string $trigger = 'click';
    public bool $closeOnClick = true;
    public bool $closeOnOutsideClick = true;
    public int $offset = 4;
    public bool $animation = true;
    public string $width = 'w-48';
    public string $align = 'left';

    public function mount(
        string $position = 'bottom-start',
        string $trigger = 'click',
        bool $closeOnClick = true,
        bool $closeOnOutsideClick = true,
        int $offset = 4,
        bool $animation = true,
        string $width = 'w-48',
        string $align = 'left'
    ): void {
        $this->position = $position;
        $this->trigger = $trigger;
        $this->closeOnClick = $closeOnClick;
        $this->closeOnOutsideClick = $closeOnOutsideClick;
        $this->offset = $offset;
        $this->animation = $animation;
        $this->width = $width;
        $this->align = $align;
    }

    public function render(): View
    {
        return view('ld-dropdown::components.dropdown');
    }
}
