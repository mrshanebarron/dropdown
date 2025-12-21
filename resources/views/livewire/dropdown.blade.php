@php
$widthStyles = [
    'sm' => '10rem',
    'md' => '12rem',
    'lg' => '16rem',
    'xl' => '20rem',
];
$menuWidth = $widthStyles[$this->width] ?? $widthStyles['md'];

$alignStyles = [
    'left' => 'left: 0;',
    'right' => 'right: 0;',
];
$menuAlign = $alignStyles[$this->align] ?? $alignStyles['left'];

$variantStyles = [
    'default' => 'background-color: white; color: #374151; border: 1px solid #d1d5db;',
    'primary' => 'background-color: #2563eb; color: white; border: none;',
    'secondary' => 'background-color: #4b5563; color: white; border: none;',
];
$buttonStyle = $variantStyles[$this->variant] ?? $variantStyles['default'];
@endphp

<div
    style="position: relative; display: inline-block;"
    x-data
    x-on:click.away="$wire.close()"
    x-on:keydown.escape.window="$wire.close()"
>
    {{-- Trigger Button --}}
    <button
        wire:click="toggle"
        style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; cursor: pointer; {{ $buttonStyle }}"
    >
        {{ $this->label }}
        <svg style="width: 1rem; height: 1rem; transition: transform 0.2s; {{ $this->open ? 'transform: rotate(180deg);' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    {{-- Dropdown Menu --}}
    @if($this->open)
        <div style="position: absolute; {{ $menuAlign }} margin-top: 0.5rem; width: {{ $menuWidth }}; background-color: white; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; z-index: 50; overflow: hidden;">
            <div style="padding: 0.25rem 0;" role="menu">
                @foreach($this->items as $index => $item)
                    @if(isset($item['label']) && $item['label'] === 'divider')
                        <div style="border-top: 1px solid #e5e7eb; margin: 0.25rem 0;"></div>
                    @elseif(isset($item['href']))
                        @php
                            $isDanger = isset($item['danger']) && $item['danger'];
                            $itemColor = $isDanger ? '#dc2626' : '#374151';
                            $hoverBg = $isDanger ? '#fef2f2' : '#f3f4f6';
                        @endphp
                        <a
                            href="{{ $item['href'] }}"
                            style="display: block; padding: 0.5rem 1rem; font-size: 0.875rem; color: {{ $itemColor }}; text-decoration: none;"
                            onmouseover="this.style.backgroundColor='{{ $hoverBg }}'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
                        >
                            @if(isset($item['icon']))
                                <span style="margin-right: 0.5rem;">{!! $item['icon'] !!}</span>
                            @endif
                            {{ $item['label'] }}
                        </a>
                    @else
                        @php
                            $isDanger = isset($item['danger']) && $item['danger'];
                            $itemColor = $isDanger ? '#dc2626' : '#374151';
                            $hoverBg = $isDanger ? '#fef2f2' : '#f3f4f6';
                        @endphp
                        <button
                            wire:click="selectItem({{ $index }})"
                            style="display: block; width: 100%; padding: 0.5rem 1rem; font-size: 0.875rem; color: {{ $itemColor }}; text-align: left; border: none; background: transparent; cursor: pointer;"
                            onmouseover="this.style.backgroundColor='{{ $hoverBg }}'"
                            onmouseout="this.style.backgroundColor='transparent'"
                        >
                            @if(isset($item['icon']))
                                <span style="margin-right: 0.5rem;">{!! $item['icon'] !!}</span>
                            @endif
                            {{ $item['label'] ?? '' }}
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
