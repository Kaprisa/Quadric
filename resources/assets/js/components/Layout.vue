<template>
    <v-app id="inspire">
        <v-navigation-drawer
                fixed
                v-model="drawer"
                right
                app
                v-if="!($route.meta.type === 'auth')"
        >
            <v-list dense>
                <v-list-tile @click="$router.push('/')">
                    <v-list-tile-action>
                        <v-icon>home</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Home</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-group
                        prepend-icon="graphic_eq"
                        no-action
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>Курсы</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/courses`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Мои курсы</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/courses`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Каталог</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/courses/add`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Новый курс</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>add</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
                <v-list-group
                        prepend-icon="graphic_eq"
                        no-action
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>Анализ</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/analysis/chart`)">
                        <v-list-tile-content>
                            <v-list-tile-title>График</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>bubble_chart</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
                <v-list-group
                        prepend-icon="gamepad"
                        no-action
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>База данных</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="$router.push(`/db/sql`)">
                        <v-list-tile-content>
                            <v-list-tile-title>Мастер запросов</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>code</v-icon>
                        </v-list-tile-action>
                    </v-list-tile>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar color="teal lighten-3" dark scroll-off-screen app>
            <v-spacer/>
            <v-toolbar-title>Academy</v-toolbar-title>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"/>
        </v-toolbar>
        <v-content>
            <v-container fluid full-height>
                <router-view/>
            </v-container>
        </v-content>
        <v-footer color="teal lighten-3" app>
            <v-spacer/>
            <span class="white--text">&copy; 2018</span>
        </v-footer>
    </v-app>
</template>

<script>

    export default {
        name: 'layout',
        data: () => ({
            drawer: true
        })
    }
</script>