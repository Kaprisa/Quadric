<template>
    <div style="position: relative;">
        <v-navigation-drawer
                v-model="drawer"
                app
                left
                width="200"

        >
            <v-list dense>
                <v-list-tile @click="">
                    <v-list-tile-action>
                        <v-icon>home</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Course</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-group
                        prepend-icon="graphic_eq"
                        no-action
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>Группы</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Основы</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Абелевы группы</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>glanguage</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
                <v-list-group
                        prepend-icon="graphic_eq"
                        no-action
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>Поля</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Основы</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Расширение полей</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>glanguage</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Поле многочленов</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>glanguage</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
        <!--<v-stepper v-model="e1">
            <v-stepper-header>
                <v-stepper-step step="1" :complete="e1 > 1">Name of step 1</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step step="2" :complete="e1 > 2">Name of step 2</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step step="3">Name of step 3</v-stepper-step>
            </v-stepper-header>
            <v-stepper-items>
                <v-stepper-content step="1">
                    <v-card color="grey lighten-1" class="mb-5" height="60vh">
                        <video width="100%" height="100%" controls>
                            <source src="video/v.mp4" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </v-card>
                    <v-btn color="primary" @click.native="e1 = 2">Continue</v-btn>
                    <v-btn flat>Cancel</v-btn>
                </v-stepper-content>
                <v-stepper-content step="2">
                    <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                    <v-btn color="primary" @click.native="e1 = 3">Continue</v-btn>
                    <v-btn flat>Cancel</v-btn>
                </v-stepper-content>
                <v-stepper-content step="3">
                    <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                    <v-btn color="primary" @click.native="e1 = 1">Continue</v-btn>
                    <v-btn flat>Cancel</v-btn>
                </v-stepper-content>
            </v-stepper-items>
        </v-stepper>-->
        <v-stepper v-model="e1">
            <v-stepper-header>
                <template v-for="l, n in lessons">
                    <v-stepper-step
                            :key="`${n}-step`"
                            :step="n"
                            :complete="e1 > n"
                            editable
                    >
                        Step {{ n }}
                    </v-stepper-step>
                    <v-divider v-if="n !== steps" :key="n"></v-divider>
                </template>
            </v-stepper-header>
            <v-stepper-items>
                <v-stepper-content
                        :step="n"
                        v-for="l, n in lessons"
                        :key="`${n}-content`"
                >
                    <v-card class="mb-2" height="60vh">
                        <component :is="l.component"></component>
                    </v-card>
                    <v-btn color="primary" @click="nextStep(n)">Продолжить</v-btn>
                    <v-btn flat>Отмена</v-btn>
                </v-stepper-content>
            </v-stepper-items>
        </v-stepper>
    </div>
</template>

<script>
    import VVideo from './courses/Video'
    import Test from './courses/Test'
    import Lesson from './courses/Text'
    export default {
        components: {
            VVideo,
            Test,
            Lesson
        },
        data() {
            return {
               drawer: true,
                steps: 2,
                e1: 0,
                currentView: 'v-video',
                lessons: [
                    {
                        component: 'v-video',
                        name: 'Video'
                    },
                    {
                        component: 'test',
                        name: 'test'
                    },
                    {
                        component: 'lesson',
                        name: 'text'
                    }
                ]
            }
        },
        methods: {
            nextStep (n) {
                if (n === this.steps) {
                    this.e1 = 1
                } else {
                    this.e1 = n + 1
                }
            }
        }
    }
</script>