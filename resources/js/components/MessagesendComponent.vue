<template>
<div>


    <div v-for="(message, key) in messages"
    :class="`message${message.user_id == user ? ' sent' : ' received'}`"
    :key="key">


        <p>{{ message.text }}</p>
        <span>{{ message.created_at }}</span>
    </div>


  <div>

      <textarea v-model="text"></textarea>
      <br>
      <button type="button" @click="sendmessage()">送信</button>
  </div>
</div>
</template>
<script>
export default {
        props: ['user','matching_id'],
  data() {
      return {
          text: "",
          messages: [],
          result: ""
      };
  },
  mounted() {

  this.getMessages();
  Echo.channel('chat')
      .listen('MessageCreated', (e) => {

          this.getMessages();
        });

    },
    methods: {
        sendmessage() {

            const url = '/messages/store/'+ this.matching_id ;
            const params = { text: this.text };
            axios.post(url, params)
                .then((response) => {

                    this.text = '';

                });

        },
        getMessages() {

            const url = '/messages/list/'+ this.matching_id;
            axios.get(url)
                .then((response) => {
                    this.messages = response.data;
                });

        }
    }
}
</script>
