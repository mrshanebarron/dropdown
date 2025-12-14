<div
    x-data="{
        open: false,
        toggle() { this.open = !this.open },
        close() { this.open = false },
        trigger: '{{ $trigger }}',
        closeOnClick: {{ $closeOnClick ? 'true' : 'false' }},
    }"
    @if($closeOnOutsideClick) @click.outside="close()" @endif
    @keydown.escape.window="close()"
    class="relative inline-block"
>
    {{-- Trigger --}}
    <div
        @if($trigger === 'click') @click="toggle()" @endif
        @if($trigger === 'hover') @mouseenter="open = true" @mouseleave="open = false" @endif
        class="cursor-pointer"
    >
        {{ $triggerSlot ?? $slot }}
    </div>

    {{-- Dropdown Menu --}}
    <div
        x-show="open"
        x-cloak
        @if($animation)
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @endif
        @if($closeOnClick) @click="close()" @endif
        class="absolute z-50 mt-{{ $offset }} {{ $width }} rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none
            {{ $align === 'right' ? 'right-0' : 'left-0' }}
            {{ str_contains($position, 'top') ? 'bottom-full mb-' . $offset : '' }}"
        style="{{ str_contains($position, 'top') ? 'bottom: 100%;' : '' }}"
    >
        <div class="py-1">
            {{ $content ?? '' }}
        </div>
    </div>
</div>
