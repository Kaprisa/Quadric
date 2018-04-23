<template>
    <div>
        <v-tabs
                v-model="active"
                color="secondary"
                dark
                slider-color="accent"
                centered
                show-arrows
        >
            <v-tab
                    v-for="q, index in props.questions"
                    :key="`q${index}`"
                    ripple
            >
                {{ index + 1 }}
                <v-icon v-if="q.correct" dark>check_circle</v-icon>
            </v-tab>
            <v-tab-item v-for="q, index in props.questions" class="py-2 px-3" :key="`qb${index}`">
                <span class="subheading">{{ q.text }}</span>
                <!--<v-radio-group v-if="q.type === 'test_single'" v-model="ex7" column>-->
                    <!--<v-radio-->
                            <!--:label="a.text"-->
                            <!--color="success"-->
                            <!--:value="i"-->
                            <!--@change="q.answers.forEach(u => u.checked = false); a.checked = true;"-->
                            <!--v-for="a, i in q.answers"-->
                            <!--:key="`a${i}`"-->
                    <!--&gt;</v-radio>-->
                <!--</v-radio-group>-->
                <v-layout v-for="a, i in q.answers" :key="`a${i}`" row class="mb-1 mt-2">
                    <div style="flex-basis: 30px;">
                        <v-checkbox
                                color="success"
                                v-model="a.checked"
                                hide-details
                        ></v-checkbox>
                    </div>
                    <div>
                        <span style="line-height: 30px;">{{ a.text }}</span>
                    </div>
                </v-layout>
                <v-btn
                        @click="q.answers.forEach(a => a.checked = false)"
                        color="info"
                        v-if="q.answered"
                        dark
                >
                    Сброс
                </v-btn>
                <v-btn @click="check(q)" color="success">Проверить</v-btn>
                <v-chip>
                    <v-avatar class="accent"><v-icon dark>euro_symbol</v-icon></v-avatar>
                    {{ q.correct ? q.points : 0 }} / {{ q.points }}
                </v-chip>
                <v-chip v-if="q.attempts">
                    <v-avatar class="error">A</v-avatar>
                    {{ q.attempts }}
                </v-chip>
            </v-tab-item>
        </v-tabs>
        <snackbar :options="snackbar"></snackbar>
    </div>
</template>

<script>
    import Snackbar from '../common/Snackbar'
    import axios from 'axios'
    export default {
        name: 'test',
        data() {
            return {
                snackbar: {},
                page: 1,
                ex7: 0,
                active: 1
            }
        },
        components: {
            Snackbar
        },
        props: {
           props: Object
        },
        methods: {
            check(q) {
                const isCorrect = q.answers.every(a => Boolean(a.checked) === Boolean(a.correct));
                this.snackbar = {
                    visible: true,
                    text: isCorrect ? 'Правильно!' : 'Не правильно:( Подумайте немного.. У вас все получится! ',
                    error: !isCorrect
                };
                if (isCorrect) {
                    q.correct = true
                } else {
                    q.correct = false;
                    if (q.attempts) q.attempts ++;
                    else q.attempts = 1
                }
                axios.post(`/api/question/${q.id}/answer`, { correct: q.correct, attempts: q.attempts })
            }
        }
    }
</script>