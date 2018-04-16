<template>
    <v-container full-height fluid v-on:mousemove="change">
        <v-menu
                offset-x
                :close-on-content-click="false"
                :nudge-width="200"
                v-model="menu"
        >
            <v-btn
                    slot="activator"
                    fab
                    dark
                    color="light-green "
                    absolute
                    top
                    left
                    style="margin-top: -50px;"
            >
                <v-icon dark>add</v-icon>
            </v-btn>
            <v-card>
                <v-layout row>
                    <v-flex xs3>
                        <v-menu
                                transition="slide-x-transition"
                                bottom
                                right
                        >
                            <v-btn color="primary" dark slot="activator" class="deep-orange">
                                Индикатор
                            </v-btn>
                            <v-list>
                                <v-list-tile v-for="item in indicators" :key="item.name" @click="arr = item.fields; indicator = item.type">
                                    <v-list-tile-title>{{ item.name }}</v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                    </v-flex>
                    <v-flex xs3>
                        <v-menu
                                transition="slide-x-transition"
                                bottom
                                right
                        >
                            <v-btn color="teal" dark slot="activator">
                                Период
                            </v-btn>
                            <v-list>
                                <v-list-tile
                                        v-for="item in periods"
                                        :key="item.name"
                                        @click="changePeriod(item.value)"
                                        :style="`color: ${ period == item.value ? 'blue' : '#333'}`"
                                >
                                    <v-list-tile-title>{{ item.name }}</v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                    </v-flex>
                    <v-flex xs8>
                        <v-select
                                v-model="current_dsp"
                                @input="() => { getSub(current_dsp); added_indicators = []; }"
                                label="Рассылка"
                                autocomplete
                                :items="subs"
                                item-text="name"
                                item-value="id"
                        />
                    </v-flex>
                </v-layout>
                <v-divider />
                <v-container grid-list-md text-xs-center>
                    <v-layout align-center row v-for="(i, index) in arr" :key="`f${index}`">
                        <v-flex xs1 v-if="i.visible !== undefined">
                            <v-tooltip top>
                                <v-switch
                                        slot="activator"
                                        v-model="i.visible"
                                        hide-details
                                        :value="true"
                                />
                                <span>Видимость</span>
                            </v-tooltip>
                        </v-flex>
                        <v-flex xs1 v-if="i.new_plot !== undefined">
                            <v-tooltip top>
                                <v-switch
                                        slot="activator"
                                        v-model="i.new_plot"
                                        hide-details
                                        :value="true"
                                />
                                <span>Новый график</span>
                            </v-tooltip>
                        </v-flex>
                        <v-flex xs2>
                            <v-text-field
                                    color="purple darken-2"
                                    label="Период"
                                    v-model="i.period"
                                    mask="###"
                            />
                        </v-flex>
                        <v-flex xs5 v-if="i.type === 'roc'" style="align-self: flex-start;">
                            <v-select
                                    v-model="i.opt"
                                    hide-details
                                    label="Тип"
                                    :items="[{ text: 'Линии', value: 'column' }, { text: 'Линия', value: 'row' }]"
                            />
                        </v-flex>
                        <v-flex xs5 v-if="i.type !== 'roc'">
                            <v-text-field
                                    color="purple darken-2"
                                    label="Имя"
                                    v-model="i.name"
                            />
                        </v-flex>
                        <v-flex xs3>
                            <color-picker :vcolor="i.color" @change="(c) => { i.color = c }" />
                        </v-flex>
                        <v-flex xs1>
                            <v-tooltip right>
                                <v-icon dark :style="`color: ${i.color};`" slot="activator">help</v-icon>
                                <span>{{ i.hint }}</span>
                            </v-tooltip>
                        </v-flex>
                    </v-layout>
                </v-container>
                <v-card-actions>
                    <v-spacer />
                    <v-btn flat @click="menu = false">Отмена</v-btn>
                    <v-btn color="primary" flat @click="hello">Добавить</v-btn>
                </v-card-actions>
            </v-card>
        </v-menu>
        <v-menu
                offset-x
                :close-on-content-click="false"
                :nudge-width="200"
                v-model="menu_delete"
        >
            <v-btn
                    slot="activator"
                    fab
                    dark
                    color="red"
                    absolute
                    top
                    left
                    style="margin-left: 70px; margin-top: -50px;"
                    v-show="added_indicators.length > 0"
            >
                <v-icon dark>delete</v-icon>
            </v-btn>
            <div class="text-xs-center">
                <v-chip
                        v-for="i, index in added_indicators"
                        close
                        @input="() => { added_indicators.splice(index, 1); data.forEach(i => { delete i[i.name] }) }"
                        :key="`ind_${index}`"
                >
                    <v-avatar class="teal">{{ i.name.substr(0, 1) }}</v-avatar>
                    {{ i.name }}
                </v-chip>
            </div>
        </v-menu>
        <v-tooltip top>
            <v-btn
                    slot="activator"
                    fab
                    dark
                    :color="rangeAddons ? 'orange' : 'grey'"
                    absolute
                    top
                    left
                    style="margin-left: 140px; margin-top: -40px;"
                    @click="() => { rangeAddons = !rangeAddons; processData(); }"
            >
                <v-icon dark>date_range</v-icon>
            </v-btn>
            <span>{{ rangeAddons ? 'Выключить' : 'Включить' }} дополнительный диапазон дат</span>
        </v-tooltip>
        <v-tooltip top>
            <v-btn
                    slot="activator"
                    fab
                    dark
                    color="blue"
                    absolute
                    top
                    left
                    style="margin-left: 210px; margin-top: -40px;"
                    @click="() => { processData(); }"
            >
                <v-icon dark>refresh</v-icon>
            </v-btn>
            <span>Обновить график</span>
        </v-tooltip>
        <plot
                type="candlestick"
                :period="period"
                :data="data"
                :params="params"
                :height="90"
                :mouse="mouse"
        />
        <plot
                type="indicators"
                :period="period"
                :data="data"
                :indicators="added_indicators"
                :params="params"
                :height="50"
                :mouse="mouse"
                v-show="added_indicators && added_indicators.length > 0"
        />
    </v-container>
</template>
<script>
   /* import {mapActions, mapGetters} from 'vuex'*/
    import Plot from './Plot'
    import ColorPicker from '../common/ColorPicker'
    //import Computer from '../../computer/Computer'
    export default {
        components: {
            Plot,
            ColorPicker
        },
        data() {
            return {
                dialog: false,
                fav: true,
                menu: false,
                menu_delete: false,
                rangeAddons: true,
                current_dsp: 1,
                mouse: {
                    x: 0,
                    y: 0
                },
                arr: [{
                    type: 'mva',
                    hint: 'Параметры для скользящего среднего',
                    color: '#0B610B',
                    new_plot: true
                }],
                indicator: 'delta_mva',
                added_indicators: [],
                indicators: [
                    /*{
                        name: 'Скользящее среднее',
                        type: 'mva',
                        fields: [{
                            type: 'mva',
                            hint: 'Параметры для скользящего среднего',
                            color: '#0B610B'
                        }]
                    },*/
                    {
                        name: 'Среднескользящая прироста',
                        type: 'delta_mva',
                        fields: [{
                            type: 'mva',
                            hint: 'Параметры для скользящего среднего',
                            color: '#0B610B',
                            new_plot: true
                        }]
                    },
                    {
                        name: 'Среднеквадратическое отклонение',
                        type: 'dsp',
                        fields: [
                            {
                                type: 'mva',
                                hint: '5x',
                                color: '#0B610B',
                                visible: true,
                                name: '5x',
                                period: 5
                            },
                            {
                                type: 'mva',
                                hint: '21x',
                                color: '#0404B4',
                                visible: false,
                                name: '21x',
                                period: 21
                            },
                            {
                                type: 'mva',
                                hint: '89x',
                                color: '#987654',
                                visible: true,
                                name: '89x',
                                period: 89
                            },
                            {
                                type: 'dsp',
                                hint: 'Параметры для среднеквадратического отклонения',
                                color: '#FF0000',
                                visible: true,
                                name: 's21'
                            },
                            {
                                type: 'dsp',
                                hint: 'Параметры для среднеквадратического отклонения',
                                color: '#00FF00',
                                visible: true,
                                name: 's89'
                            }
                        ]
                    }
                ],
                period: 1,
                periods: [
                    {
                        name: 'День',
                        value: '1'
                    },
                    {
                        name: 'Неделя',
                        value: '7'
                    },
                    {
                        name: 'Месяц',
                        value: '30'
                    }
                ],
                data: [],
                type: 'candlestick',
                params: {
                    max: 1,
                    min: 0
                }
            }
        },
        mounted() {

        },
        computed: {

        },

        methods: {

            processData() {
                if (Object.keys(this.sub).length === 0) return
                this.params = {
                    max: 0,
                    min: 0
                }
                let data = []
                let a = 100
                let close = a, high = a, low = a
                let prev = 0, curr = 0
                let num = 0
                Object.keys(this.sub).forEach(key => {
                    if ((typeof key) === 'string' && key.length > 4) {
                        if (this.rangeAddons) {
                            curr = new Date(key)
                            if (prev && curr.getTime() - prev.getTime() > 3600 * 24 * 1000) {
                                close = Math.ceil(close*100)/100
                                while (curr.getTime() - prev.getTime() > 3600 * 24 * 1000) {
                                    num ++
                                    prev.setDate(prev.getDate() + 1)
                                    if (num === this.period) {
                                        data.push({
                                            date: prev.toISOString().substr(0, 10),
                                            open: close + 1,
                                            high: close,
                                            low: close + 1,
                                            close: close
                                        })
                                        num = 0
                                    }
                                }
                            }
                        }
                        num ++
                        this.sub[key].forEach(i => {
                            close += parseFloat(i.profit)
                            if (high < close) high = close
                            if (low > close) low = close
                        })
                        if (num >= this.period) {
                            num = 0
                            data.push({
                                date: key,
                                open: Math.ceil(a*100)/100,
                                high: Math.ceil(high*100)/100,
                                low: Math.ceil(low*100)/100,
                                close: Math.ceil(close*100)/100
                            })
                            a = close
                            high = close
                            low = close
                        }
                        prev = curr
                        if (close > this.params.max) this.params.max = close
                    }
                })
                this.data = data
            },

            changePeriod(value) {
                this.period = parseInt(value)
                this.processData()
            },
            change(e) {
                this.mouse = {
                    x: e.clientX,
                    y: e.clientY
                }
            }
        }
    }
</script>