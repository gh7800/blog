
<template>
    <div class="">

        <div class="">vye login</div>
        <router-link to="/authuserinfo">info</router-link>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            phone: ''
        }
    },
    mounted() {
        this.getResult()
    },
    methods: {
        getResult() {
            const phone = this.$route.params.phone;
            this.$axios.post('/api/login').then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error)

            })
        }
    }
}
</script>
