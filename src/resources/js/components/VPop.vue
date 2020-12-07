<template>
<div class="v-pop"
  :class="mods"
  @click="$emit('blur')
">
    <div
      class="v-pop-content"
      :class="mods"
      @click.stop
    >
        <slot />
    </div>
</div>
</template>

<script>
export default {
    name: 'Vpop',
    props: {
        darken: Boolean,
        shadow: Boolean,
    },
    computed: {
        mods: function () {
            return {
                darken: this.darken,
                shadow: this.shadow,
            };
        },
    },
}
</script>

<style lang="scss">
.v-pop {
    $col-dark: rgba(0,0,0,.8);

    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    inset: 0;

    &.darken {
        background-color: $col-dark;
    }

    &-content {
        padding: 1.2rem;
        border-radius: .3rem;
        width: fit-content;
        background-color: white;

        &.shadow {
            box-shadow: .3rem .3rem 1rem $col-dark ;
        }
    }
}
</style>