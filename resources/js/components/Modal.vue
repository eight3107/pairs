<template>
  <div id="overlay">
    <div id="content">
      <!--<img :src="user.pic">-->
      <!--<p>名前:{{ user.name }}</p>
      <p>年齢:{{ user.age }}</p>
      <p>県:{{ user.prefecture.name }}</p>
      <p>自己紹介:{{ user.sentence }}</p>-->
      
      <button @click="$emit('close')">閉じる</button>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Modal',
    props: ['prof'],
  }
</script>

<style>
  #overlay{
  z-index:1;
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
}

#content{
  z-index:2;
  width:50%;
  padding-top: 5em;
  padding-bottom: 5em;
  text-align: center;
}


</style>