<template>
    <v-card :style="`margin-bottom: 2vh; width: 100%; height: ${height}vh; cursor: pointer;`">
        <div
                class="tooltip__content menuable__content__active"
                :style="`position: absolute; top: ${100 - currentY + 2}%; left: ${currentX + 2}%;`"
                v-if="currentX !== 0 && currentY !== 0 && current"
        >
            <div>
                    <span v-for="(v, k) in current" :key="k">
                        {{ k | capitalize }}: {{ v }}
                        <br>
                    </span>
            </div>
        </div>
        <div
                v-if="currentX !== 0 && current"
                class="tooltip__content menuable__content__active"
                :style="`position: absolute; bottom: 0; left: ${currentX}%; transform: translateX(-50%);`"
        >
            {{ formDate(current.date, period) }}
        </div>
        <div
                v-if="currentY !== 0"
                class="tooltip__content menuable__content__active"
                :style="`position: absolute; bottom: ${currentY}%; transform: translateY(50%); left: 0;`"
        >
            {{ displayY }}
        </div>
        <span :style="`font-size: 15px; color: #000000; font-weight: bold; position: absolute; top: ${toPercents(zero) - 3}%; left: 2px;`">0</span>
        <svg
                width="100%"
                height="100%"
                ref="plot"
                viewBox="0 0 100 100"
                preserveAspectRatio="none"
        >
            <line
                    x1="0"
                    :y1="toPercents(zero)"
                    x2="100"
                    :y2="toPercents(zero)"
                    stroke-width="0.1"
                    stroke="#000000"
            ></line>
            <indicators :zero="(zero * 100) / (params.max - params.min)" :coordinates="coordinates" :indicators="indicators"/>
            <g v-if="type === 'candlestick'">
                <candle
                        v-for="i in coordinates"
                        :key="`candle_${i.x}`"
                        :open="i.open"
                        :high="i.high"
                        :low="i.low"
                        :close="i.close"
                        :width="candleWidth"
                        :x="i.x"
                />
            </g>
            <line
                    v-for="i in [0, 1, 2, 3, 4, 5]"
                    :x1="i * (100 / 6)"
                    y1="0"
                    :x2="i * (100 / 6)"
                    y2="100"
                    stroke-width="0.02"
                    :stroke="axesColor"
            ></line>
            <line
                    v-for="i in [0, 1, 2, 3, 4, 5]"
                    x1="0"
                    :y1="100 - i * (100 / 6)"
                    x2="100"
                    :y2="100 - i * (100 / 6)"
                    stroke-width="0.05"
                    :stroke="axesColor"
            ></line>
            <line
                    x1="0"
                    :y1="100 - currentY"
                    x2="100"
                    :y2="100 - currentY"
                    stroke-width="0.1"
                    :stroke="axesColor"
            ></line>
            <line
                    :x1="currentX"
                    y1="0"
                    :x2="currentX"
                    y2="100"
                    stroke-width="0.05"
                    :stroke="axesColor"
            ></line>
        </svg>
    </v-card>
</template>

<script>

    import Candle from './Candle'

    import Indicators from "./Indicators";

    export default {
        name: 'plot',
        components: {
            Indicators,
            Candle
        },
        data() {
            return {
                zero: 0,
                currentX: 0,
                currentY: 0,
                rangeAddons: true,
                current_dsp: 1,
                candleWidth: 0,
                coordinates: [],
                axesColor: '#9494b8',
                minX: 0,
                maxX: 0,
                range: 0,
                current: null,
                show: true,
                displayY: 0
            }
        },
        props: {
            type: String,
            period: {
                Number,
                default: 1
            },
            data: Array,
            indicators: {
                type: Array,
                default: null
            },
            params: {
                type: Object,
                default: null
            },
            height: {
                type: Number,
                default: 90
            },
            mouse: {
                type: Object,
                default: null
            }
        },
        computed: {},
        watch: {
            mouse(val) {
                const rect = this.$refs.plot.getBoundingClientRect()
                const a = val.y - rect.top
                const b = val.x - rect.left
                if (a > 0 && a < rect.height) {
                    this.currentY = 100 - Math.floor((a * 100) / rect.height)
                    this.currentX = Math.floor((b * 100) / rect.width)
                    const i = (this.coordinates.length * this.currentX) / 100
                    this.current = this.data[Math.ceil(i)]
                    this.displayY = (Math.ceil(this.currentY * (this.params.max - this.params.min)) / 100) - this.zero
                } else {
                    this.currentX = 0
                    this.currentY = 0
                }
            },
            data(val) {
                this.coordinates = []
                this.minX = new Date(this.data[0].date).getTime()
                this.maxX = new Date(this.data[this.data.length - 1].date).getTime()
                this.range = (this.maxX - this.minX) / 100
                this.changeCoordinates()
            },
            indicators() {
                this.zero = this.params.min < 0 ? - this.params.min : 0
                this.changeCoordinates()
            }
        },
        methods: {
            toPercents(val) {
                return 100 - (val * 100) / (this.params.max - this.params.min)
            },
            linear() {
                this.path = 'M 0 90 '
                // this.data.forEach(e => {
                //     this.path += `L ${Math.floor(((new Date(e.date).getTime()) - this.minX) / this.range)} ${Math.floor(100 - (e.close * 100) / (this.params.max - this.params.min))} `
                // })
            },
            changeCoordinates() {
                this.candleWidth = 100 / this.data.length
                // this.data.forEach(e => {
                //     let t = {
                //         x: ((new Date(e.date).getTime()) - this.minX) / this.range,
                //     }
                //     Object.keys(e).forEach(key => {
                //         if (key !== 'date') t[key] = this.toPercents(e[key])
                //     })
                //     this.coordinates.push(t)
                // })
            }
        }
    }
</script>