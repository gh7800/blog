
<template>
    <div style="height:100%;">
        <div>
            <el-image :src="url" style="width:100%;height:100vh;"></el-image>
        </div>

        <div id="main">
            <!--            <el-image :src="require('../../../assets/logo.png')" /> //加载失败-->
            <el-form :model="loginForm">
                <el-form-item>
                    <el-col>
                        <el-input v-model="loginForm.username" placeholder="请输入账号.." clearable/>
                        <br/>
                        <el-input v-model="loginForm.password" placeholder="请输入密码.." show-password/>
                    </el-col>
                    <el-button :loading='loading' type="primary" v-on:click="login">登 录</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            loginForm: {
                username: '',
                password: ''
            },
            loading: false,
            url: "https://cube.elemecdn.com/6/94/4d3ea53c084bad6931a56d5158a48jpeg.jpeg",
        }
    },
    methods: {
        login() {
            //console.log(this.loginForm)
            const param = new URLSearchParams();
            param.append('username',this.loginForm.username);
            param.append('password',this.loginForm.password);

            this.$axios.post('/api/login', this.loginForm).then(response => {
                // console.log(response.data)
                $data = response.data;
                if($data.success) {
                    this.$message.success($data.message)
                    this.$router.replace('home')
                }else{
                    this.$message.error($data.message)
                }
            }).catch(error => {
                //console.log(error.data.message)
                alert(error.data.message)
            })
        }
    }
}
</script>

<style scoped>
#main {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 600px;
    height: 400px;
    margin-left: -300px;
    margin-top: -200px;
}

.el-image {
    width: 120px;
    height: 120px;
    margin-bottom: 20px;
}

.el-input {
    width: 300px;
    margin-bottom: 20px;
}

.el-button {
    width: 300px;
}
</style>
