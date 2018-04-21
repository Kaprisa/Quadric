<template>
    <v-container fluid>
        <v-layout row >
            <v-flex xs4 sm3 v-for="t in tabs" :key="t.name">
                <v-card height="80vh" class="droppable">
                    <v-toolbar dark :color="t.color">
                        <v-icon>{{ t.icon }}</v-icon>
                        <span>{{ t.name }}</span>
                    </v-toolbar>
                    <v-card v-for="i in t.tasks"  :key="i.name" class="ma-2 draggable">
                        <v-card-title><!--@mousedown="start"@mousemove="move"-->
                            <span class="subheading">{{ i.name }}</span>
                            <v-spacer></v-spacer>
                            <v-avatar
                                    size="36px"
                                    slot="activator"
                            >
                                <img
                                        src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
                                >
                            </v-avatar>
                        </v-card-title>
                        <v-card-text>
                            <div v-html="i.text">
                            </div>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                                <v-icon>favorite</v-icon>
                            </v-btn>
                            <v-btn icon>
                                <v-icon>bookmark</v-icon>
                            </v-btn>
                            <v-btn icon>
                                <v-icon>share</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import DragManager from '../DragManager'
    export default {
        data() {
            return {
                tabs: [
                    {
                        name: 'Открытые',
                        color: 'blue',
                        icon: 'mail',
                        draggable: {},
                        tasks: [
                            {
                                name: 'hello',
                                text: 'Это новая задачка!'
                            },
                            {
                                name: 'hello2',
                                text: 'Это вторая задачка!'
                            }
                        ]
                    },
                    {
                        name: 'В процессе',
                        color: 'green',
                        icon: 'palette'
                    },
                    {
                        name: 'Завершенные',
                        color: 'red',
                        icon: 'add'
                    }
                ]
            }
        },
        methods: {
            // start(e) {
            //     this.draggable.x = e.pageX
            //     this.draggable.y = e.pageY
            //     this.draggable.e = e.target
            // },
            // move() {
            //     if (!this.draggable.e) return
            // }
        },
        mounted() {
            DragManager.onDragCancel = function (dragObject) {
                dragObject.avatar.rollback();
            };

            DragManager.onDragEnd = function (dragObject, dropElem) {
                dragObject.elem.style.display = 'none';
                dropElem.classList.add('computer-smile');
                setTimeout(function () {
                    dropElem.classList.remove('computer-smile');
                }, 200);
            }
        }
    }
</script>