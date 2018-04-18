<template>
    <div style="position: relative;">
        <v-dialog v-model="dialog" max-width="500px">
            <v-btn color="pink" small absolute right top dark fab class="mt-4" slot="activator"><v-icon>add</v-icon></v-btn>
            <v-card>
                <v-card-title>
                    <span class="headline">{{ editedIndex === -1 ? 'Создать' : 'Редактировать'}} настройки</span>
                </v-card-title>
                <v-card-text>
                    <v-text-field label="Тип поля" v-model="editedItem.field_type"></v-text-field>
                    <v-text-field label="Название" v-model="editedItem.name"></v-text-field>
                    <photo-uploader
                            label="Фото"
                            :fileName="editedItem.value"
                            @uploadFile="(file) => editedItem.value = file.name"
                            v-if="editedItem.field_type === 'image'"
                    />
                    <v-text-field
                            v-else
                            label="Значение"
                            v-model="editedItem.value"
                            :textarea="editedItem.field_type === 'textarea'"
                    ></v-text-field>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click.native="close">Отмена</v-btn>
                    <v-btn color="blue darken-1" flat @click.native="save">Сохранить</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-data-table
                :headers="headers"
                :items="settings"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.name }}</td>
                <td>{{ props.item.value }}</td>
                <td class="justify-center layout px-0">
                    <v-btn icon class="mx-0" @click="editItem(props.item)">
                        <v-icon color="teal">edit</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" @click="deleteItem(props.item)">
                        <v-icon color="pink">delete</v-icon>
                    </v-btn>
                </td>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import PhotoUploader from '../components/common/PhotoUploader'
    export default {
        components: {PhotoUploader},
        data: () => ({
            dialog: false,
            headers: [
                {
                    text: 'Название',
                    align: 'left',
                    sortable: false,
                    value: 'name'
                },
                { text: 'Значение', align: 'left', value: 'calories', sortable: false },
                { text: 'Actions', value: 'name', sortable: false }
            ],
            items: [],
            editedIndex: -1,
            editedItem: {
                name: '',
                value: 0,
                field_type: 'input'
            },
            defaultItem: {
                name: '',
                value: 0,
                field_type: 'input'
            }
        }),

        watch: {
            dialog (val) {
                val || this.close()
            }
        },
        mounted() {
           this.getSettings()
        },
        computed: {
            ...mapGetters({
                settings: 'settings'
            })
        },
        methods: {

            ...mapActions([
                'getSettings'
            ]),

            editItem (item) {
                this.editedIndex = this.items.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.items.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.items.splice(index, 1)
            },

            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save () {
                let item;
                if (this.editedIndex > -1) {
                    item = this.items[this.editedIndex]
                    Object.assign(item, this.editedItem)
                } else {
                    item = this.editedItem
                    this.items.push(item)
                }
                axios.post('/settings/save', item).then(res => {

                }).catch()
                this.close()
            }
        }
    }
</script>