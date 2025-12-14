# Laravel Design Dropdown

Customizable dropdown menu component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/dropdown
```

For Vue components:
```bash
npm install @laraveldesign/dropdown
```

## Usage

### Livewire Component

```blade
<livewire:ld-dropdown>
    <x-slot name="trigger">
        <button>Open Menu</button>
    </x-slot>

    <a href="/profile">Profile</a>
    <a href="/settings">Settings</a>
    <a href="/logout">Logout</a>
</livewire:ld-dropdown>

{{-- With options --}}
<livewire:ld-dropdown
    position="bottom-end"
    trigger="hover"
    :close-on-click="true"
    width="w-64"
/>
```

### Blade Component

```blade
<x-ld-dropdown>
    <x-slot name="trigger">
        <button class="btn">
            Options
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </x-slot>

    <x-ld-dropdown-item href="/profile">Profile</x-ld-dropdown-item>
    <x-ld-dropdown-item href="/settings">Settings</x-ld-dropdown-item>
    <x-ld-dropdown-divider />
    <x-ld-dropdown-item href="/logout">Logout</x-ld-dropdown-item>
</x-ld-dropdown>
```

### Vue 3 Component

```vue
<script setup>
import { LdDropdown, LdDropdownItem } from '@laraveldesign/dropdown'
</script>

<template>
  <LdDropdown position="bottom-start">
    <template #trigger>
      <button>Menu</button>
    </template>

    <LdDropdownItem @click="goToProfile">Profile</LdDropdownItem>
    <LdDropdownItem @click="goToSettings">Settings</LdDropdownItem>
    <LdDropdownItem @click="logout" variant="danger">Logout</LdDropdownItem>
  </LdDropdown>
</template>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | `'bottom-start'` | Dropdown position: `bottom-start`, `bottom-end`, `top-start`, `top-end`, `left`, `right` |
| `trigger` | string | `'click'` | Trigger method: `click`, `hover` |
| `closeOnClick` | boolean | `true` | Close dropdown when item is clicked |
| `closeOnOutsideClick` | boolean | `true` | Close dropdown when clicking outside |
| `offset` | number | `4` | Offset in pixels from trigger |
| `animation` | boolean | `true` | Enable open/close animation |
| `width` | string | `'w-48'` | Tailwind width class |
| `align` | string | `'left'` | Text alignment: `left`, `right`, `center` |

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-dropdown-config
```

Customize defaults in `config/ld-dropdown.php`.

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-dropdown-views
```

### Styling

The dropdown uses Tailwind CSS classes. Customize the appearance by publishing views or using the provided config options.

## License

MIT
