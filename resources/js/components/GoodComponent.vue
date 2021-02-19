<template>
    <div>
        <button @click="favorite()" v-if="result" class="btn-l">
            いいね
        </button>
        <button v-else class="btn-a">
            いいね済
        </button>
    </div>

</template>
<script>
    export default {
        props: ['user'],
        data() {
            return {
                result: ""
            }
        },
        mounted () {
            this.hasgoods();
        },
        methods: {
        favorite() {
        axios.get('/goods/' + this.user.id +'/create')
        .then(res => {
            this.result = res.data.result;
        }).catch(function(error) {
            console.log(error);
        });
        },
        hasgoods() {
            axios.get('/users/' + this.user.id +'/hasgoods')
            .then(res => {
                this.result = res.data;
            }).catch(function(error){
                console.log(error);
            });
        }
     }
    }
</script>
