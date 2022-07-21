<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">Lesson 3</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>

                    <div class="quesion-header">電卓を作成してください。</div>
                    <button style="width:2rem;" v-on:click="tmp += '1'">1</button>
                    <button style="width:2rem;" v-on:click="tmp += '2'">2</button>
                    <button style="width:2rem;" v-on:click="tmp += '3'">3</button>
                    <button style="width:2rem;" v-on:click="tmp += '4'">4</button>
                    <button style="width:2rem;" v-on:click="tmp += '5'">5</button>
                    <button style="width:2rem;" v-on:click="tmp += '6'">6</button>
                    <button style="width:2rem;" v-on:click="tmp += '7'">7</button>
                    <button style="width:2rem;" v-on:click="tmp += '8'">8</button>
                    <button style="width:2rem;" v-on:click="tmp += '9'">9</button>
                    <button style="width:2rem;" v-on:click="tmp += '0'">0</button>

                    {{ tmp }}
                    <br>
                    <hr>
                    <button style="width:2rem;" v-on:click="sign = '+'; count = parseInt(tmp); tmp = ''">+</button>
                    <button style="width:2rem;" v-on:click="sign = '-'; count = parseInt(tmp); tmp = ''">-</button>
                    <button style="width:2rem;" v-on:click="calc">=</button>
                    <button style="width:2rem;" v-on:click="tmp = '';count = 0">C</button>

                    {{ count }}
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
            count: 0,
            tmp: '',
            sign: ''
        }
    },
    mounted () {
        //
    },
    watch: {
        //
    },
    computed: {
    },
    methods: {
        onBack() {
            this.$router.push({ name: 'home' })
        },
        calc() {
            if (this.$data.sign === '+') {
                this.$data.count += parseInt(this.$data.tmp)
            }
            else if (this.$data.sign === '-') {
                this.$data.count -= parseInt(this.$data.tmp)
            }
        }
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>
