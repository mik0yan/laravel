<template>
    <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="记录日期">
            <el-col :span="11">
                <el-date-picker type="date" placeholder="选择日期" v-model="form.exam.record_at" style="width: 100%;"></el-date-picker>
            </el-col>
        </el-form-item>
        <el-tabs v-model="activeName">
            <el-tab-pane label="症状" name="symptoms">
                <el-form-item label="症状">
                    <el-checkbox-group v-model="form.exam.symptoms">
                        <el-checkbox v-for="(v,k) in mysymptoms" :label="v.name" :key="v.id" :index="k"  ></el-checkbox>
                    </el-checkbox-group>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="一般状况" name="general">
                <el-form-item v-for="item in myexams.general"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="生活方式" name="section3">

            </el-tab-pane>
            <el-tab-pane label="脏器功能" name="organ">
                <el-form-item v-for="item in myexams.organ"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="查体" name="exam">
                <el-form-item v-for="item in myexams.exam"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="辅助检查" name="aux">
                <el-form-item v-for="item in myexams.aux"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="中医体质辨识" name="cm">
                <el-form-item v-for="item in myexams.cm"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="现存主要健康问题" name="health">
                <el-form-item v-for="item in myexams.health"
                              :key="item.id"
                              :label="item.name">
                    <poly-input :item="item"></poly-input>
                </el-form-item>
            </el-tab-pane>
            <el-tab-pane label="住院治疗情况" name="section9">

            </el-tab-pane>
            <el-tab-pane label="主要用药情况" name="section10">

            </el-tab-pane>
            <el-tab-pane label="非免疫规划预防接种史" name="section11">

            </el-tab-pane>
            <el-tab-pane label="健康评价" name="section12">

            </el-tab-pane>
            <el-tab-pane label="健康指导" name="section13">

            </el-tab-pane>
        </el-tabs>


    </el-form>
</template>

<script>

    import axios from 'axios'
    import PolyInput from '../components/PolyInput.vue';

    export default {
        components: {
            'poly-input': PolyInput,
        },
        props: ['form'],
        name: 'exam',
        mounted(){
            this.getSymtoms();
            this.getForm();
        },
        data() {
            return {
                'mysymptoms':[],
                'myexams':{

                },
                'activeName':'symptoms',
            }
        },
        methods: {
            getSymtoms(){
                axios.get('/api/res/symptoms').then((response)=>{
                    this.mysymptoms = response.data;
                    console.log(response.data);
                });
            },
            getForm(){
                axios.get('/api/res/record').then((response)=>{
                    this.myexams = response.data;
                    console.log(this.myexams.general);

                });
            }

        }

    }
</script>
