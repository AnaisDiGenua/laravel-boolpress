<template>
    <header>
        <!-- titolo -->
        <div>
            <h1>Boolpress</h1>
        </div>
        <!-- navbar -->
        <nav>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">Chi siamo</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'categories' }">Categorie</router-link>
                </li>
                <li> <a href="/login">Area riservata</a></li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/_variables.scss';
    header {
        height: 80px;
        background-color: $_purple;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        h1 {
            font-size: 2.1875rem;
            color: $_logo;

        }
        nav {
            ul {
                list-style: none;
                li {
                    display: inline-block;
                    margin-right: 10px;
                    &:last-child{
                        border: 1px solid $body-bg;
                        padding: 10px;
                        margin-left: 5px;
                    }
                    a {
                        text-decoration: none;
                        color: $body-bg;
                    }
                }
            }
        }
    }

</style>