<template>
    <header class="sticky top-0 bg-weather-primary shadow-lg">
        <nav
            class="container flex flex-col sm:flex-row items-center gap-4 text-white py-6">
            <RouterLink :to="{ name: 'home' }">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-sun text-2xl"></i>
                    <p class="text-2xl">Weather App</p>
                </div>
            </RouterLink>

            <div class="flex gap-3 flex-1 justify-end">
                <i
                    v-if="route.name !== 'home'"
                    class="fa-solid fa-plus text-xl hover:text-weather-secondary duration-150 cursor-pointer"
                    @click="addCity"></i>
            </div>
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <router-link
                    v-if="auth"
                    to="/dashboard"
                    class="text-sm text-white underline">
                    Dashboard
                </router-link>

                <template v-else>
                    <router-link
                        to="/login"
                        class="ml-4 text-sm text-white underline">
                        Log in
                    </router-link>
                    <router-link
                        to="/register"
                        class="ml-4 text-sm text-white underline">
                        Register
                    </router-link>
                </template>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { RouterLink, useRoute, useRouter } from 'vue-router'
import { uid } from 'uid'
import { ref } from 'vue'

const savedCities = ref([])
const route = useRoute()
const router = useRouter()
const addCity = () => {
    if (localStorage.getItem('savedCities')) {
        savedCities.value = JSON.parse(localStorage.getItem('savedCities'))
    }

    const locationObj = {
        id: uid(),
        state: route.params.state,
        city: route.params.city,
        coords: {
            lat: route.query.lat,
            lng: route.query.lng,
        },
    }

    savedCities.value.push(locationObj)
    localStorage.setItem('savedCities', JSON.stringify(savedCities.value))

    let query = Object.assign({}, route.query)
    delete query.preview
    query.id = locationObj.id
    router.replace({ query })
}
</script>
