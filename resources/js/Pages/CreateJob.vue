<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    company: '',
    description: '',
    location: '',
    salary: ''
})

const submit = () => {
    form.post(route('jobposts.store'))
}
</script>

<template>
    <Head title="Create Job" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Post New Job
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="bg-white p-6 shadow sm:rounded-lg">

                    <form @submit.prevent="submit" class="space-y-4">

                        <input v-model="form.title"
                               type="text"
                               placeholder="Job Title"
                               class="w-full border rounded p-2" />

                        <input v-model="form.salary"
                               type="number"
                               placeholder="Salary"
                               class="w-full border rounded p-2" />

                        <textarea v-model="form.description"
                                  placeholder="Job Description"
                                  class="w-full border rounded p-2"></textarea>

                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                        >
                            Create Job
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
