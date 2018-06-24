<template>
  <div>
    <b-carousel id="carousel1"
                style="text-shadow: 1px 1px 2px #333;"
                controls
                indicators
                background="#ababab"
                :interval="4000"
                img-width="900"
                img-height="400"
                v-model="slide"
                @sliding-start="onSlideStart"
                @sliding-end="onSlideEnd"
    >
      <!-- Text slides with image -->
      <b-carousel-slide caption="非药干预平台"
                        text="非药健康运动康复平台"
                        img-src="/images/application-3399516_1280.jpg"
      ></b-carousel-slide>

      <!-- Slides with custom text -->
      <b-carousel-slide caption="专业设备管理"
                        text="非药健康运动康复平台"
                        img-src="https://wx2.sinaimg.cn/mw1024/006mou3Bly1fred10g0q5j31kw0q74qq.jpg">
      </b-carousel-slide>

    </b-carousel>

    <p class="mt-4">
      Slide #: {{ slide }}<br>
      Sliding: {{ sliding }}
    </p>

  </div>
</template>

<script>
export default {
  data () {
    return {
      slide: 0,
      sliding: null
    }
  },
  methods: {
    onSlideStart (slide) {
      this.sliding = true
    },
    onSlideEnd (slide) {
      this.sliding = false
    }
  }
}
</script>
<!-- carousel-1.vue -->
