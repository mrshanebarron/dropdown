<?php

namespace MrShaneBarron\Dropdown\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    public bool $open = false;
    public string $align = 'left';
    public string $width = 'md';
    public bool $closeOnClick = true;
    public bool $closeOnOutsideClick = true;
    public array $items = [];
    public string $label = 'Options';
    public string $variant = 'default';

    public function mount(
        string $align = 'left',
        string $width = 'md',
        bool $closeOnClick = true,
        bool $closeOnOutsideClick = true,
        array $items = [],
        string $label = 'Options',
        string $variant = 'default'
    ): void {
        $this->align = $align;
        $this->width = $width;
        $this->closeOnClick = $closeOnClick;
        $this->closeOnOutsideClick = $closeOnOutsideClick;
        $this->items = $items;
        $this->label = $label;
        $this->variant = $variant;
    }

    public function toggle(): void
    {
        $this->open = !$this->open;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function selectItem(int $index): void
    {
        $this->dispatch('dropdown-selected', index: $index, item: $this->items[$index] ?? null);
        if ($this->closeOnClick) {
            $this->open = false;
        }
    }

    public function render()
    {
        return view('sb-dropdown::livewire.dropdown');
    }
}
