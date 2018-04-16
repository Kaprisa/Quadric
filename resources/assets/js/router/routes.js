import Home from '../components/Home'
import Admin from '../components/admin/Home'
import Chart from '../components/graph/Chart'
import Db from '../components/db/Db'
import Sql from '../components/db/Sql'
import Course from '../components/courses/Course'
import AddCourse from '../components/courses/Add'
import Login from '../components/Login'
//import Landing from '../components/Landing'

export default [
    { path: '/', component: Home },
    { path: '/courses', component: Home },
    { path: '/login', component: Login, props: { action: 'login' }, meta: { type: 'auth' } },
    { path: '/register', component: Login, props: { action: 'register' }, meta: { type: 'auth' } },
    { path: '/admin', component: Admin },
    { path: '/analysis/chart', component: Chart },
    { path: '/db', component: Db, children: [
            {
                path: 'sql',
                component: Sql
            }
        ]
    },
    { path: '/courses/add', component: AddCourse },
    { path: '/courses/:id/edit', component: AddCourse, props: { editing: true } },
    { path: '/courses/:id', component: Course, props: { what: 'welcome' } },
    { path: '/courses/:id/lessons/:lesson_id', component: Course, props: { what: 'lesson' } },
]