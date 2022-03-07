<template>
    <section>
        <h2>{{post.title}}</h2>
        <img :src="`/storage/${post.image}`" :alt="post.title">
        <p class="content">{{post.content}}</p>
        <!-- tags -->
        <div v-if="post.tags" class="tag-box">
            <span><strong>Tag:</strong></span>
            <span v-for="tag in post.tags" :key="tag.id">
                #{{tag.name}}
            </span>
        </div>
        <!-- commenti -->
        <div class="comment-box">
            <h3>Lascia un commento</h3>
            <form @submit.prevent="addComment()">
                <div>
                    <input type="text" id="name" placeholder="inserisci il nome" v-model="formData.name">
                </div>
                <div>
                    <textarea id="content" cols="30" rows="10" placeholder="inserisci il testo del commento" v-model="formData.content"></textarea>
                    <!-- ERRORI -->
                    <div v-if="formErrors.content" style="background: red; color:white">
                        <p>Attenzione! Non hai inserito il commento correttamente:</p>
                        <ul>
                            <li v-for="(error, index) in formErrors.content" :key="index">
                                {{error}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <button type="submit">aggiungi</button>
                </div>
            </form>
            <div v-show="commentSent">
                Commento in fase di approvazione!
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: {},
            formData: {
                name: "",
                content: "",
                post_id: null
            },
            commentSent: false,
            formErrors:{}
        }
    },
    methods: {
        addComment() {
            //api/comments
            axios.post(`/api/comments`, this.formData) .then( (response) => {
                //pulizia campi
                this.formData.name = "";
                this.formData.content = "";
                //avviso
                this.commentSent = true;
            }).catch( (error) => {
            // console.log(error.response.data.errors);
            this.formErrors = error.response.data.errors;
            
        })
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
            }).catch( (error) => {
            // handle error
            this.$route.push({name : "page-404"});
        })
    }
}
</script>

<style lang="scss" scoped>
    section {
        width: 70%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        img {
        width: 100%;
        margin-bottom: 20px;
        }
        .tag-box, .comment-box {
            align-self: flex-start;
            margin-top: 20px;
        }
    }

</style>