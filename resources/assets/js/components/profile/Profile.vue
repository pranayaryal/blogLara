<style scoped>

</style>

<template>
    <div class="shell">
		<div class="user">
			<div class="user_details">
				<div class="user_avatar" :style="{ 'background-image': 'url(' + profile.avatar + ')' }"></div>
				<h2 class="user_name">Zach Hornsby</h2>
				<p class="user_title">Senior Font End Developer</p>

				<ul class="user_social">
					<li><a :href="profile.instagram"><i class="icon-instagram"></i></a></li>
					<li><a :href="profile.twitter"><i class="icon-twitter"></i></a></li>
					<li><a :href="profile.github"><i class="icon-github"></i></a></li>
					<li><a :href="profile.dribbble"><i class="icon-dribbble"></i></a></li>
				</ul>
			</div>
			
			<div class="user_bio">
				{{ profile.bio }}
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
