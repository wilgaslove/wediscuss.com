<template>
    <div>
        <Menu as="div" class="relative inline-block text-left" >
            <MenuButton class="inline-flex w-full justify-center rounded-md " >
                <span class="sr-only" >Ouvrir le menu contextuel</span>

            </MenuButton>
            <Transition 
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-out"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"t
             >
                <MenuItems as="ul" class="absolute right-0 mt-2 w-56 origin-top-right divide-y bg-surface-variant" >
                    <MenuItem as="li" v-slot="{ active }" class="p-1" >
                        <button>
                            <span>
                                <Icon icon="heroicons:" />
                                Bloquer l'utilisateur
                            </span>
                            <span>
                                <Icon icon="heroicons:" />
                                Débloquer l'utilisateur
                            </span>
                        </button>
                    </MenuItem>
                    <MenuItem  as="li" v-slot="{ active }" class="p-1" >
                        <button>
                            <span>
                                <Icon icon="heroicons:" />
                               Retrograder en utilisateur
                            </span>
                            <span>
                                <Icon icon="heroicons:" />
                               Promouvoir en utilisateur
                            </span>
                        </button>
                    </MenuItem>
                
                </MenuItems>

            </Transition>

        </Menu>
        
        <Icon icon="heroicons:ellipsis-vertical" />
    </div>
</template>

<script setup lang="ts">
import { Conversation } from '@/types';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { Icon } from '@iconify/vue';

defineProps<{
    conversation: Conversation
}>();
</script>

<style scoped></style>