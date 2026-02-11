<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, usePage, Link } from '@inertiajs/vue3'

defineProps({
    jobs: Array
})

const user = usePage().props.auth.user
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">


                <div class="bg-white p-6 shadow sm:rounded-lg">
                    <h3 class="font-bold mb-2">Logged in User</h3>
                    <p><strong>Name:</strong> {{ user.name }}</p>
                    <p><strong>Email:</strong> {{ user.email }}</p>
                </div>


            </div>
        </div>

    </AuthenticatedLayout>
</template>
