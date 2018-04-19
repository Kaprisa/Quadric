<template>
    <v-dialog v-model="dialog">
        <v-btn
                color="pink"
                small
                dark
                fab
                slot="activator"
                @click="init(); dialog=true;"
        >
            <v-icon>palette</v-icon>
        </v-btn>
        <v-card class="elevation-12">
            <v-card-media src="/images/new_york.jpeg" height="15vh">
            </v-card-media>
            <v-layout row wrap class="px-3 py-2" justify-space-around>
                <v-flex xs11 class="layout">
                    <v-select
                            placeholder="Название"
                            v-model="item.name"
                            :items="themes"
                            v-if="editing"
                    ></v-select>
                    <v-text-field
                            v-else
                            placeholder="Название"
                            v-model="item.name"
                    ></v-text-field>
                </v-flex>
                <v-flex xs5 v-for="v, k in item.colors" :key="k">
                    <color-picker :vcolor="k" :label="k" @change="(color) => item.colors[k] = color"></color-picker>
                </v-flex>
            </v-layout>
            <v-card-actions>
                <v-spacer/>
                <v-btn @click="save" color="teal" dark>Сохранить</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    import ColorPicker from './ColorPicker'
    import {mapActions, mapGetters} from 'vuex'
    import Snackbar from './Snackbar'
    import axios from 'axios'

    export default {
        components: {
            ColorPicker,
            Snackbar
        },
        data() {
            const themeMap = [
                'primary',
                'secondary',
                'accent',
                'error',
                'warning',
                'info',
                'success'
            ]
            return {
                snackbar: {},
                editing: false,
                dialog: false,
                themeMap,
                item: {}
            }
        },
        mounted() {
            this.init()
            this.getThemes()
        },
        computed: {
            ...mapGetters({
                themes: 'themes',
                user: 'user'
            })
        },
        methods: {
            ...mapActions([
                'getThemes'
            ]),
            init() {
                this.item = {
                    colors: {
                        primary: '#1976D2',
                        secondary: '#424242',
                        accent: '#82B1FF',
                        error: '#FF5252',
                        info: '#2196F3',
                        success: '#4CAF50',
                        warning: '#FFC107'
                    },
                }
            },

            save() {
                axios.post('/api/themes/save', this.item).then(res => {
                    if (!this.item.id) this.themes.push(res.data)
                    this.processSuccess('Тема успешно сохранена!')
                }).catch(this.processError)
            },

            processError({ response }) {
                const errors = response && response.data && response.data.errors
                this.snackbar = {
                    visible: true,
                    text: errors ? errors[Object.keys(errors)[0]] : 'Ошибка сервера',
                    error: true
                }
                this.dialog = false
            },

            processSuccess(msg, cb = null) {
                this.snackbar = {
                    visible: true,
                    text: msg,
                    error: false
                }
                this.dialog = false
                if (cb) cb()
            }
        }
    }
</script>