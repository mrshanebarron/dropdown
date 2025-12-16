<?php

namespace MrShaneBarron\Dropdown\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    public bool $open = false;
    public string $align = 'left';
    public string $width = '48';
    public bool $closeOnClick = true;
    public bool $closeOnOutsideClick = true;
    public array $items = [];
    public string $trigger = '';

    public function mount(
        string $align = 'left',
        string $width = '48',
        bool $closeOnClick = true,
        bool $closeOnOutsideClick = true,
        array $items = [],
        string $trigger = ''
    ): void {
        $this->align = $align;
        $this->width = $width;
        $this->closeOnClick = $closeOnClick;
        $this->closeOnOutsideClick = $closeOnOutsideClick;
        $this->items = $items;
        $this->trigger = $trigger;
    }

    public function toggle(): void
    {
        $this->open = !$this->open;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function render()
    {
        return view('sb-dropdown::livewire.dropdown');
    }
}
