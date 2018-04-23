<template>
    <v-layout style="height: 100%;">
        <v-flex xs6>
            <codemirror v-model="code" :options="opt"></codemirror>
        </v-flex>
        <v-flex xs6>
            <div v-html="result"></div>
        </v-flex>
    </v-layout>

</template>
<script>
    const md = require('markdown-it')()
    import mk from 'markdown-it-katex'
    md.use(mk)

    import { codemirror } from 'vue-codemirror-lite'
    import 'codemirror/mode/markdown/markdown.js'
    import'codemirror/addon/selection/active-line.js'
    import 'codemirror/theme/mdn-like.css'

    export default {
        components: {
            codemirror
        },
        watch: {
          code(v) {
              this.result = md.render(v)
          }
        },
        data() {
            return {
                result: '',
                code: '',
                opt: {
                    mode: 'text/x-markdown',
                    styleActiveLine: true,
                    tabSize: 2,
                    lineWrapping: true,
                    theme: 'mdn-like',
                    matchBrackets: true,
                }
            }
        },
        mounted() {
            this.result = md.render(this.code);
        }
    }
</script>