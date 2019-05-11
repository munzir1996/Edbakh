<template>

    <div>

        <div class="food-menu-plan-tabs text-center">

            <a :href="tab.href" @click="selectTab(tab)" v-for="tab in tabs" class="plan-tabs" :class="{ 'active-tab': tab.isActive }">

                {{tab.name}}

            </a>

        </div>

        <div>
            <slot></slot>
        </div>

    </div>

</template>

<script>
    export default {

        name: "tabs",

        data() {
            return { tabs: [] };
        },

        created() {
            this.tabs = this.$children;
        },

        methods: {
            selectTab(selectedTab) {
                this.tabs.forEach(tab => {
                    tab.isActive = (tab.href == selectedTab.href);
                });
            }
        }
    }
</script>

<style scoped>

</style>