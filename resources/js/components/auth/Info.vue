<template>
    <div class="">
        <div class="">vue info</div>
        <el-button>info---</el-button>
    </div>
</template>

<script>
export default {
    name: 'AuthUserInfo',
    data () {
        return {
            phone: ''
        }
    },
    mounted () {
        this.getResult()
    },
    methods: {
        getResult () {
            const phone = this.$route.params.phone;
            this.$axios.post('/api/authuserinfo').then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error)

            })
        }
    }
}
</script>
