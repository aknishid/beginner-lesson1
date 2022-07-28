<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 9</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>

                    <div class="quesion-header">Laravel + Vue.js CRUD</div>
                    <div>
                        Lesson 7 で作成したテーブルcustomers のCRUD機能の実装<br>

                        ・customersの新規作成<br>
                        <input type="text" id="customer" v-model="name">
                        <button type="button" class="btn btn-primary" @click="insert">追加</button><br>
                        ・customersの一覧表示<br>
                        ・customersの編集<br>
                        ・customersの削除<br>
                    <li v-for="result in results" :key="result.id">
                        {{ result.id}} {{ result.name}}
                        <button type="button" class="btn btn-primary" @click="deleteCustomerById(result.id)">削除</button>
                        <input type="text" id="customer-update" v-model="updateName[result.id]">
                        <button type="button" class="btn btn-primary" @click="update(result.id)">編集</button><br>
                    </li>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        //
    },
    data () {
        return {
            name: '',
            results: '',
            id: '',
            updateName: []
            //
        }
    },
    mounted () {
        this.getInit()
        //
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        onBack() {
            this.$router.push({ name: 'home' })
        },
        async getInit() {
            await axios.get('/api/customer').then( (data) => {
                console.log(data)
                this.results = data.data
            })
        },
        async insert() {
            await axios.post('/api/customer/insert', {name: this.$data.name}).then( (data) => {
                console.log(data)
            })
        },
        async update(id) {
            await axios.post('/api/customer/update', {name: this.$data.updateName[id], id: id}).then( (data) => {
                console.log(data)
            })
        },
        async deleteCustomerById(id) {
            await axios.post('/api/customer/delete', {id: id}).then( (data) => {
                console.log(data)
            })
        },
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>
