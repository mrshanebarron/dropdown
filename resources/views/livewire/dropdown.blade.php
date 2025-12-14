@php
    $widthClass = config('ld-dropdown.widths.' . $width, 'w-48');
    $alignClass = config('ld-dropdown.alignments.' . $align, 'left-0');
@endphp

<div
    class="{{ config('ld-dropdown.classes.container') }}"
    wire:click.away="@if($closeOnOutsideClick) close @endif"
    wire:keydown.escape="close"
>
    {{-- Trigger --}}
    <div wire:click="toggle">
        {{ $trigger }}
    </div>

    {{-- Dropdown Menu --}}
    @if($open)
        <div
            class="{{ config('ld-dropdown.classes.menu') }} {{ $widthClass }} {{ $alignClass }}"
            @if($closeOnClick) wire:click="close" @endif
        >
            <div class="py-1" role="menu" aria-orientation="vertical">
                {{ $slot }}
            </div>
        </div>
    @endif
</div>
