<script>

import axios from "axios";
export default {

  data() {
    return {
      skills: [],
    }
  },
  mounted() {
    axios.get('http://localhost:8888/php-todo-list-json/')
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
