<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    jobs: Array
})
</script>

<template>
    <Head title="Available Jobs" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Available Job Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">


                <div>
                    <Link
                        :href="route('dashboard')"
                        class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700"
                    >
                        ← Return to Dashboard
                    </Link>
                </div>

        
                <div class="bg-white p-6 shadow sm:rounded-lg">

                    <div v-if="jobs.length === 0">
                        No job posts available.
                    </div>

                    <div
                        v-for="job in jobs"
                        :key="job.id"
                        class="border p-4 rounded mb-4"
                    >
                        <h4 class="font-bold text-lg">
                            {{ job.title }}
                        </h4>

                        <p class="mt-2">
                            {{ job.description }}
                        </p>

                        <p class="mt-2 font-semibold">
                            ₱{{ job.salary }}
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </AuthenticatedLayout>
</template>
