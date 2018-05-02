<template>
    <div class="code-lesson">
        <v-card class="code-lesson__learn tab">
            <v-toolbar card color="green lighten-3" dark dense>
                <v-toolbar-title>Learn</v-toolbar-title>
                <v-spacer></v-spacer>
            </v-toolbar>
            <div class="md pa-4">
                <p data-source-line="1"><strong>Дифференциальным уравнением</strong> называется уравнение, связывающее независимую переменную х, искомую функцию y = y (x) и ее производные <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>y</mi><mi mathvariant="normal">.</mi><mi mathvariant="normal">.</mi><mi mathvariant="normal">.</mi><msup><mi>y</mi><mrow><mo>(</mo><mi>n</mi><mo>)</mo></mrow></msup></mrow><annotation encoding="application/x-tex">y... y^{(n)}</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.8879999999999999em;"></span><span class="strut bottom" style="height:1.0824399999999998em;vertical-align:-0.19444em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord">.</span><span class="mord">.</span><span class="mord">.</span><span class="mord"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="msupsub"><span class="vlist-t"><span class="vlist-r"><span class="vlist" style="height:0.8879999999999999em;"><span style="top:-3.063em;margin-right:0.05em;"><span class="pstrut" style="height:2.7em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mopen mtight">(</span><span class="mord mathit mtight">n</span><span class="mclose mtight">)</span></span></span></span></span></span></span></span></span></span></span></span>, т.е. уравнения вида <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>F</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo separator="true">,</mo><mi>y</mi><mo separator="true">,</mo><mi>y</mi><mo separator="true">,</mo><mi mathvariant="normal">.</mi><mi mathvariant="normal">.</mi><mi mathvariant="normal">.</mi><mo separator="true">,</mo><msup><mi>y</mi><mrow><mo>(</mo><mi>n</mi><mo>)</mo></mrow></msup></mrow><annotation encoding="application/x-tex">F(x,y,y,y,...,y^{(n)}</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.8879999999999999em;"></span><span class="strut bottom" style="height:1.138em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.13889em;">F</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord">.</span><span class="mord">.</span><span class="mord">.</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="msupsub"><span class="vlist-t"><span class="vlist-r"><span class="vlist" style="height:0.8879999999999999em;"><span style="top:-3.063em;margin-right:0.05em;"><span class="pstrut" style="height:2.7em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mopen mtight">(</span><span class="mord mathit mtight">n</span><span class="mclose mtight">)</span></span></span></span></span></span></span></span></span></span></span></span>)</p>
                <p data-source-line="3">Дифференциальное уравнение называется <strong>обыкновенным</strong>, если искомая функция y имеет вид y = y(x) (т.е функция одной независимой переменной)</p>
                <p data-source-line="5"><strong>Порядком</strong> дифференциального уравнения называется порядок наивысшей производной, входящей в уравнение</p>
                <p data-source-line="7"><strong>Решением</strong> дифференциального уравнения n-го порядка на интервале (a, b) называется функция <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>y</mi><mo>=</mo><mi>γ</mi><mo>(</mo><mi>x</mi><mo>)</mo></mrow><annotation encoding="application/x-tex">y=\gamma(x)</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.05556em;">γ</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mclose">)</span></span></span></span>, определенная на (a, b) вместе со своими производными до n-го порядка включительно, и такая что ее подстановка в дифференциальное уравнение, превращает его в тождество по x на (a, b).</p>
                <p data-source-line="9">График решения дифференциального уравнения называется <strong>интегральной кривой</strong> этого уравнения.</p>
                <h3 id="формы-задания" data-source-line="11"><a class="anchor" href="#формы-задания"><span class="octicon octicon-link"></span></a>Формы задания</h3>
                <ul data-source-line="13">
                    <li>Общий вид: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>f</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo><mo>=</mo><mn>0</mn></mrow><annotation encoding="application/x-tex">f(x,y,y)=0</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.10764em;">f</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mclose">)</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord">0</span></span></span></span></li>
                    <li>Нормальный вид: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>y</mi><mo>=</mo><mi>f</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo></mrow><annotation encoding="application/x-tex">y=f(x,y)</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.10764em;">f</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mclose">)</span></span></span></span></li>
                    <li>Дифференциальная форма: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>M</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo><mi>d</mi><mi>x</mi><mo>+</mo><mi>N</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo><mi>d</mi><mi>y</mi><mo>=</mo><mn>0</mn></mrow><annotation encoding="application/x-tex">M(x,y)dx+N(x,y)dy=0</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.10903em;">M</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mclose">)</span><span class="mord mathit">d</span><span class="mord mathit">x</span><span class="mord rule" style="margin-right:0.2222222222222222em;"></span><span class="mbin">+</span><span class="mord rule" style="margin-right:0.2222222222222222em;"></span><span class="mord mathit" style="margin-right:0.10903em;">N</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mclose">)</span><span class="mord mathit">d</span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord">0</span></span></span></span></li>
                    <li>Симметрическая форма: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mfrac><mrow><mi>d</mi><mi>x</mi></mrow><mrow><mi>X</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo></mrow></mfrac><mo>=</mo><mfrac><mrow><mi>d</mi><mi>y</mi></mrow><mrow><mi>Y</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo></mrow></mfrac></mrow><annotation encoding="application/x-tex">\frac{dx}{X(x,y)}=\frac{dy}{Y(x,y)}</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.9322159999999999em;"></span><span class="strut bottom" style="height:1.452216em;vertical-align:-0.52em;"></span><span class="base"><span class="mord"><span class="mopen nulldelimiter"></span><span class="mfrac"><span class="vlist-t vlist-t2"><span class="vlist-r"><span class="vlist" style="height:0.8801079999999999em;"><span style="top:-2.655em;"><span class="pstrut" style="height:3em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mord mathit mtight" style="margin-right:0.07847em;">X</span><span class="mopen mtight">(</span><span class="mord mathit mtight">x</span><span class="mpunct mtight">,</span><span class="mord mathit mtight" style="margin-right:0.03588em;">y</span><span class="mclose mtight">)</span></span></span></span><span style="top:-3.15em;"><span class="pstrut" style="height:3em;"></span><span class="stretchy" style="height:0.2em;"><svg width="400em" height="0.2em" viewBox="0 0 400000 200" preserveAspectRatio="xMinYMin slice"><path d="M0 80H400000 v40H0z M0 80H400000 v40H0z"></path></svg></span></span><span style="top:-3.394em;"><span class="pstrut" style="height:3em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mord mathit mtight">d</span><span class="mord mathit mtight">x</span></span></span></span></span><span class="vlist-s">​</span></span><span class="vlist-r"><span class="vlist" style="height:0.52em;"></span></span></span></span><span class="mclose nulldelimiter"></span></span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord"><span class="mopen nulldelimiter"></span><span class="mfrac"><span class="vlist-t vlist-t2"><span class="vlist-r"><span class="vlist" style="height:0.9322159999999999em;"><span style="top:-2.655em;"><span class="pstrut" style="height:3em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mord mathit mtight" style="margin-right:0.22222em;">Y</span><span class="mopen mtight">(</span><span class="mord mathit mtight">x</span><span class="mpunct mtight">,</span><span class="mord mathit mtight" style="margin-right:0.03588em;">y</span><span class="mclose mtight">)</span></span></span></span><span style="top:-3.15em;"><span class="pstrut" style="height:3em;"></span><span class="stretchy" style="height:0.2em;"><svg width="400em" height="0.2em" viewBox="0 0 400000 200" preserveAspectRatio="xMinYMin slice"><path d="M0 80H400000 v40H0z M0 80H400000 v40H0z"></path></svg></span></span><span style="top:-3.446108em;"><span class="pstrut" style="height:3em;"></span><span class="sizing reset-size6 size3 mtight"><span class="mord mtight"><span class="mord mathit mtight">d</span><span class="mord mathit mtight" style="margin-right:0.03588em;">y</span></span></span></span></span><span class="vlist-s">​</span></span><span class="vlist-r"><span class="vlist" style="height:0.52em;"></span></span></span></span><span class="mclose nulldelimiter"></span></span></span></span></span></li>
                </ul>
                <h3 id="виды-записи-решения" data-source-line="18"><a class="anchor" href="#виды-записи-решения"><span class="octicon octicon-link"></span></a>Виды записи решения</h3>
                <ul data-source-line="20">
                    <li>Нормальная форма: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>y</mi><mo>=</mo><mi>γ</mi><mo>(</mo><mi>x</mi><mo>)</mo></mrow><annotation encoding="application/x-tex">y=\gamma(x)</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.05556em;">γ</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mclose">)</span></span></span></span></li>
                    <li>Неявная форма: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>F</mi><mo>(</mo><mi>x</mi><mo separator="true">,</mo><mi>y</mi><mo>)</mo><mo>=</mo><mn>0</mn></mrow><annotation encoding="application/x-tex">F(x,y)=0</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit" style="margin-right:0.13889em;">F</span><span class="mopen">(</span><span class="mord mathit">x</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mclose">)</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord">0</span></span></span></span></li>
                    <li>Параметрическая форма: <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mrow><mo fence="true">{</mo><mtable><mtr><mtd><mstyle scriptlevel="0" displaystyle="false"><mrow><mi>x</mi><mo>=</mo><mi>β</mi><mo>(</mo><mi>t</mi><mo>)</mo></mrow></mstyle></mtd></mtr><mtr><mtd><mstyle scriptlevel="0" displaystyle="false"><mrow><mi>y</mi><mo>=</mo><mi>α</mi><mo>(</mo><mi>t</mi><mo>)</mo></mrow></mstyle></mtd></mtr></mtable></mrow></mrow><annotation encoding="application/x-tex">\begin{cases}
 x=\beta(t)\\
 y=\alpha(t)
\end{cases}</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:1.75em;"></span><span class="strut bottom" style="height:3.0000299999999998em;vertical-align:-1.25003em;"></span><span class="base"><span class="minner"><span class="mopen delimcenter" style="top:0em;"><span class="delimsizing size4">{</span></span><span class="mord"><span class="mtable"><span class="col-align-l"><span class="vlist-t vlist-t2"><span class="vlist-r"><span class="vlist" style="height:1.69em;"><span style="top:-3.69em;"><span class="pstrut" style="height:3.008em;"></span><span class="mord"><span class="mord mathit">x</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.05278em;">β</span><span class="mopen">(</span><span class="mord mathit">t</span><span class="mclose">)</span></span></span><span style="top:-2.25em;"><span class="pstrut" style="height:3.008em;"></span><span class="mord"><span class="mord mathit" style="margin-right:0.03588em;">y</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.0037em;">α</span><span class="mopen">(</span><span class="mord mathit">t</span><span class="mclose">)</span></span></span></span><span class="vlist-s">​</span></span><span class="vlist-r"><span class="vlist" style="height:1.19em;"></span></span></span></span></span></span><span class="mclose nulldelimiter"></span></span></span></span></span>, <span class="katex"><span class="katex-mathml"><math><semantics><mrow><mi>x</mi><mo>∈</mo><mo>(</mo><mi>a</mi><mo separator="true">,</mo><mi>b</mi><mo>)</mo><mo separator="true">,</mo><mi>t</mi><mo>∈</mo><mo>(</mo><mi>ω</mi><mo separator="true">,</mo><mi>η</mi><mo>)</mo><mo separator="true">,</mo><mi>a</mi><mo>=</mo><mi>β</mi><mo>(</mo><mi>ω</mi><mo>)</mo><mo separator="true">,</mo><mi>b</mi><mo>=</mo><mi>α</mi><mo>(</mo><mi>η</mi><mo>)</mo></mrow><annotation encoding="application/x-tex">x\in(a,b), t\in(\omega,\eta), a=\beta(\omega), b=\alpha(\eta)</annotation></semantics></math></span><span class="katex-html" aria-hidden="true"><span class="strut" style="height:0.75em;"></span><span class="strut bottom" style="height:1em;vertical-align:-0.25em;"></span><span class="base"><span class="mord mathit">x</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">∈</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mopen">(</span><span class="mord mathit">a</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit">b</span><span class="mclose">)</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit">t</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">∈</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mopen">(</span><span class="mord mathit" style="margin-right:0.03588em;">ω</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit" style="margin-right:0.03588em;">η</span><span class="mclose">)</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit">a</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.05278em;">β</span><span class="mopen">(</span><span class="mord mathit" style="margin-right:0.03588em;">ω</span><span class="mclose">)</span><span class="mpunct">,</span><span class="mord rule" style="margin-right:0.16666666666666666em;"></span><span class="mord mathit">b</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mrel">=</span><span class="mord rule" style="margin-right:0.2777777777777778em;"></span><span class="mord mathit" style="margin-right:0.0037em;">α</span><span class="mopen">(</span><span class="mord mathit" style="margin-right:0.03588em;">η</span><span class="mclose">)</span></span></span></span></li>
                </ul>
            </div>
           </v-card>
        <v-card class="tab">
            <v-toolbar card color="blue lighten-3" dark dense>
                <v-toolbar-title>Code</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn v-for="f in files" :key="f.name" @click="file = f">{{ f.name }}</v-btn>
            </v-toolbar>
            <v-code-mirror :file="file" @change="reload"/>
        </v-card>
        <v-card class="code-lesson__browser tab">
            <v-toolbar card color="pink lighten-3" dark dense>
                <v-toolbar-title>Browser</v-toolbar-title>
                <v-spacer></v-spacer>
            </v-toolbar>
            <iframe ref="browser" style="height: 87vh" frameborder="0"></iframe>
        </v-card>
    </div>
</template>

<script>
    import VCodeMirror from '../common/CodeMirror'
    export default {
        components: {
           VCodeMirror
        },
        data() {
            return {
               tab: '0',
               files: [
                   {
                       mode: 'text/html',
                       name: 'html',
                       code: '<h1>hello</h1>'
                   },
                   {
                       mode: 'text/css',
                       name: 'css',
                       code:
                           `body { color: '#ff0000; }
                            h1 { font-size: 40px; }
                       `
                   },
                   {
                       mode: 'text/javascript',
                       name: 'js',
                       code: `console.log('hello')`
                   }
               ],
               file: {
                   code: '<h1>hello</h1>',
                   mode: 'text/html'
               }
            }
        },
        mounted() {
            this.document = this.$refs.browser.contentWindow.document
            this.document.body.innerHTML = this.file.code
        },
        methods: {
            command(c, b = null) {
                this.document.execCommand(c, false, b)
            },
            reload(c) {
                if (!this.document.styleSheets.length) {
                    var css = 'body { background: red; }',
                        head = this.document.head || this.document.getElementsByTagName('head')[0],
                        style = this.document.createElement('style');

                    style.type = 'text/css';
                    if (style.styleSheet){
                        style.styleSheet.cssText = css;
                    } else {
                        style.appendChild(this.document.createTextNode(css));
                    }

                    head.appendChild(style);
                }
                console.log(c.match(/(\w*)\s*{(.*)}/g))
                switch (this.file.name) {
                    case 'html':
                        this.document.body.innerHTML = c
                        break
                    case 'css':
                        this.document.styleSheets[0].cssText = c
                        this.addCSSRule(this.document.styleSheets[0], "body", "background: blue;");
                        break
                    case 'js':
                        this.document.body.append(c)
                        break
                    default:
                        console.log('hello')
                }

            },
            addCSSRule(sheet, selector, rules, index) {
                if("insertRule" in sheet) {
                    sheet.insertRule(selector + "{" + rules + "}", index);
                }
                else if("addRule" in sheet) {
                    sheet.addRule(selector, rules, index);
                }
            }
        }
    }
</script>

<style lang="sass">
    .code-lesson
        height: 90vh
        display: flex
        .tab
            flex: 1 1 0
            overflow-y: auto
        .CodeMirror.CodeMirror-wrap
            height: 90vh
</style>