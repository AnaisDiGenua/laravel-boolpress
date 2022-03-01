<template>
    <section>
        <h2>{{post.title}}</h2>
        <img :src="`/storage/${post.image}`" :alt="post.title">
        <p>{{post.content}}</p>
        <!-- tags -->
        <div v-if="post.tags.length > 0">
            <span><strong>Tag:</strong></span>
            <span v-for="tag in post.tags" :key="tag.id">
                #{{tag.name}}
            </span>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: {}
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
            }).catch( (error) => {
            // handle error
            this.$route.push({name : "page-404"});
        })
    }
}
</script>

<style lang="scss" scoped>

    img {
        width: 70%;
        margin: 0 auto;
    }
</style>