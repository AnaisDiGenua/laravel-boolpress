<template>
    <section>
        <h3>Lista posts</h3>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h4>{{post.title}}</h4>
                <p>{{post.content}}</p>
                <p v-if="post.category">Categoria: {{post.category.name}}</p>
                <div v-if="post.tags.length > 0">
                    <strong>Tag:</strong>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.id">
                            #{{tag.name}}
                        </li>
                    </ul>
                </div>
                <p>{{post.content}}</p>
                <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">visualizza post</router-link>
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

<style>

</style>