<style scoped>

</style>

<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <img :src="profile.avatar" alt="Profile of ...">
            </div>

            <div class="panel-body">
                <p>{{ profile.bio }} </p>
                <ul>
                    <li><a :href="profile.instagram">Instagram</a></li>
                    <li><a :href="profile.twitter">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>

</template>

<script>
    function profileInitialState() {
        return {
            profile: {
                avatar: '',
                bio: '',
                instagram: '',
                twitter: '',
                user: {}
            }
        }
    }

    export default {
        data() {
            return profileInitialState()
        },
        mounted() {
            this.prepareComponent()
        },
        methods: {
            prepareComponent() {
                this.getProfile()
            },
            getProfile() {
                this.$http.get('/api/profile')
                    .then(response => {
                        this.profile = response.data;
                    });
            }
        }
    }
</script>
