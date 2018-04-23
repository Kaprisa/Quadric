import Layout from '../components/Layout'
import Home from '../components/Home'
import Profile from '../components/Profile'

import Course from '../components/courses/Course'
import AddCourse from '../components/courses/Add'

import Chart from '../components/graph/Chart'

import Login from '../components/Login'

import Admin from '../admin/Home'
import Db from '../admin/db/Db'
import Sql from '../admin/db/Sql'
import Users from '../admin/Users'
import Roles from '../admin/Roles'
import Permissions from '../admin/Permissions'
import Settings from '../admin/Settings'
import Themes from '../admin/Themes'
import Files from '../admin/Files'
import History from '../admin/History'
import HomeworkCheck from '../admin/HomeworkCheck'
import Kanban from '../admin/Kanban'

import GL from '../components/test/GL'
import Editor from '../components/test/Editor'
import Math from '../components/test/Math'

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
        { path: 'users', component: Users },
        { path: 'roles', component: Roles },
        { path: 'permissions', component: Permissions },
        { path: 'settings', component: Settings },
        { path: 'themes', component: Themes },
        { path: 'files', component: Files },
        { path: 'history', component: History },
        { path: 'homework', component: HomeworkCheck },
        { path: 'tasks', component: Kanban },

    ]},
    { path: '/gl', component: GL },
    { path: '/ed', component: Editor },
    { path: '/math', component: Math }

]