<template>
    <section>
        <!-- lista dei post -->
        <ul>
            <li v-for="post in posts" :key="post.id">
                <!-- foto -->
                <div class="photo">
                    <img :src="`/storage/${post.image}`" :alt="post.title">
                </div>
                <!-- titolo-->
                <div class="title">
                    <h3>{{post.title}}</h3>
                </div>
                <!-- link -->
                <div class="link">
                    <button><router-link :to="{ name: 'single-post', params: { slug: post.slug } }">visualizza</router-link></button>
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
@import '../../../../sass/_variables.scss';

    section {
        ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            li {
                width: calc(100% / 3 - 40px);
                margin: 20px;
                background-color: $body-bg;
                position: relative;
                box-shadow: 6px 6px 10px rgba(0,0,0,0.2);
                .photo {
                    height: 280px;
                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                    
                }
                .title {
                    text-align: center;
                    margin: 20px 0;
                    h3 {
                    // text-transform: uppercase;
                    font-size: 1.375rem;
                    font-weight: 300;
                    color: $_darkgray;
                    }
                }
                .link {
                    text-align: center;
                    margin-bottom: 10px;
                    button {
                        background-color: $_purple;
                        border-radius: 1rem;
                        border: none;
                        padding: 5px 10px;
                        a {
                        text-decoration: none;
                        font-size: .875rem;
                        color: $body-bg;
                        }
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