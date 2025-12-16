@php
    $widthClass = config('sb-dropdown.widths.' . $width, 'w-48');
    $alignClass = config('sb-dropdown.alignments.' . $align, 'left-0');
@endphp

<div
    class="{{ config('sb-dropdown.classes.container') }}"
    wire:click.away="@if($closeOnOutsideClick) close @endif"
    wire:keydown.escape="close"
>
    {{-- Trigger --}}
    <div wire:click="toggle">
        @if($trigger)
            {!! $trigger !!}
        @else
            {{ $slot ?? '' }}
        @endif
    </div>

    {{-- Dropdown Menu --}}
    @if($open)
        <div
            class="{{ config('sb-dropdown.classes.menu') }} {{ $widthClass }} {{ $alignClass }}"
            @if($closeOnClick) wire:click="close" @endif
        >
            <div class="py-1" role="menu" aria-orientation="vertical">
                @if(count($items) > 0)
                    @foreach($items as $item)
                        @if(isset($item['separator']) && $item['separator'])
                            <div class="border-t border-gray-100 my-1"></div>
                        @elseif(isset($item['href']))
                            <a
                                href="{{ $item['href'] }}"
                                class="{{ config('sb-dropdown.classes.item') }} {{ $item['class'] ?? '' }}"
                                @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
                            >
                                {{ $item['label'] }}
                            </a>
                        @elseif(isset($item['action']))
                            <button
                                type="button"
                                wire:click="{{ $item['action'] }}"
                                class="{{ config('sb-dropdown.classes.item') }} {{ $item['class'] ?? '' }} w-full text-left"
                            >
                                {{ $item['label'] }}
                            </button>
                        @else
                            <div class="{{ config('sb-dropdown.classes.item') }} {{ $item['class'] ?? '' }}">
                                {{ $item['label'] }}
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    @endif
</div>
