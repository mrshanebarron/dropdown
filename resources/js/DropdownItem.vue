<template>
  <component
    :is="href ? 'a' : 'button'"
    :href="href"
    :type="href ? undefined : 'button'"
    :disabled="disabled"
    :class="[
      'block w-full px-4 py-2 text-left text-sm',
      disabled ? 'text-gray-400 cursor-not-allowed' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'
    ]"
    role="menuitem"
  >
    <slot></slot>
  </component>
</template>

<script>
export default {
  name: 'LdDropdownItem',
  props: {
    href: { type: String, default: null },
    disabled: { type: Boolean, default: false }
  }
};
</script>
