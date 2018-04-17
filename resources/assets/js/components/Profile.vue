<template>
    <v-container>
        <v-card>
            <v-card-title
                    class="grey lighten-4 py-4 title"
            >
                Мой аккаунт
            </v-card-title>
            <v-container grid-list-sm class="pa-4">
                <v-layout row wrap>
                    <v-flex xs12 align-center justify-space-between>
                        <v-layout align-center>
                            <v-avatar size="40px" class="mr-3">
                                <img
                                        src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"
                                        alt=""
                                >
                            </v-avatar>
                            <v-text-field
                                    placeholder="Имя"
                                    v-model="user.name"
                            ></v-text-field>
                        </v-layout>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field
                                prepend-icon="mail"
                                placeholder="Email"
                                v-model="user.email"
                        ></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field
                                type="tel"
                                prepend-icon="phone"
                                placeholder="(000) 000 - 0000"
                                mask="phone"
                                v-model="user.phone"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn flat @click="dialog = false">Сохранить</v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
    export default {
        name: 'Profile',
        data() {
            return {
                user: {}
            }
        },
        mounted() {
            this.user = this.$auth.user
        }
    }
</script>