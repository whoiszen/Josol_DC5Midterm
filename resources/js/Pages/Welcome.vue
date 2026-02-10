<script setup>
import { Head, Link } from '@inertiajs/vue3';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />

    <div class="bg-slate-50 text-slate-700 dark:bg-slate-950 dark:text-slate-300">
        <!-- Background Accent -->
        <div
            class="absolute inset-x-0 top-0 h-[420px] bg-gradient-to-br from-red-500/10 via-transparent to-transparent"
        ></div>

        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-red-500 selection:text-white"
        >
            <div class="relative w-full max-w-7xl px-6">
                <!-- Header -->
                <header
                    class="flex items-center justify-between py-8"
                >
                    <h1 class="text-xl font-bold text-slate-900 dark:text-white">
                        JobPost
                    </h1>

                    <nav v-if="canLogin" class="flex items-center gap-2">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-4 py-2 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600"
                            >
                                Sign up
                            </Link>
                        </template>
                    </nav>
                </header>

                <!-- Hero -->
                <section class="mx-auto mt-16 max-w-3xl text-center">
                    <h2
                        class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-5xl"
                    >
                        Find Jobs. Track Applications.
                        <span class="text-red-500">Get Hired.</span>
                    </h2>

                    <p class="mt-6 text-lg text-slate-600 dark:text-slate-400">
                        A modern job posting and applicant tracking platform
                        designed for job seekers and employers.
                    </p>

                    <div class="mt-8 flex justify-center gap-4">
                        <Link
                            :href="route('job-post')"
                            class="rounded-lg bg-red-500 px-6 py-3 text-sm font-semibold text-white hover:bg-red-600"
                        >
                            Browse Jobs
                        </Link>

                        <Link
                            :href="route('job-track')"
                            class="rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold hover:bg-slate-100 dark:border-slate-700 dark:hover:bg-slate-800"
                        >
                            Track Applications
                        </Link>
                    </div>
                </section>

                <!-- Feature Cards -->
                <main class="mt-20 grid gap-6 lg:grid-cols-3">
                    <!-- Jobs -->
                    <div
                        class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800"
                    >
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Job Listings
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Discover curated job opportunities across multiple
                            industries and experience levels.
                        </p>
                    </div>

                    <!-- Applications -->
                    <div
                        class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800"
                    >
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Application Tracking
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Monitor your applications, statuses, and interview
                            progress in one place.
                        </p>
                    </div>

                    <!-- Employers -->
                    <div
                        class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800"
                    >
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Employer Friendly
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Post jobs, manage applicants, and streamline hiring
                            with ease.
                        </p>
                    </div>
                </main>

                <!-- Footer -->
                <footer
                    class="mt-24 py-10 text-center text-sm text-slate-500 dark:text-slate-400"
                >
                    JobPost Platform · Laravel v{{ laravelVersion }} · PHP v{{ phpVersion }}
                </footer>
            </div>
        </div>
    </div>
</template>
