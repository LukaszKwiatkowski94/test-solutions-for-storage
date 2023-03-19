<template>
  <div>
    <h1>{{ title }}</h1>
    <ul>
      <li v-for="item in items" :key="item.id">{{ item.name }}</li>
    </ul>
  </div>
</template>

<script>
import data from './data.json'

export default {
  name: 'MyComponent',
  props: {
    title: String,
    items: Array
  },
  mounted () {
    // przypisanie danych z pliku JSON do właściwości komponentu
    this.title = data.title
    this.items = data.items
  }
}
</script>
