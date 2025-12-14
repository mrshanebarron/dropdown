<template>
  <div class="relative inline-block text-left" ref="containerRef">
    <!-- Trigger -->
    <div @click="toggle">
      <slot name="trigger"></slot>
    </div>

    <!-- Dropdown Menu -->
    <Transition name="dropdown">
      <div
        v-if="open"
        :class="['absolute z-50 mt-2 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none', widthClass, alignClass]"
        @click="closeOnClick && close()"
        role="menu"
        aria-orientation="vertical"
      >
        <div class="py-1">
          <slot></slot>
        </div>
      </div>
    </Transition>
  </div>
</template>

<script>
import { ref, computed, onMounted, onUnmounted } from 'vue';

export default {
  name: 'SbDropdown',
  props: {
    align: { type: String, default: 'left' },
    width: { type: String, default: '48' },
    closeOnClick: { type: Boolean, default: true },
    closeOnOutsideClick: { type: Boolean, default: true }
  },
  setup(props) {
    const open = ref(false);
    const containerRef = ref(null);

    const widths = {
      '48': 'w-48',
      '56': 'w-56',
      '64': 'w-64',
      '72': 'w-72',
      '96': 'w-96'
    };

    const alignments = {
      left: 'left-0',
      right: 'right-0',
      center: 'left-1/2 -translate-x-1/2'
    };

    const widthClass = computed(() => widths[props.width] || 'w-48');
    const alignClass = computed(() => alignments[props.align] || 'left-0');

    const toggle = () => {
      open.value = !open.value;
    };

    const close = () => {
      open.value = false;
    };

    const handleClickOutside = (e) => {
      if (props.closeOnOutsideClick && containerRef.value && !containerRef.value.contains(e.target)) {
        close();
      }
    };

    const handleEscape = (e) => {
      if (e.key === 'Escape') {
        close();
      }
    };

    onMounted(() => {
      document.addEventListener('click', handleClickOutside);
      document.addEventListener('keydown', handleEscape);
    });

    onUnmounted(() => {
      document.removeEventListener('click', handleClickOutside);
      document.removeEventListener('keydown', handleEscape);
    });

    return { open, containerRef, widthClass, alignClass, toggle, close };
  }
};
</script>

<style scoped>
.dropdown-enter-active,
.dropdown-leave-active {
  transition: all 0.15s ease;
}
.dropdown-enter-from,
.dropdown-leave-to {
  opacity: 0;
  transform: translateY(-4px);
}
</style>
