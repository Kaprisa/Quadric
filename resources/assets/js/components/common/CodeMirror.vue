<template>
    <codemirror v-model="code" :options="opt" @input="$emit('change', code)"></codemirror>
</template>

<script>
    import { codemirror } from 'vue-codemirror-lite'
    import 'codemirror/mode/javascript/javascript.js'
    import'codemirror/addon/selection/active-line.js'
    import 'codemirror/theme/solarized.css'

    export default {
        name: 'v-code-mirror',
        components: {
            codemirror
        },
        data () {
            return {
                code: this.text,
                opt: {
                    mode: 'application/json',
                    styleActiveLine: true,
                    tabSize: 2,
                    lineNumbers: true,
                    lineWrapping: true,
                    theme: 'solarized light',
                    matchBrackets: true,
                }
            }
        },
        props: {
            text: String
        },
        watch: {
            text(v1, v2) {
                this.code = v1
            }
        }
    }

</script>