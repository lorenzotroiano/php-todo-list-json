<script>

import axios from "axios";
export default {

  data() {
    return {
      skills: [],

      newSkill: {
        name: "",
        compiuta: false,
      },
    }
  },
  methods: {
    onSubmit() {

      const url = 'http://localhost:8888/php-todo-list-json/postSkill.php';
      const data = this.newSkill;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(response => {
          const data = response.data;
          this.skills = data;
          this.newSkill.name = "";

        })
        .catch(error => console.log("error", error));


    },
    deleteSkill(index) {

      const url = 'http://localhost:8888/php-todo-list-json/deleteSkill.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(res => {

          const data = res.data;
          this.skills = data;
        });
    }


  },

  mounted() {
    axios.get('http://localhost:8888/php-todo-list-json/index.php')
      .then(result => {
        this.skills = result.data
      })
  }
}





</script>

<template>
  <div>
    <h1>Hello Student</h1>

    <ul>
      <li v-for="(skill, i) in skills" :key="i" :class="!skill.compiuta ? 'barra' : ''">
        {{ skill.name }}
        <button @click="deleteSkill(i)" style=" color: red; background-color: transparent; border: 0px; padding: 10px;
          font-size: 22px; ">X</button>
      </li>
    </ul>

    <form @submit.prevent="onSubmit">
      <label for="skill">Skill</label>
      <input type="text" name="skill" id="skill" v-model="newSkill.name">
      <input type="submit" value="Aggiungi Skill">
    </form>
  </div>
</template>

<style scoped>
div {
  text-align: center;
  padding: 40px;
  background-color: violet;
}

h1 {
  font-size: 30px;
  color: red;
}

ul {
  padding: 20px;
}

li {
  font-size: 20px;
  list-style: none;


}

.barra {
  text-decoration: line-through;
}
</style>
