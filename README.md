# Dropdown

A dropdown menu component for Laravel applications. Supports various widths, alignments, and auto-close behaviors. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/dropdown
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-dropdown>
    <x-slot name="trigger">
        <button>Options</button>
    </x-slot>

    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
</livewire:sb-dropdown>
```

### Right Aligned

```blade
<livewire:sb-dropdown align="right">
    <x-slot name="trigger">
        <button>Menu</button>
    </x-slot>

    <a href="#">Profile</a>
    <a href="#">Settings</a>
    <a href="#">Logout</a>
</livewire:sb-dropdown>
```

### Custom Width

```blade
<livewire:sb-dropdown width="72">
    <x-slot name="trigger">
        <button>Wide Menu</button>
    </x-slot>

    <div class="p-4">Custom content here</div>
</livewire:sb-dropdown>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `align` | string | `'left'` | Alignment: `left`, `right`, `center` |
| `width` | string | `'48'` | Width: `48`, `56`, `64`, `72`, `96` |
| `close-on-click` | boolean | `true` | Close when item clicked |
| `close-on-outside-click` | boolean | `true` | Close on outside click |

## Vue 3 Usage

### Setup

```javascript
import { SbDropdown, SbDropdownItem } from './vendor/sb-dropdown';
app.component('SbDropdown', SbDropdown);
app.component('SbDropdownItem', SbDropdownItem);
```

### Basic Usage

```vue
<template>
  <SbDropdown>
    <template #trigger>
      <button class="px-4 py-2 bg-gray-100 rounded">
        Options
      </button>
    </template>

    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Duplicate</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
  </SbDropdown>
</template>
```

### Alignment Options

```vue
<template>
  <!-- Left aligned (default) -->
  <SbDropdown align="left">...</SbDropdown>

  <!-- Right aligned -->
  <SbDropdown align="right">...</SbDropdown>

  <!-- Center aligned -->
  <SbDropdown align="center">...</SbDropdown>
</template>
```

### Width Options

```vue
<template>
  <SbDropdown width="48">...</SbDropdown>  <!-- 12rem -->
  <SbDropdown width="56">...</SbDropdown>  <!-- 14rem -->
  <SbDropdown width="64">...</SbDropdown>  <!-- 16rem -->
  <SbDropdown width="72">...</SbDropdown>  <!-- 18rem -->
  <SbDropdown width="96">...</SbDropdown>  <!-- 24rem -->
</template>
```

### User Menu Example

```vue
<template>
  <SbDropdown align="right" width="56">
    <template #trigger>
      <button class="flex items-center gap-2">
        <SbAvatar :src="user.avatar" :name="user.name" size="sm" />
        <span>{{ user.name }}</span>
      </button>
    </template>

    <div class="px-4 py-3 border-b">
      <p class="text-sm text-gray-900">{{ user.name }}</p>
      <p class="text-xs text-gray-500">{{ user.email }}</p>
    </div>

    <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
    <a href="/settings" class="block px-4 py-2 hover:bg-gray-100">Settings</a>

    <div class="border-t">
      <button @click="logout" class="block w-full px-4 py-2 text-left text-red-600 hover:bg-gray-100">
        Logout
      </button>
    </div>
  </SbDropdown>
</template>
```

### Prevent Auto-Close

```vue
<template>
  <!-- Don't close when clicking items -->
  <SbDropdown :close-on-click="false">
    <template #trigger>
      <button>Filters</button>
    </template>

    <label class="flex items-center px-4 py-2">
      <input type="checkbox" v-model="filters.active" class="mr-2">
      Active
    </label>
    <label class="flex items-center px-4 py-2">
      <input type="checkbox" v-model="filters.archived" class="mr-2">
      Archived
    </label>
  </SbDropdown>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `align` | String | `'left'` | Position: `left`, `right`, `center` |
| `width` | String | `'48'` | Width class suffix |
| `closeOnClick` | Boolean | `true` | Close when content clicked |
| `closeOnOutsideClick` | Boolean | `true` | Close on outside click |

### Slots

| Slot | Description |
|------|-------------|
| `trigger` | Element that opens dropdown |
| default | Dropdown menu content |

## Features

- **Auto-close**: Closes on outside click and Escape key
- **Animations**: Smooth fade and slide transitions
- **Flexible Width**: Multiple preset width options
- **Alignment**: Left, right, or center aligned

## Accessibility

- `role="menu"` attribute
- `aria-orientation="vertical"`
- Escape key closes menu
- Focus management

## Styling

Uses Tailwind CSS:
- White background with shadow
- Ring border effect
- Smooth transition animation
- Z-index for proper stacking

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
