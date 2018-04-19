<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8>
                <v-card class="elevation-12">
                    <v-card-media src="/images/new_york.jpeg" height="30vh">
                    </v-card-media>
                    <v-layout @keypress.13="saveProfile" style="position: relative;">
                        <v-avatar
                                size="150px"
                                style="position: absolute; left: 100px; top: -75px;"
                        >
                            <input
                                    type="file"
                                    accept="image/*"
                                    @change="uploadAvatar($event.target.files[0])"
                                    class="input-file"
                            >
                            <img
                                    :src="`uploads/users/${user.avatar}`"
                            >
                        </v-avatar>
                        <v-flex xs5 class="layout column align-center" style="margin-top: 100px;">
                            <span class="headline">{{ user ? user.name : ''}}</span>
                            <v-chip>
                                <v-avatar class="success"><v-icon dark>euro_symbol</v-icon></v-avatar>
                                {{ user.points }}
                            </v-chip>
                        </v-flex>
                        <v-flex xs7 class="pa-1">
                            <v-layout column>
                                <v-text-field
                                        prepend-icon="account_circle"
                                        placeholder="Имя"
                                        v-model="user.name"
                                ></v-text-field>
                                <v-text-field
                                        prepend-icon="mail"
                                        placeholder="Email"
                                        v-model="user.email"
                                ></v-text-field>
                                <v-text-field
                                        type="tel"
                                        prepend-icon="phone"
                                        placeholder="(000) 000 - 0000"
                                        mask="phone_iphone"
                                        v-model="user.phone"
                                ></v-text-field>
                                <v-btn @click="saveProfile" color="secondary" dark>Сохранить</v-btn>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import { mapGetters } from 'vuex'
    import axios from 'axios'
    import Snackbar from './common/Snackbar'
    export default {
        name: 'Profile',
        data() {
            return {
                snackbar: {}
            }
        },
        computed: {
            ...mapGetters({
                user: 'user'
            })
        },
        methods: {
            uploadAvatar(file) {
                const formData = new FormData()
                if (!file) return
                formData.append('avatar', file, file.name)
                axios.put('/api/user/avatar', formData)
                    .then(({ data }) => this.user.avatar = data)
                    .catch(this.processError);
            },
            saveProfile() {
                axios.put('/api/user/profile', this.user).then(res => [
                    this.snackbar = {
                        visible: true,
                        text: 'Ваш профиль успешно обновлен!',
                        error: false
                    }
                ]).catch(this.processError)
            },
            processError({ response }) {
                const errors = response && response.data && response.data.errors
                this.snackbar = {
                    visible: true,
                    text: errors ? errors[Object.keys(errors)[0]] : 'Ошибка сервера',
                    error: true
                }
            }
        }
    }
</script>