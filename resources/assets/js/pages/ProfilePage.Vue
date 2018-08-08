<template>
    <div class="wrap">
          <h1>个人中心</h1>
          <FooterSec></FooterSec>
    </div>
</template>

<script>
import FooterSec from '../components/FooterCardCmp'
export default {
    name: 'wrap',
    data: function () {
        return {
            
        }
    },
    components: {
    'FooterSec': FooterSec
  }
}
</script>

<style scoped>

.wrap {
    background: #21a1a8;
}
</style>
