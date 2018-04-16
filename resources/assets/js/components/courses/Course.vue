<template>
    <div style="position: relative;">
        <v-navigation-drawer
                v-model="drawer"
                app
                left
                width="250"

        >
            <div class="cube__navigation teal lighten-3">
                <v-icon @click="props.lesson.angleY -= 90" dark x-large>keyboard_arrow_left</v-icon>
                <v-icon @click="props.lesson.angleY += 90" dark x-large>keyboard_arrow_right</v-icon>
            </div>
            <v-list dense>
                <v-list-tile @click="$router.push(`/courses/${course.course.id}`)">
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
                        v-for="block in course.blocks" :key="block.name"
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>{{ block.name }}</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                            v-if="block.lessons"
                            v-for="lesson in block.lessons" :key="lesson.name"
                            @click="$router.push(`/courses/${course.course.id}/lessons/${lesson.id}`)"
                    >
                        <v-list-tile-content>
                            <v-list-tile-title>{{ lesson.name }}</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
        <!--<lesson :angleY="angleY"></lesson>-->
        <component :props="props[what]" :is="what"></component>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import Lesson from './Lesson'
    import Welcome from './Welcome'

    export default {
        data() {
            return {
                drawer: true,
                props: {
                   lesson: {
                       angleY: 0
                   },
                   welcome: {

                   }
                }
            }
        },
        props: {
          what: String
        },
        mounted() {
            this.getCourse(this.$route.params.id)
        },
        components: {
            Lesson,
            Welcome
        },
        computed: {
            ...mapGetters({
                course: 'course',
                loadingCourse: 'loadingCourse'
            })
        },
        methods: {
            ...mapActions([
                'getCourse'
            ]),
        }
    }
</script>