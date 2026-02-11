<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})

const page = usePage()
</script>

<template>
    <Head title="Landing Page" />

    <div class="bg-slate-50 text-slate-700 dark:bg-slate-950 dark:text-slate-300">

        <!-- Background Accent -->
        <div class="absolute inset-x-0 top-0 h-[420px] bg-gradient-to-br from-red-500/10 via-transparent to-transparent"></div>

        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-red-500 selection:text-white">

            <div class="relative w-full max-w-7xl px-6">

                <!-- HEADER -->
                <header class="flex items-center justify-between py-8">
                    <h1 class="text-xl font-bold text-slate-900 dark:text-white">
                        💼 JobPost Tracker
                    </h1>

                    <nav v-if="canLogin" class="flex items-center gap-3">

                        <!-- If logged in -->
                        <Link
                            v-if="page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800"
                        >
                            Dashboard
                        </Link>

                        <!-- If NOT logged in -->
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

                        <Link
                            :href="route('about-page')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800"
                        >
                            About
                        </Link>

                        <Link
                            :href="route('jobs.available')"
                            class="rounded-md px-4 py-2 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800"
                        >
                            Available Jobs
                        </Link>

                    </nav>
                </header>

                <!-- HERO SECTION -->
                <section class="mx-auto mt-16 max-w-3xl text-center">
                    <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-5xl">
                        Find Jobs. Track Applications.
                        <span class="text-red-500">Get Hired.</span>
                    </h2>

                    <p class="mt-6 text-lg text-slate-600 dark:text-slate-400">
                        A modern Job Posting and Applicant Tracker system built with Laravel Breeze and Vue.
                        Discover opportunities and manage applications easily.
                    </p>

                    <div class="mt-8 flex justify-center gap-4">

                        <Link
                            :href="route('jobs.available')"
                            class="rounded-lg bg-red-500 px-6 py-3 text-sm font-semibold text-white hover:bg-red-600"
                        >
                            Browse Jobs
                        </Link>

                        <Link
                            v-if="!page.props.auth.user"
                            :href="route('register')"
                            class="rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold hover:bg-slate-100 dark:border-slate-700 dark:hover:bg-slate-800"
                        >
                            Create Account
                        </Link>

                    </div>
                </section>

                <!-- FEATURE CARDS -->
                <main class="mt-20 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                    <!-- Job Listings -->
                    <div class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Job Listings
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Browse available job posts created by employers in different industries.
                        </p>
                    </div>

                    <!-- Application Tracking -->
                    <div class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Application Tracking
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Track your submitted applications and monitor hiring progress.
                        </p>
                    </div>

                    <!-- Employer Tools -->
                    <div class="rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200 dark:bg-slate-900 dark:ring-slate-800">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                            Employer Tools
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                            Employers can post jobs and manage listings from the dashboard.
                        </p>
                    </div>

                </main>

                <!-- FOOTER -->
                <footer class="mt-24 py-10 text-center text-sm text-slate-500 dark:text-slate-400">
                    © 2026 JobPost Tracker · Built with Laravel & Vue
                </footer>

            </div>
        </div>
    </div>
</template>
