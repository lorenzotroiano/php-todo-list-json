<script>

import axios from "axios";
export default {

  data() {
    return {
      skills: [],

      newSkill: {
        name: "",
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
        .then(response => this.skills = response.data)
        .catch(error => console.log("error", error));
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
      <li v-for="(skill, index) in skills" key="index">
        {{ skill.name }}
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
</style>
