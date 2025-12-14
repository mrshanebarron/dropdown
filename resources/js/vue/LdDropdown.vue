<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'

interface Props {
  position?: 'bottom-start' | 'bottom-end' | 'top-start' | 'top-end'
  trigger?: 'click' | 'hover'
  closeOnClick?: boolean
  closeOnOutsideClick?: boolean
  offset?: number
  animation?: boolean
  width?: string
  align?: 'left' | 'right'
}

const props = withDefaults(defineProps<Props>(), {
  position: 'bottom-start',
  trigger: 'click',
  closeOnClick: true,
  closeOnOutsideClick: true,
  offset: 4,
  animation: true,
  width: 'w-48',
  align: 'left',
})

const emit = defineEmits<{
  (e: 'open'): void
  (e: 'close'): void
}>()

const open = ref(false)
const dropdownRef = ref<HTMLElement | null>(null)

function toggle() {
  open.value = !open.value
  emit(open.value ? 'open' : 'close')
}

function close() {
  open.value = false
  emit('close')
}

function handleClickOutside(event: MouseEvent) {
  if (props.closeOnOutsideClick && dropdownRef.value && !dropdownRef.value.contains(event.target as Node)) {
    close()
  }
}

function handleEscape(event: KeyboardEvent) {
  if (event.key === 'Escape') close()
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
  document.addEventListener('keydown', handleEscape)
})

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside)
  document.removeEventListener('keydown', handleEscape)
})
</script>

<template>
  <div ref="dropdownRef" class="relative inline-block">
    <div
      @click="trigger === 'click' && toggle()"
      @mouseenter="trigger === 'hover' && (open = true)"
      @mouseleave="trigger === 'hover' && (open = false)"
      class="cursor-pointer"
    >
      <slot name="trigger" />
    </div>

    <Transition
      v-if="animation"
      enter-active-class="transition ease-out duration-100"
      enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-95"
    >
      <div
        v-show="open"
        @click="closeOnClick && close()"
        :class="[
          'absolute z-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5',
          width,
          align === 'right' ? 'right-0' : 'left-0',
          position.includes('top') ? 'bottom-full mb-1' : 'mt-1'
        ]"
      >
        <div class="py-1">
          <slot />
        </div>
      </div>
    </Transition>

    <div v-else v-show="open" @click="closeOnClick && close()"
      :class="['absolute z-50 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5', width, align === 'right' ? 'right-0' : 'left-0']">
      <div class="py-1"><slot /></div>
    </div>
  </div>
</template>
