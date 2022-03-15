<template>
    <el-container>
        <el-header>
            <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" background-color="#545c64" text-color="#fff" text-size="36px" active-text-color="#ffd04b" router="true">
                <el-menu-item index="/home">ST&H workshop</el-menu-item>
                <el-menu-item v-for="(item, index) in navBar" :key="item.id" :index="item.component">{{ item.value }}</el-menu-item>
            </el-menu>
        </el-header>
        <router-view></router-view>
    </el-container>
</template>

<script>
export default {
    data() {
        return {
            navBar: [
                {id: '1', value:"首頁", component:"home"},
                {id: '2', value:"關於", component:"about"}
            ]
        }
    },
    computed: {
        activeIndex() {
            console.log(this.$route.path.replace('/',''))
            return this.$route.path.replace('/','')
        }
    },
};
</script>
