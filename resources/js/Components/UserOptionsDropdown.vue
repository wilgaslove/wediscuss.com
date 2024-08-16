<template>
    <div>
        <Menu as="div" class="relative inline-block text-left" >
            <MenuButton class="inline-flex w-full justify-center rounded-md " >
                <span class="sr-only" >Ouvrir le menu contextuel</span>

            </MenuButton>
            <Transition enter-active-class="" >
                <MenuItems class="absolute right-0 mt-2 w-56 origin-top-right divide-y" >
                    <MenuTiem>Menu 1</MenuTiem>
                    <MenuTiem>Menu 2</MenuTiem>
                    <MenuTiem></MenuTiem>
                
                </MenuItems>

            </Transition>

        </Menu>
        <Icon icon="heroicons:ellipsis-vertical" />
    </div>
</template>

<script setup lang="ts">
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { Icon } from '@iconify/vue';
</script>

<style scoped></style>