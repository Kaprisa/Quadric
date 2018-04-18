<template>
    <v-container>
        <v-breadcrumbs>
            <v-icon slot="divider">forward</v-icon>
            <v-breadcrumbs-item
                    v-for="item in path"
                    :key="item.text"
                    style="cursor: pointer;"
            >
                <span @click="back(item)">{{ item.text }}</span>
            </v-breadcrumbs-item>
        </v-breadcrumbs>
        <v-layout row wrap justify-start>
            <div
                    v-for="k, v in items"
                    :key="v"
                    v-if="v !== '..' && v !== '.'"
                    style="flex-basis: 170px;"
            >
                <div class="layout column align-center" v-if="parseInt(v) || v === '0'">
                    <v-icon size="50px" fab color="light-green">insert_drive_file</v-icon>
                    <span class="body-1">{{ k }}</span>
                </div>
                <div
                        class="layout column align-center"
                        v-else-if="typeof v === 'string'"
                        @click="path.push({ text: v, items: k}); items = k;"
                        style="cursor: pointer;"
                >
                    <v-icon size="50px" fab color="teal accent-3">folder</v-icon>
                    <span class="body-1">{{ v }}</span>
                </div>
            </div>
        </v-layout>
    </v-container>
</template>
<script>
    import { mapActions, mapGetters } from 'vuex'
    export default {
        data() {
            return {
                items: [],
                path: []
            }
        },
        mounted() {
           this.getDirectories()
        },
        watch: {
          loadingDirectories(v) {
              if (!v) {
                  this.items = this.directories
                  this.path = [{ text: '/', items: this.items }]
              }
          }
        },
        computed: {
            ...mapGetters({
                directories: 'directories',
                loadingDirectories: 'loadingDirectories'
            })
        },
        methods: {
            ...mapActions([
                'getDirectories'
            ]),
            back(item) {
                this.items = item.items
                const index = this.path.findIndex(p => p.text === item.text)
                this.path.splice(index + 1, this.path.length - index - 1)
            }
        }
    }
</script>