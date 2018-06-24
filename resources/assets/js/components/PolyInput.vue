<template>
    <el-col :span="11" v-if="item.twn == 1">
        <el-input label="item.name"  v-model="item.res">
            <template slot="append">{{item.unt}}</template>
        </el-input>
    </el-col>
    <el-col :span="12" v-else-if="item.twn == 2">
        <el-col :span="4">
            <el-radio v-model="item.res" label="0" >无</el-radio>
        </el-col>
        <el-col :span="8">
            <el-input label="item.name"  value="0" v-model="item.res">
                <template slot="append">{{item.unt}}</template>
            </el-input>
        </el-col>
    </el-col>
    <el-col :span="12" v-else-if="item.twn == 5" size="small">
        <el-radio-group v-model="item.res" size="medium">
            <el-radio-button
                      v-for="option in JSON.parse(item.dsc)"
                      :key="option.id"
                      :label="option.id">
                {{option.name}}
            </el-radio-button>
        </el-radio-group>
    </el-col>
    <el-col :span="12" v-else-if="item.twn == 6">
        <el-checkbox-group v-model="item.res">
            <el-checkbox
                    v-for="option in JSON.parse(item.dsc)"
                    :key="option.id"
                    :label="option.id">{{option.name}}
            </el-checkbox>
        </el-checkbox-group>
    </el-col>
    <el-col :span="12" v-else-if="item.twn == 7">
        <el-checkbox-group v-model="item.res">
            <el-checkbox-button
                    v-for="option in JSON.parse(item.dsc)"
                    :key="option.id"
                    :label="option.id">{{option.name}}
            </el-checkbox-button>
        </el-checkbox-group>
    </el-col>
    <el-col :span="24" v-else-if="item.twn == 32">
        <el-row>
            <el-checkbox-group v-model="res">
                <el-checkbox-button v-for="option in [18,17,16,15,14,13,12,11,21,22,23,24,25,26,27,28]" :label="option" :key="option">{{option}}</el-checkbox-button>
            </el-checkbox-group>

        </el-row>
        <el-row>
            <el-checkbox-group v-model="res">
                <el-checkbox-button v-for="option in [38,37,36,35,34,33,32,31,41,42,43,44,45,46,47,48]" :label="option" :key="option">{{option}}</el-checkbox-button>
            </el-checkbox-group>
            <!--<el-checkbox-group v-model="res">-->
                <!--<el-checkbox-button v-for="option in [41,42,43,44,45,46,47,48]" :label="option" :key="option">{{option}}</el-checkbox-button>-->
            <!--</el-checkbox-group>-->
        </el-row>
    </el-col>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['item'],
        name: 'item',
        data() {
            return {
                res:[],
                options:JSON.parse(this.item.dsc),
                newOption:""
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
            },
            addList(){
                this.options.push({
                    id: this.options.length,
                    name: this.newOption
                })
            }

        }
    }
</script>
