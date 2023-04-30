<template>
  <div v-html="htmlString"></div>
</template>

<script>
export default {
  data() {
    return {
      htmlString: '<h1>Witaj świecie!</h1><p>To jest tekst z <strong>tagami HTML</strong></p>'
    }
  }
}
</script>