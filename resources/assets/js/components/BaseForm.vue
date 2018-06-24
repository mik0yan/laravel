<template>
    <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="健康体检表">
        </el-form-item>
        <el-form-item label="记录日期">
            <el-col :span="11">
                <el-date-picker type="date" placeholder="选择日期" v-model="form.base.record_at" style="width: 100%;"></el-date-picker>
            </el-col>
        </el-form-item>
        <el-form-item label="姓名">
            <el-col :span="8">
                <el-input v-model="form.base.name"></el-input>
            </el-col>
        </el-form-item>
        <el-form-item label="性别">
            <el-col :span="8">
                <el-select v-model="form.base.gender" placeholder="请选择性别">
                    <el-option label="性别未知" value="0"></el-option>
                    <el-option label="男" value="1"></el-option>
                    <el-option label="女" value="2"></el-option>
                    <el-option label="未说明" value="9"></el-option>
                </el-select>
            </el-col>
        </el-form-item>
        <el-form-item label="出生日期">
            <el-col :span="8">
                <el-date-picker type="date" placeholder="出生日期" v-model="form.base.birthday" style="width: 100%;"></el-date-picker>
            </el-col>
        </el-form-item>
        <el-form-item label="工作单位">
            <el-col :span="8">
                <el-date-picker type="date" placeholder="出生日期" v-model="form.base.birthday" style="width: 100%;"></el-date-picker>
            </el-col>
        </el-form-item>
        <el-form-item label="本人电话">
            <el-col :span="8">
                <el-input type="tel"  v-model="form.base.phone"></el-input>
            </el-col>
        </el-form-item>

        <el-form-item label="联系人">
            <el-col class="line" :span="8">
                <el-input type="text" v-model="form.base.username"></el-input>
            </el-col>
            <el-col class="line"  :span="5">
                联系人电话
            </el-col>
            <el-col :span="8">
                <el-input type="tel" v-model="form.base.userphone"></el-input>
            </el-col>
        </el-form-item>
        <el-form-item label="常驻类型">
            <el-col class="line"  :span="10">
                <el-radio-group v-model="form.base.hukou">
                    <el-radio label="户籍"></el-radio>
                    <el-radio label="非户籍"></el-radio>
                </el-radio-group>
            </el-col>
        </el-form-item>
        <el-form-item label="民族">
            <el-col class="line"  :span="10">
                <el-radio-group v-model="form.base.ethnic">
                    <el-radio label="汉族"></el-radio>
                    <el-radio label="少数民族"></el-radio>
                </el-radio-group>
            </el-col>
        </el-form-item>
        <el-form-item label="血型">
            <el-col class="line"  :span="12">
                <el-radio-group v-model="form.base.blood.type">
                    <el-radio label="A"></el-radio>
                    <el-radio label="B"></el-radio>
                    <el-radio label="AB"></el-radio>
                    <el-radio label="O"></el-radio>
                    <el-radio label="未知"></el-radio>
                </el-radio-group>
            </el-col>
            <el-col class="line" :span="4"></el-col>
            <el-col class="line"  :span="8">
                <el-radio-group v-model="form.base.blood.rh">
                    <el-radio label="Rh-"></el-radio>
                    <el-radio label="Rh+"></el-radio>
                    <el-radio label="未知"></el-radio>
                </el-radio-group>
            </el-col>
        </el-form-item>
        <el-form-item label="文化程度">
            <el-col class="line"  :span="10">
                <el-select v-model="form.base.eduction" placeholder="">
                    <el-option label="文盲及半文盲" value="1"></el-option>
                    <el-option label="小学" value="2"></el-option>
                    <el-option label="初中" value="3"></el-option>
                    <el-option label="高中/技校/中专" value="4"></el-option>
                    <el-option label="大学专科及以上" value="5"></el-option>
                    <el-option label="不祥" value="6"></el-option>
                </el-select>
            </el-col>
        </el-form-item>
        <el-form-item label="职业">
            <el-col class="line"  :span="10">
                <el-select v-model="form.base.career" placeholder="">
                    <el-option label="国家机关、党群组织、企业、事业单位负责人" value="1"></el-option>
                    <el-option label="专业技术人员" value="2"></el-option>
                    <el-option label="办事人员和有关人员" value="3"></el-option>
                    <el-option label="商业、服务业人员" value="4"></el-option>
                    <el-option label="农、林、牧、渔、水利业生产人员" value="5"></el-option>
                    <el-option label="生产、运输设备操作人员及有关人员" value="6"></el-option>
                    <el-option label="军人" value="7"></el-option>
                    <el-option label="不便分类的其他从业人员" value="8"></el-option>
                </el-select>
            </el-col>
        </el-form-item>
        <el-form-item label="职业">
            <el-col class="line"  :span="10">
                <el-select v-model="form.base.marital" placeholder="">
                    <el-option label="未婚" value="1"></el-option>
                    <el-option label="已婚" value="2"></el-option>
                    <el-option label="丧偶" value="3"></el-option>
                    <el-option label="离婚" value="4"></el-option>
                    <el-option label="未说明的婚姻状况" value="5"></el-option>
                </el-select>
            </el-col>
        </el-form-item>
        <el-form-item label="支付方式">
            <el-col class="line"  :span="10">
                <el-select v-model="form.base.marital" placeholder="">
                    <el-option label="城镇职工基本医疗保险" value="1"></el-option>
                    <el-option label="城镇居民基本医疗保险" value="2"></el-option>
                    <el-option label="新型农村合作医疗" value="3"></el-option>
                    <el-option label="贫困救助" value="4"></el-option>
                    <el-option label="商业医疗保险" value="5"></el-option>
                    <el-option label="全公费" value="6"></el-option>
                    <el-option label="全自费" value="7"></el-option>
                    <el-option label="其他" value="8"></el-option>
                </el-select>
            </el-col>
        </el-form-item>
        <el-form-item label="药物过敏史">
            <el-col class="line" :span="24">
                <el-checkbox-group v-model="form.base.allergy">
                    <el-checkbox label="无" name="type"></el-checkbox>
                    <el-checkbox label="青霉素" name="type"></el-checkbox>
                    <el-checkbox label="磺胺" name="type"></el-checkbox>
                    <el-checkbox label="链霉素" name="type"></el-checkbox>
                    <el-checkbox label="其他" name="type"></el-checkbox>
                </el-checkbox-group>
            </el-col>
        </el-form-item>
        <el-form-item label="既往史-疾病">
            <el-row v-for="(item, key) in form.base.his_disease" :key="key">
                <el-col type="line"  :span="12">
                    <el-select v-model="item.disease" placeholder="">
                        <el-option label="无" value="1"></el-option>
                        <el-option label="高血压" value="2"></el-option>
                        <el-option label="糖尿病" value="3"></el-option>
                        <el-option label="冠心病" value="4"></el-option>
                        <el-option label="慢性阻塞性肺疾病" value="5"></el-option>
                        <el-option label="恶性肿瘤" value="6"></el-option>
                        <el-option label="脑卒中" value="7"></el-option>
                        <el-option label="重性精神疾病" value="8"></el-option>
                        <el-option label="结核病" value="9"></el-option>
                        <el-option label="肝炎" value="10"></el-option>
                        <el-option label="其他法定传染病" value="11"></el-option>
                        <el-option label="其他" value="12"></el-option>
                    </el-select>
                </el-col>
                <el-col :span="12">
                    <el-date-picker type="date" placeholder="确认日期" v-model="item.date" style="width: 100%;"></el-date-picker>
                </el-col>
            </el-row>
            <el-row >
                <el-col type="line"  :span="8">
                    <el-button type="success" @click="addHistory" icon="el-icon-plus" circle></el-button>
                </el-col>
            </el-row>
        </el-form-item>
        <el-form-item label="既往史-手术">
            <el-row v-for="(item, key) in form.base.his_surgical" :key="key">
                <el-col type="line"  :span="12">
                    <el-input v-model="item.surgical"></el-input>
                </el-col>
                <el-col :span="12">
                    <el-date-picker type="date" placeholder="手术日期" v-model="item.date" style="width: 100%;"></el-date-picker>
                </el-col>
            </el-row>
            <el-row >
                <el-col type="line"  :span="8">
                    <el-button type="success" @click="addSurgical" icon="el-icon-plus" circle></el-button>
                </el-col>
            </el-row>
        </el-form-item>
        <el-form-item label="既往史-创伤">
            <el-row v-for="(item, key) in form.base.his_trauma" :key="key">
                <el-col type="line"  :span="12">
                    <el-input v-model="item.trauma"></el-input>
                </el-col>
                <el-col :span="12">
                    <el-date-picker type="date" placeholder="手术日期" v-model="item.date" style="width: 100%;"></el-date-picker>
                </el-col>
            </el-row>
            <el-row >
                <el-col type="line"  :span="8">
                    <el-button type="success" @click="addTrauma" icon="el-icon-plus" circle></el-button>
                </el-col>
            </el-row>
        </el-form-item>
        <el-form-item label="既往史-输血">
            <el-row v-for="(item, key) in form.base.his_bloodtrans" :key="key">
                <el-col type="line"  :span="12">
                    <el-input v-model="item.bloodtrans"></el-input>
                </el-col>
                <el-col :span="12">
                    <el-date-picker type="date" placeholder="手术日期" v-model="item.date" style="width: 100%;"></el-date-picker>
                </el-col>
            </el-row>
            <el-row >
                <el-col type="line"  :span="8">
                    <el-button type="success" @click="addBloodtrans" icon="el-icon-plus" circle></el-button>
                </el-col>
            </el-row>
        </el-form-item>
        <el-form-item label="家族病史">
            <el-row v-for="(item, key) in form.base.his_family" :key="key">
                <el-col type="line"  :span="4">
                    <el-select v-model="item.relation" placeholder="亲属关系">
                        <el-option label="父亲" value="父亲"></el-option>
                        <el-option label="母亲" value="母亲"></el-option>
                        <el-option label="兄妹" value="兄妹"></el-option>
                        <el-option label="子女" value="子女"></el-option>
                    </el-select>
                </el-col>
                <el-col :span="18">
                    <el-checkbox-group v-model="item.disease">
                        <el-checkbox label="高血压" name="type"></el-checkbox>
                        <el-checkbox label="糖尿病" name="type"></el-checkbox>
                        <el-checkbox label="冠心病" name="type"></el-checkbox>
                        <el-checkbox label="慢性阻塞性肺疾病" name="type"></el-checkbox>
                        <el-checkbox label="恶性肿瘤" name="type"></el-checkbox>
                        <el-checkbox label="脑卒中" name="type"></el-checkbox>
                        <el-checkbox label="重性精神疾病" name="type"></el-checkbox>
                        <el-checkbox label="结核病" name="type"></el-checkbox>
                        <el-checkbox label="肝炎" name="type"></el-checkbox>
                        <el-checkbox label="先天畸形" name="type"></el-checkbox>
                        <el-checkbox label="其他" name="type"></el-checkbox>
                    </el-checkbox-group>
                </el-col>
            </el-row>
            <el-row >
                <el-col type="line"  :span="8">
                    <el-button type="success" @click="addFamily" icon="el-icon-plus" circle></el-button>
                </el-col>
            </el-row>
        </el-form-item>
        <el-form-item label="遗传病">
            <el-col type="line"  :span="8">
                <el-input v-model="form.base.genetic"></el-input>
            </el-col>
        </el-form-item>
        <el-form-item label="遗传病">
            <el-col type="line"  >
                <el-checkbox-group v-model="form.base.disability">
                    <el-checkbox label="无残疾" name="type"></el-checkbox>
                    <el-checkbox label="视力残疾" name="type" ></el-checkbox>
                    <el-checkbox label="听力残疾" name="type" ></el-checkbox>
                    <el-checkbox label="言语残疾" name="type" ></el-checkbox>
                    <el-checkbox label="肢体残疾" name="type" ></el-checkbox>
                    <el-checkbox label="智力残疾" name="type" ></el-checkbox>
                    <el-checkbox label="精神残疾" name="type" ></el-checkbox>
                    <el-checkbox label="其他残疾" name="type" ></el-checkbox>
                </el-checkbox-group>
            </el-col>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        props: ['form'],
        name: 'record',
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
