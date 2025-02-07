<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';

</script>

<template>
    
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>

                <div v-if="$page.props.auth.user">
                    <Link :href="route('logout')" method="post" as="button" type="button" class="nav-link">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('register')" class="nav-link">Register</Link>
                    <Link :href="route('login')" class="nav-link">Login</Link>
                </div>

            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
        
    </div>
</template>