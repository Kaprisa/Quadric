<template>
    <v-container>
        <v-expansion-panel>
            <v-expansion-panel-content :value="false" v-if="lesson.video">
                <div slot="header">Смотреть видео</div>
                <v-video :props="{ video: lesson.video }"></v-video>
            </v-expansion-panel-content>
            <v-expansion-panel-content :value="false" v-if="lesson.text">
                <div slot="header">Конспект лекции</div>
                <div class="pa-3" v-html="lesson.text"></div>
            </v-expansion-panel-content>
            <v-expansion-panel-content :value="false" v-if="lesson.resources && lesson.resources.length">
                <div slot="header">Дополнительные ресурсы</div>
                <v-list dense>
                    <v-list-tile avatar v-for="r in lesson.resources" :key="r">
                        <v-list-tile-content>
                            <v-list-tile-title>{{ r }}</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-expansion-panel-content>
        </v-expansion-panel>
        <div class="text-xs-center">
            <v-dialog v-model="testDialog" width="70vw">
                <v-btn slot="activator" color="accent">Тест</v-btn>
                <v-card>
                    <test :props="{ questions: lesson.questions }"></test>
                </v-card>
            </v-dialog>
        </div>
    </v-container>
</template>

<script>
    import VVideo from './Video'
    import Test from './Test'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        components: {
            VVideo,
            Test
        },
        mounted() {
            this.getLesson(this.$route.params.lesson_id)
        },
        data() {
            return {
                drawer: true,
                testDialog: false,
            }
        },
        watch: {
          $route(v) {
              const { lesson_id } = v.params
              if (lesson_id) {
                  this.getLesson(lesson_id)
              }
          }
        },
        computed: {
            ...mapGetters({
                lesson: 'lesson',
                loadingLesson: 'loadingLesson'
            })
        },
        methods: {
            ...mapActions([
                'getLesson'
            ]),
        }
    }
</script>