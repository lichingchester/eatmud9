<template>
    <div class="bg-gray flex min-h-screen flex-col items-center justify-center p-6">
        <!-- Title -->
        <h1 class="mb-6 text-center text-3xl font-bold">Restaurant Picker</h1>

        <!-- Enhanced Button -->
        <button
            @click="rollRestaurant"
            class="relative transform rounded-full bg-gradient-to-r from-blue-500 to-purple-500 px-8 py-4 text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:shadow-xl focus:ring-blue-300 focus:outline-none active:scale-95"
        >
            Roll the Restaurant
        </button>

        <!-- Selected Restaurant -->
        <div v-if="selectedRestaurant" class="mt-8 w-full max-w-sm overflow-hidden rounded-lg border border-gray-300 shadow-lg">
            <img :src="selectedRestaurant.image" alt="Restaurant Image" class="h-48 w-full object-cover" />
            <div class="p-4">
                <h2 class="mb-2 text-xl font-bold">{{ selectedRestaurant.name }}</h2>
                <p class="mb-2 text-gray-700">{{ selectedRestaurant.description }}</p>
                <p class="text-gray-600">
                    Rating: <span class="font-semibold">{{ selectedRestaurant.rating }} ★</span>
                </p>
                <p class="text-gray-600">
                    Reviews: <span class="font-semibold">{{ selectedRestaurant.reviews }}</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const restaurants = [
    {
        id: 1,
        name: 'Restaurant A',
        description: 'A great place for Italian food.',
        image: 'https://example.com/image1.jpg',
        rating: 4.5,
        reviews: 120,
    },
    {
        id: 2,
        name: 'Restaurant B',
        description: 'Famous for its sushi and sashimi.',
        image: 'https://example.com/image2.jpg',
        rating: 4.7,
        reviews: 200,
    },
    {
        id: 3,
        name: 'Restaurant C',
        description: 'Known for its delicious burgers and fries.',
        image: 'https://example.com/image3.jpg',
        rating: 4.2,
        reviews: 80,
    },
];

const selectedRestaurant = ref<null | (typeof restaurants)[0]>(null);

// Function to randomly select a restaurant
const rollRestaurant = () => {
    const randomIndex = Math.floor(Math.random() * restaurants.length);
    selectedRestaurant.value = restaurants[randomIndex];
};
</script>
