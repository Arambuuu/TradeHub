<script setup>
// You can import components or stores here
</script>

<template>
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Navbar Component -->
        <Navbar />

        <!-- Hero Section -->
        <section class="text-center my-12">
            <h1 class="text-4xl font-bold mb-4">Welcome to TradeHub</h1>
            <p class="text-lg text-gray-600">
                Your Shopee-style e-commerce marketplace
            </p>
        </section>

        <!-- Categories Section -->
        <section class="my-12">
            <h2 class="text-2xl font-semibold mb-4">Categories</h2>
            <CategoryMenu />
        </section>

        <!-- Featured Products -->
        <section class="my-12">
            <h2 class="text-2xl font-semibold mb-4">Featured Products</h2>
            <ProductGrid :products="[]" />
        </section>

        <!-- Footer -->
        <Footer />
    </div>
</template>
