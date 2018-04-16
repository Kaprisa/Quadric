<template>
    <v-dialog width="50%" v-model="dialog">
        <v-btn slot="activator" color="lime" dark>{{ buttonText }}</v-btn>
        <v-card>
            <div>

                <v-btn-toggle multiple v-model="toggle_multiple">
                    <v-btn @click="command('bold')" flat>
                        <v-icon>format_bold</v-icon>
                    </v-btn>
                    <v-btn @click="command('italic')" flat>
                        <v-icon>format_italic</v-icon>
                    </v-btn>
                    <v-btn @click="command('underline')" flat>
                        <v-icon>format_underlined</v-icon>
                    </v-btn>
                    <v-btn @click="command('')" flat>
                        <v-icon>format_color_fill</v-icon>
                    </v-btn>
                </v-btn-toggle>

                <v-btn-toggle mandatory v-model="align">
                    <v-btn @click="command('justifyLeft')" flat>
                        <v-icon>format_align_left</v-icon>
                    </v-btn>
                    <v-btn @click="command('justifyCenter')" flat>
                        <v-icon>format_align_center</v-icon>
                    </v-btn>
                    <v-btn @click="command('justifyRight')" flat>
                        <v-icon>format_align_right</v-icon>
                    </v-btn>
                    <v-btn @click="command('justifyFull')" flat>
                        <v-icon>format_align_justify</v-icon>
                    </v-btn>
                </v-btn-toggle>

            </div>
            <iframe
                    name="frame"
                    ref="editor"
                    :style="`width: 100%; height: 50vh;`"
                    frameborder="0"
                    border="0"
                    cellspacing="0"
            ></iframe>
            <v-divider/>
            <v-card-actions>
                <v-spacer/>
                <v-btn color="lime" dark @click="change()">Ок</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        name: 'v-editor',
        data() {
            return {
                toggle_multiple: [0, 1, 2],
                align: 0,
                dialog: false
            }
        },
        props: {
            buttonText: String
        },
        mounted() {
            frame.document.designMode = 'On'
            console.log(document.getElementsByTagName('iframe')[0].contentWindow)
        },
        methods: {
            command(c) {
                frame.document.execCommand(c, false, null)
            },
            change()
            {
                this.$emit('change', this.$refs.editor.contentDocument.body.textContent)
                this.dialog = false
            }
        }
    }
</script>