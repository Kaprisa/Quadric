<template>
    <v-container fluid grid-list-md>
        <v-data-iterator
                content-tag="v-layout"
                row
                wrap
                :items="course.blocks"
                :rows-per-page-items="rowsPerPageItems"
                :pagination.sync="pagination"
        >
            <v-flex
                    slot="item"
                    slot-scope="props"
                    xs12
                    sm6
                    md4
                    lg3
            >
                <v-card>
                    <v-card-title><h4>{{ props.item.name }}</h4></v-card-title>
                    <v-divider></v-divider>
                    <v-list dense>
                        <v-list-tile
                                v-for="l in props.item.lessons"
                                :key="`l${l.name}`"
                                @click="$router.push(`/courses/${course.course.id}/lessons/${l.id}`)"
                        >
                            <v-list-tile-content>{{ l.name }}</v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-card>
            </v-flex>
        </v-data-iterator>
    </v-container>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        computed: {
            ...mapGetters({
                course: 'course',
                loadingCourse: 'loadingCourse'
            })
        },
        data() {
            return {
                rowsPerPageItems: [4, 8, 12],
                pagination: {
                    rowsPerPage: 4
                }
            }
        }
    }
</script>