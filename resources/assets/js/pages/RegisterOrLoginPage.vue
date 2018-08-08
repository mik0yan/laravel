<template>
<div class="modalBg" id="logOrRegSec">
  <!-- <img src="./assets/logo.png" alt=""> -->
  <div class="tabHeader" v-model="dataInfo">
      <b-alert variant="warning"
             dismissible
             :show="showDismissibleAlert"
             @dismissed="showDismissibleAlert=false">
      {{showErrorMsg}}
    </b-alert>
    <b-container >
      <b-row class="my-1 text-dark" v-for="(item, index) in dataInfo.itemArr" :key="index">
        <b-col sm="3"><label > {{ item.titleStr }}:</label></b-col>
        <b-col sm="9"><b-form-input :type="item.type" :state="item.state"  v-model="item.inputStr"></b-form-input></b-col>
        </b-col>
        <!-- <p> debug using: {{item.inputStr}}</p> -->
      </b-row>
    </b-container>
      <b-button size="lg" class="bg-info btn" @click="logInBtnClicked($event, dataInfo.actionStr)">
      {{ dataInfo.actionStr }}
      </b-button>
      <p class="text-muted">
        {{ dataInfo.desc }}
        <button @click="switchBtnClicked($event)">{{ dataInfo.tagStr }}</button>
      </p>
  </div>
</div>
</template>

<script>
import API from '../router/API'
export default {
  name: 'modalBg',
  user: {
    authenticated: false
  },
  data () {
    return {
      dataInfo: {
        itemArr: [
                  {
          type: "text",
          titleStr: "用户名:",
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
        actionStr: '登 陆',
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
              titleStr: "密 码",
              inputStr: "",
              state: null
            },
      ],
      lgMsg: {
            actionStr: '登 陆',
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
            actionStr: '注 册',
            desc: '已经有账号了，去',
            tagStr: '登 陆',
            tagUrl: '#'
      },
      showErrorMsg: "",
      showDismissibleAlert: false
    }
  },
  components: {
  },
  mounted() {
    this.autoSetLayoutMainHeight();
  },
  methods: {
      logInBtnClicked: function(events, str) {
        if(str === "登 陆") {
          this.logIn()
        } else {
          this.register()
        }     
      },
      logIn: function() {
        var a = this.dataInfo.itemArr[0]
        var b = this.dataInfo.itemArr[1]
        var userName = a.inputStr
        var password = b.inputStr

        console.log(userName)
        console.log(password)

        this.$http.post(
          API.logIn,
          {
            "phone": userName,
            "password": password
          }
        ).then(response => {
          console.log(response)
          if(response.status == 200) {
            this.showDismissibleAlert = false
            console.log('login success!', response.data)

            var token = response.data.access_token
            localStorage.setItem('jwtToken', token)
            // user.authenticated = true
            
            // redirect
            console.log('跳转到profile ？')
            console.log(this.$router)
            this.$router.push('/profile')
          }
        }).catch( (error) => {
          console.log(error)
          this.showErrorMsg = error.message
        })
      },
      register: function() {
        
        var a = this.dataInfo.itemArr[0]
        var b = this.dataInfo.itemArr[1]
        var registerName = a.inputStr
        var password = b.inputStr

        console.log(this.$http)

        // this.$http.post(
        //   API.register,
        //   {
        //     "name": registerName,
        //     // "phone": ,
        //     // "email":"1332@abc.xyz",
        //     "password": password
        //   }
        // ).then(response => {
        //   console.log(response)
        // }).catch(e =>
        //   console.log(e)
        // )
      },
      switchBtnClicked: function(e){
        if('登 陆' == e.target.innerText ) {
          this.dataInfo.itemArr = this.lgDataArr
          this.dataInfo.desc = this.lgMsg.desc
          this.dataInfo.tagStr = this.lgMsg.tagStr
          this.dataInfo.tagUrl = this.lgMsg.tagUrl
          this.dataInfo.actionStr = this.lgMsg.actionStr
        }else {
          console.log(this.rgDataArr)
          this.dataInfo.itemArr = this.rgDataArr
          this.dataInfo.desc = this.rgMsg.desc
          this.dataInfo.tagStr = this.rgMsg.tagStr
          this.dataInfo.tagUrl = this.rgMsg.tagUrl
          this.dataInfo.actionStr = this.rgMsg.actionStr
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
  min-height: 300px;
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
