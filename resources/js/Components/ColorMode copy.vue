<template>
  <div class="py-1">
    <UseColorMode v-slot="{ mode }">
      <Switch
        :title="tooltip"
        v-model="enabled"
        :class="enabled ? 'bg-slate-900' : 'bg-slate-700'"
        class="relative inline-flex h-[28px] w-[65px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
      >
        <span class="sr-only">{{ mode }} mode</span>
        <span
          aria-hidden="true"
          :class="enabled ? 'translate-x-9' : 'translate-x-0'"
          class="pointer-events-none inline-block h-[24px] w-[24px] transform rounded-full shadow-lg ring-0 transition duration-200 ease-in-out"
        >
        </span>
      </Switch>
    </UseColorMode>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import { Switch } from '@headlessui/vue';
import { useColorMode } from '@vueuse/core';
import { UseColorMode } from '@vueuse/components';

const enabled = ref(false);
const colorMode = useColorMode();
const nextMode = computed(() => (colorMode.value === 'light' ? 'dark' : 'light'));
const tooltip = computed(() => `Passez au ${nextMode.value} mode`);

watch(
  enabled,
  () => {
    if (enabled.value) {
      colorMode.value = 'light';
    } else {
      colorMode.value = 'dark';
    }
  },
  { immediate: true }
);
</script>
