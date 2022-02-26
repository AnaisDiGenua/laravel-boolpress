<template>
    <section>
        <!-- lista dei post -->
        <ul>
            <li v-for="post in posts" :key="post.id">
                <!-- foto -->
                <div class="photo">
                    <img :src="`/storage/${post.image}`" :alt="post.title">
                </div>
                <!-- titolo -->
                <div class="title">
                    <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">{{post.title}}</router-link>
                </div>
                <!-- categoria -->
                <div class="category">
                    <p v-if="post.category">{{post.category.name}}</p>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data() {
        return {
            posts: []
        }
    },
    created() {
        axios.get("api/posts") 
            .then( (response) => {
                this.posts = response.data;
            } )
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

    section {
        background-color: lightgreen;
        ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            li {
                width: calc(100% / 3 - 40px);
                margin: 20px;
                background-color: $body-bg;
                position: relative;
                .photo img {
                    width: 100%;
                    height: 280px;
                }
                .title {
                    text-align: center;
                    margin: 20px 0;
                    a {
                    text-transform: uppercase;
                    text-decoration: none;
                    font-size: 1.5625rem;
                    font-weight: 700;
                    color: $_darkgray;
                    }
                }
                .category {
                    position: absolute;
                    top: 0;
                    right: 0;
                    background-color: $_logo;
                    p {
                        font-weight: 700;
                        color: $body-bg;
                        padding: 5px;
                    }
                }
            }
        }
    }
</style>