<template>
<input
  class="v-input"
  :value="value"
  @focus="$emit('focus')"
  @blur="$emit('blur')"
  @input="$emit('input', $event.target.value)"
  @change="$emit('change', $event.target.value)"
  :disabled="disabled"
  :type="type"
  :checked="checked"
/>
</template>

<script>
export default {
    name: "VInput",
    props: {
        value: [String, Number],
        disabled: Boolean,
        type: String,
        checked: Boolean,
    },
};
</script>

<style lang="scss">
.v-input {
    display: block;
    width: 100%;
    outline: #A8C9FF;
    border: none;
    padding: .6rem;
    font-family: 'Roboto', sans-serif;
    font-size: 1rem;
}
</style>