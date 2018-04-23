const md = require('markdown-it')()
import mk from '@iktakahiro/markdown-it-katex'

md.use(mk)

export default md