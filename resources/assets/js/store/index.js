import Vue from 'vue'
import Vuex from 'vuex'
import f from './modules'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        categories: f('Categories'),
        course: f('Course'),
        courses: f('Courses'),
        coursesAddInfo: f('CoursesAddInfo'),
        block: f('Block'),
        lesson: f('Lesson')
    }
})