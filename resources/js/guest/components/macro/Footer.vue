<template>
    <footer>
        <p><small>Developed by Anais &hearts; </small> </p>
    </footer>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/_variables.scss';
    footer{
        height: 60px;
        background-color: $_purple;
        p {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: $body-bg;
        }
    }

</style>