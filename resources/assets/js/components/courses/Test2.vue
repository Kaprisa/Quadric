<template>
    <v-container>
        <v-toolbar dark color="primary">
            <v-btn icon @click.native="$emit('close')" dark>
                <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title>Тест</v-toolbar-title>
            <v-spacer></v-spacer>
        </v-toolbar>
        <v-card transition="fade-transition" class="elevation-12 mb-3 pa-2" v-show="percent !== null">
            <v-layout justify-space-around align-center>
                <v-flex xs4>
                    <canvas ref="pie" width="150" height="150"></canvas>
                </v-flex>
                <v-flex v-if="percent !== null" xs6 class="layout column justify-center align-center">

                    <v-chip class="my-1">
                        <v-avatar class="secondary text--white">%</v-avatar>
                        {{ percent }} / 100
                    </v-chip>

                    <v-chip class="my-1">
                        <v-avatar class="accent"><v-icon dark>euro_symbol</v-icon></v-avatar>
                        {{ points }} / {{ questions.length * 5 }}
                    </v-chip>


                    <v-btn class="my-1" color="primary" @click="clear">Пройти тест заново</v-btn>

                </v-flex>
            </v-layout>
        </v-card>
        <v-card v-for="q, index in questions" :key="`qb${index}`" class="mb-2 pa-2">
            <span class="subheading" v-html="md.render(q.text)"></span>
            <v-layout v-if="q.type.startsWith('test')" v-for="a, i in q.answers" :key="`a${i}`" row class="mb-1 mt-2">
                <div style="flex-basis: 30px;">
                    <v-switch
                            :disabled="percent !== null"
                            color="success"
                            class="mr-2"
                            v-model="a.checked"
                            hide-details
                            @change="(v) => { if (q.type === 'test_one' && v) { q.answers.forEach(e => e.checked = false ); a.checked = true; } }"
                    ></v-switch>
                </div>
                <div>
                    <span style="line-height: 30px;" v-html="md.render(a.text)"></span>
                </div>
            </v-layout>
            <v-text-field v-if="q.type === 'task'" label="Ваш ответ" v-model="q.user_answer"></v-text-field>
            <v-card-actions v-if="percent !== null">
                <v-spacer></v-spacer>
                <v-icon v-if="q.correct" color="success">check_circle</v-icon>
                <v-icon v-else color="error">remove_circle</v-icon>
            </v-card-actions>
        </v-card>
        <div class="text-xs-center">
            <v-btn color="primary" @click="check" v-if="percent === null">Проверить</v-btn>
        </div>
        <snackbar :options="snackbar"></snackbar>
    </v-container>
</template>

<script>
    import Snackbar from '../common/Snackbar'
    import axios from 'axios'
    import md from '../../markdown'
    import Chart from 'chart.js'
    import { mapGetters } from 'vuex'
    export default {
        name: 'test',
        data() {
            return {
                snackbar: {},
                page: 1,
                ex7: 0,
                active: "0",
                answer: '',
                md,
                percent: null,
                points: 0
            }
        },
        components: {
            Snackbar
        },
        props: {
            questions: Array
        },
        computed: {
            ...mapGetters({
                user: 'user'
            })
        },
        methods: {
            check() {
                const correctCount = this.questions.reduce((carry, q) => {
                    if (q.type === 'task') {
                        if (q.user_answer) {
                            const answers = q.answer.split(';')
                            q.correct = answers.some(a => a.replace(/\s/g,'').toLowerCase() === q.user_answer.replace(/\s/g,'').toLowerCase())
                        } else q.correct = false
                    } else q.correct = q.answers.every(a => Boolean(a.checked) === Boolean(a.correct))
                    if (q.correct) carry ++
                    return carry
                }, 0)
                const length = this.questions.length
                this.percent = Math.round((correctCount * 100) / length)
                this.points = correctCount * 5
                const pie = this.$refs.pie
                const myPieChart = new Chart(pie,
                    {
                        type: "pie",
                        data: {
                            labels: [
                                "Правильные ответы",
                                "Неправилные ответы"
                            ],
                            datasets: [
                                {
                                    data: [
                                        correctCount,
                                        length - correctCount,
                                    ],
                                    backgroundColor: [
                                        this.user.theme.colors.success,
                                        this.user.theme.colors.error
                                    ],
                                    hoverBackgroundColor: [
                                        "#00ff00",
                                        "#ff0000"
                                    ]
                                }
                            ]
                        },
                        options: {}
                    }
                )
                axios.post(`/api/user/test`, { lesson: this.questions[0].lesson_id, percent: this.percent  })
            },
            clear() {
                this.questions.forEach(q => {
                    q.correct = false
                    q.answers.forEach(a => a.checked = false)
                })
                this.percent = null
            }
        }
    }
</script>