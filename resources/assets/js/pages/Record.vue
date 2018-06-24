<template>

    <div id="form">
        <el-tabs v-model="activeName">
            <el-tab-pane label="基础表单" name="first">
                <base-form :form="form"></base-form>
            </el-tab-pane>
            <el-tab-pane label="体检表单" name="second">
                <exam-form :form="form"></exam-form>
            </el-tab-pane>
            <el-tab-pane label="角色管理" name="third">角色管理</el-tab-pane>
            <el-tab-pane label="定时任务补偿" name="fourth">定时任务补偿</el-tab-pane>
        </el-tabs>


        <el-form>
            <el-button type="primary" @click="onSubmit">立即创建</el-button>
            <el-button>取消</el-button>
        </el-form>
    </div>


</template>

<script>
    import BaseForm from '../components/BaseForm.vue';
    import ExamForm from '../components/ExamForm.vue';

    export default {
        components: {
            'base-form': BaseForm,
            'exam-form': ExamForm,
        },
        name: 'record',
        data () {
            return {
                activeName: 'first',
                form: {
                    "base": {
                        "name": "张三",
                        "record_at":null,
                        "birthday": "1975-01-01",
                        "gender": "1",
                        "card_no": "430102198311053021",
                        "corp": "",
                        "phone": "13800138000",
                        "username": "mikuan",
                        "userphone": "13810711376",
                        "hukou": "",
                        "ethnic": "",
                        "blood": {
                            'type':"",
                            'rh':"",
                        },
                        "education": "",
                        "career": "",
                        "marital": 5,
                        "insurance": 8,
                        "allergy": [
                            "无"
                        ],
                        "his_disease": [
                        ],
                        "his_surgical": [
                            {
                                "surgical":"无",
                                "date":""
                            }
                        ],
                        "his_trauma": [
                            {
                                "trauma":"无",
                                "date":""
                            }
                        ],
                        "his_bloodtrans": [
                            {
                                "bloodtrans":"无",
                                "date":""
                            }
                        ],
                        "his_family": [],
                        "genetic": "无",
                        "disability": [
                            "无残疾"
                        ]
                    },
                    "exam": {
                        "symptoms":[],
                        "name": "张三",
                        "inpatients": [],
                        "drugs": [],
                        "vaccines": []
                    }
                },
            }
        },
        methods: {
            onSubmit() {
                console.log(this.form);
            },

            addHistory(){
                this.form.base.his_disease.push({
                    disease: "无",
                    date:"2016-01-01"
                })
            },
            addSurgical(){
                this.form.base.his_surgical.push({
                    surgical: "无",
                    date:"2016-01-01"
                })
            },
            addTrauma(){
                this.form.base.his_trauma.push({
                    trauma: "无",
                    date:"2016-01-01"
                })
            },
            addBloodtrans(){
                this.form.base.his_bloodtrans.push({
                    bloodtrans: "无",
                    date:"2016-01-01"
                })
            },
            addFamily(){
                this.form.base.his_family.push({
                    relation: "无",
                    disease:[]
                })
            },

            hasDisability(){
                this.form.base.disability.$remove("无残疾");
                console.log(this.form.base.disability)
            },
        }
    }
</script>
