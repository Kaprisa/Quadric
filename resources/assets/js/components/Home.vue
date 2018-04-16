<template>
    <v-layout row wrap>
        <v-flex xs4 class="mb-3" v-for="c in courses" :key="c.id">
            <v-card class="mx-1">
                <v-card-media :src="`/uploads/photos/${c.image}`" height="200px">
                </v-card-media>
                <v-card-title primary-title>
                    <div>
                        <h3 class="headline mb-0">{{ c.name }}</h3>
                    </div>
                </v-card-title>
                <v-card-actions>
                    <v-btn @click="$router.push(`/courses/${c.id}`)" flat color="orange">Учиться!</v-btn>
                    <v-btn flat color="orange">Поступить</v-btn>
                    <v-btn fab dark small flat color="blue" @click="$router.push(`/courses/${c.id}/edit`)"><v-icon>edit</v-icon></v-btn>
                    <v-btn fab dark small flat color="red" @click="removeCourse(c.id)"><v-icon>delete</v-icon></v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
        <snackbar :options="snackbar"></snackbar>
    </v-layout>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import axios from 'axios'
    import Snackbar from './common/Snackbar'
    export default {
        data() {
            return {
                snackbar: {}
            }
        },
        mounted() {
          this.getCourses()
        },
        components: {
            Snackbar
        },
        computed: {
            ...mapGetters({
                courses: 'courses',
                loadingCourses: 'loadingCourses'
            })
        },
        watch: {
            loadingCourses(val) {
                if (!val) {
                    this.courses.forEach(c => c.show = false)
                }
            }
        },
        methods: {
            ...mapActions([
                'getCourses'
            ]),
            removeCourse(id) {
               axios.delete(`/api/courses/${id}`).then(_ => {
                  this.snackbar = {
                      visible: true,
                      text: 'Курс успешно удален.',
                      error: false
                  }
                  this.courses.splice(this.courses.findIndex(c => c.id === id), 1)
               }).catch(({ response }) => {
                   const errors = response && response.data && response.data.errors
                   this.snackbar = {
                       visible: true,
                       text: errors ? errors[Object.keys(errors)[0]] : 'Ошибка сервера',
                       error: true
                   }
               })
            }
        }
    }
</script>