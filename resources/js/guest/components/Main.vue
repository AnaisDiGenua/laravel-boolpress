<template>
    <main>
        <router-view :key="$route.path"></router-view>
    </main>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style lang="css" scoped>
    main {
        background-color: lightcyan;
        padding: 30px;
    }
</style>