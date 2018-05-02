<template>
    <codemirror v-model="code" :options="opt" @input="$emit('change', code)"></codemirror>
</template>

<script>
    import { codemirror } from 'vue-codemirror-lite'
    import'codemirror/addon/selection/active-line.js'
    import 'codemirror/theme/material.css'

    import 'codemirror/mode/javascript/javascript.js'
    import 'codemirror/mode/sass/sass.js'
    import 'codemirror/mode/css/css.js'
    import 'codemirror/mode/sql/sql.js'
    import 'codemirror/mode/php/php.js'
    import 'codemirror/mode/shell/shell.js'
    import 'codemirror/mode/vue/vue.js'
    import 'codemirror/mode/htmlmixed/htmlmixed.js'

    export default {
        name: 'v-code-mirror',
        components: {
            codemirror
        },
        data () {
            return {
                code: this.file.code,
                document: null,
                opt: {
                    mode: this.file.mode,
                    styleActiveLine: true,
                    tabSize: 2,
                    lineWrapping: true,
                    lineNumbers: true,
                    theme: 'material',
                    matchBrackets: true,
                    viewportMargin: Infinity
                }
            }
        },
        props: {
            file: Object
        },
        watch: {
            text(v1, v2) {
                this.code = v1
            },
            file(f) {
                this.code = f.code
                this.opt = { ...this.opt, mode: this.file.mode }
            }
        }
    }

</script>

<style lang="sass">
    .CodeMirror.CodeMirror-wrap
        height: 80vh
        overflow-y: auto
</style>