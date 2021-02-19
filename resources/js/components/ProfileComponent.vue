<template>
<div>
  <div>
   <!-- <img @click="openModal" :src="prof.pic"> -->
    <button @click="openModal(user)">詳細</button>
  </div>
  <modal :prof="postProf" v-show="showContent" @close="closeModal" />

  <div>
    <div>
        {{ user.age }}歳 {{ user.prefecture.name}}
    </div>
  </div>
</div>
</template>

<script>
  import Modal from '../components/Modal.vue'
  export default {
    props: ['user'],
    components: {
      Modal
    },
    data () {
      return {
        showContent: false,
        postProf: "",
        profs: []
      }
    },
    mounted() {
      this.getProf();
    },
    methods: {
      getProf: function() {
        axios.get('/api/users/index/' + this.user.id)
          .then((res) => {
            this.profs = res.data;
          });
      },
      openModal(user) {
        this.showContent = true,
        this.postProf = prof
      }, 
      closeModal: function() {
        this.showContent = false
      },
    },

  }
  </script>