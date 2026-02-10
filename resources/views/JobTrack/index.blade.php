<script setup>
    defineProps({
        applications: Array,
    });
    </script>

    <template>
        <div class="max-w-6xl mx-auto py-10 px-6">
            <h1 class="text-2xl font-bold mb-6">My Applications</h1>

            <div v-if="applications.length" class="overflow-x-auto">
                <table class="w-full border border-gray-200 bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium">
                                Job
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-medium">
                                Company
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-medium">
                                Status
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-medium">
                                Applied On
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="application in applications"
                            :key="application.id"
                            class="border-t"
                        >
                            <td class="px-4 py-3">
                                {{ application.job.title }}
                            </td>
                            <td class="px-4 py-3">
                                {{ application.job.company }}
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="rounded-full px-3 py-1 text-xs font-semibold"
                                    :class="{
                                        'bg-blue-100 text-blue-700': application.status === 'applied',
                                        'bg-yellow-100 text-yellow-700': application.status === 'reviewed',
                                        'bg-green-100 text-green-700': application.status === 'hired',
                                        'bg-red-100 text-red-700': application.status === 'rejected',
                                    }"
                                >
                                    {{ application.status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ new Date(application.created_at).toLocaleDateString() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p v-else class="text-gray-500">
                You haven’t applied to any jobs yet.
            </p>
        </div>
    </template>
