import Home from '../components/Home'
import Admin from '../components/admin/Home'
import Chart from '../components/graph/Chart'
import Db from '../components/db/Db'
import Sql from '../components/db/Sql'
import Course from '../components/courses/Course'
import AddCourse from '../components/courses/Add'
import Login from '../components/Login'
import Profile from '../components/Profile'
import Layout from '../components/Layout'

export default [

    { path: '/', component: Layout, children: [

        { path: '/academy', component: Home },
        { path: '/courses', component: Home },
        { path: '/profile', component: Profile },
        { path: '/analysis/chart', component: Chart },
        { path: '/courses/add', component: AddCourse },
        { path: '/courses/:id/edit', component: AddCourse, props: { editing: true } },
        { path: '/courses/:id', component: Course, props: { what: 'welcome' } },
        { path: '/courses/:id/lessons/:lesson_id', component: Course, props: { what: 'lesson' } },

    ]},

    { path: '/login', component: Login, props: { action: 'login' }, meta: { type: 'auth' } },

    { path: '/register', component: Login, props: { action: 'register' }, meta: { type: 'auth' } },

    { path: '/admin', component: Admin, children: [

        { path: 'db', component: Db, children: [

                { path: 'sql', component: Sql }

            ]
        },

    ]},

]