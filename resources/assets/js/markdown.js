const md = require('markdown-it')({
    html: true,
    linkify: true,
    typographer: true,
}).set({ breaks: true })
import mk from '@iktakahiro/markdown-it-katex'
const { markdownItTable } = require('markdown-it-table')
//import vis from 'markvis'
//import mp from 'markdown-it-plantuml'
import mct from 'markdown-it-center-text'
import mc from 'markdown-it-container'

md.use(mk)
md.use(mct)
md.use(markdownItTable)
md.use(mc, 'spoiler', {

    validate: function(params) {
        return params.trim().match(/^spoiler\s+(.*)$/);
    },

    render: function (tokens, idx) {
        var m = tokens[idx].info.trim().match(/^spoiler\s+(.*)$/);

        if (tokens[idx].nesting === 1) {
            // opening tag
            return '<details><summary>' + md.utils.escapeHtml(m[1]) + '</summary>\n';

        } else {
            // closing tag
            return '</details>\n';
        }
    }
})
//md.use(mp)
//md.use(vis)

export default md