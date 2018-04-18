<template>
    <v-container>
        <v-card class="elevation-12">
            <v-card-media src="/images/new_york.jpeg" height="15vh">
            </v-card-media>
            <v-layout row wrap class="px-3 py-2" justify-space-around>
                <v-flex xs11 class="layout">
                    <v-select
                            placeholder="Название"
                            v-model="theme.name"
                            :items="themes"
                            v-if="editing"
                    ></v-select>
                    <v-text-field
                            v-else
                            placeholder="Название"
                            v-model="theme.name"
                    ></v-text-field>
                    <v-tooltip bottom>
                        <v-btn
                                @click="editing = !editing"
                                small
                                dark
                                fab
                                color="pink"
                                slot="activator"
                                v-if="themes.length"
                        >
                            <v-icon>{{ editing ? 'add' : 'edit'}}</v-icon>
                        </v-btn>
                        <span>Выбрать для редактирования</span>
                    </v-tooltip>
                </v-flex>
                <v-flex xs5 v-for="v, k in theme.colors" :key="k">
                    <color-picker :vcolor="k" :label="k" @change="(color) => theme.colors[k] = color"></color-picker>
                </v-flex>
            </v-layout>
            <v-card-actions>
                <v-spacer/>
                <v-btn @click="save" color="teal" dark>Сохранить</v-btn>
            </v-card-actions>
        </v-card> 
    </v-container>
</template>

<script>
    import ColorPicker from '../components/common/ColorPicker'
    import {mapActions, mapGetters} from 'vuex'
    import Snackbar from '../components/common/Snackbar'
    import axios from 'axios'

    export default {
        components: {
            ColorPicker,
            Snackbar
        },
        data() {
            return {
                snackbar: {},
                editing: false,
                theme: {
                    colors: {
                        primary: 'blue',
                        secondary: 'pink',
                        accent: 'teal',
                        error: 'red',
                        warning: 'yellow',
                        info: 'blue',
                        success: 'green'
                    },
                }
            }
        },
        mounted() {
           this.getThemes()
        },
        computed: {
            ...mapGetters({
                themes: 'themes'
            })
        },
        methods: {
            ...mapActions([
                'getThemes'
            ]),
            save() {
                axios.post('/api/themes/save', this.item).then(res => {
                    if (!this.item.id) this.settings.push(res.data)
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