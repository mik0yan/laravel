<template>
<div class="modalBg" id="logOrRegSec">
  <!-- <img src="./assets/logo.png" alt=""> -->
  <div class="tabHeader" v-model="dataInfo">
    <b-container >
      <b-row class="my-1 text-dark" v-for="(item, index) in dataInfo.itemArr" :key="index">
        <b-col sm="3"><label > {{ item.titleStr }}:</label></b-col>
        <b-col sm="9"><b-form-input :type="item.type" :state="item.state"  v-model="item.inputStr"></b-form-input></b-col>
        </b-col>
        <p> debug using: {{item.inputStr}}</p>
      </b-row>
    </b-container>
      <b-button size="lg" class="bg-info btn" @click="logInBtnClicked">
      {{ dataInfo.tagStr }}
      </b-button>
      <p class="text-muted">
        {{ dataInfo.desc }}
        <button @click="switchBtnClicked($event)">{{ dataInfo.tagStr }}</button>
      </p>
  </div>
</div>
</template>

<script>
export default {
  name: 'modalBg',
  data () {
    return {
      dataInfo: {
        itemArr: [
                  {
          type: "text",
          titleStr: "注册名:",
          inputStr: "",
          state: null
        },
        {
          type: "password",
          titleStr: "密 码:",
          inputStr: "",
          state: null
        } 
        ],
        desc: '还没有账号？去',
        tagStr: '注 册',
        tagUrl: '#'
      },
      lgDataArr: [
            {
              type: "text",
              titleStr: "用户名",
              inputStr: "",
              state: null
            },
            {
              type: "password",
              titleStr: "密码",
              inputStr: "",
              state: null
            },
      ],
      lgMsg: {
            desc: '还没有账号？去',
            tagStr: '注 册',
            tagUrl: '#'
      },
      rgDataArr: [
            {
              type: "text",
              titleStr: "注册名:",
              inputStr: "",
              state: null
            },
            {
              type: "password",
              titleStr: "密 码:",
              inputStr: "",
              state: null
            } 
      ],
      rgMsg: {
            desc: '已经有账号了，去',
            tagStr: '登 陆',
            tagUrl: '#'
      }
    }
  },
  components: {
  },
  mounted() {
    this.autoSetLayoutMainHeight();
  },
  methods: {
      logInBtnClicked: function() {
      //  XMLHttpRequest 

      },
      switchBtnClicked: function(e){

        if('登 陆' == e.target.innerText ) {
          console.log('~~ should goto zhuce')
          this.dataInfo.itemArr = this.lgDataArr
          this.dataInfo.desc = this.lgMsg.desc
          this.dataInfo.tagStr = this.lgMsg.tagStr
          this.dataInfo.tagUrl = this.lgMsg.tagUrl
        }else {
          console.log(this.rgDataArr)
          this.dataInfo.itemArr = this.rgDataArr
          this.dataInfo.desc = this.rgMsg.desc
          this.dataInfo.tagStr = this.rgMsg.tagStr
          this.dataInfo.tagUrl = this.rgMsg.tagUrl
        }

      },
      autoSetLayoutMainHeight() {
          const layoutMainEl = document.getElementById("logOrRegSec")
          // 初始化 mainHeight，避免出现 mainHeight 附上 clientHeight 的值就一直保持不变
          layoutMainEl.style.height = 'auto';

          // 计算 mainHeight 新高度
          const clientHeight = window.innerHeight;
          const clientWidth = window.innerWidth;

          layoutMainEl.style.height = clientHeight + "px";
          layoutMainEl.style.width = clientWidth + "px";
      }
  }
}
</script>

<style scoped>
.modalBg {
  background: #eeeeee;
  display: flex;
  justify-content: center;
  align-items: space-between;
}

.tabHeader {
  height: 45%;
  width: 30%;
  min-width: 389px;
  background: white;
  border-radius: 10px;
  box-shadow: 0px 6px 18px -2px #21a1a8;
  border: 1px solid gray;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.list {
  display: flex;
  width: 100%;
}

div, label {
  /* border:  1px solid rebeccapurple; */
}

.cell {
  flex-grow: 1;
  justify-content: center;
  width: 50%;
}

.btn {
  margin: 10px;
}
</style>
