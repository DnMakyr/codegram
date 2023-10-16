<template>
        <nav>
            <ul class="space-x-3 inside flex flex-row">
                <li>
                    <NavLink href="/" :active="$page.component === 'Welcome'">Home</NavLink>
                </li> 
                <li>
                    <NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink>
                </li>
                <li>
                    <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>
                </li>
            </ul>
        </nav>
</template>

<script setup>
import NavLink from '../components/NavLink.vue'
</script>

