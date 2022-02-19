$(document).ready(function () {
    // console.log('ready')

    /**
     * Chart.js
     * https://www.chartjs.org/docs/latest/axes/cartesian/
     *
     * Chartjs Plugin Zoom
     * https://www.chartjs.org/chartjs-plugin-zoom/latest/guide/options.html
    */

    // 折線圖標籤名稱
    const chartLabel = {
        'wbc': '白血球（WBC）',
        'hb': '血紅素（Hb）',
        'plt': '血小板（PLT）',
        'gpt': '肝指數（GPT）',
        'got': '肝指數（GOT）',
        'cea': '癌指數（CEA）',
        'ca153': '癌指數（CA153）',
        'bun': '尿素氮（BUN）',
    }
    // 折線圖資料設定
    const lineData = {
        // 資料集設定
        datasets: [
            {
                label: chartLabel['wbc'],
                // 資料值
                data: [],
                borderColor: `${theme.blue}`,
                pointBackgroundColor: `${theme.blue}20`,
                pointBorderColor: `${theme.blue}`,
                pointHoverBackgroundColor: `${theme.blue}80`,
                pointHoverBorderColor: `${theme.blue}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['hb'],
                data: [],
                borderColor: `${theme.purple}`,
                pointBackgroundColor: `${theme.purple}20`,
                pointBorderColor: `${theme.purple}`,
                pointHoverBackgroundColor: `${theme.purple}80`,
                pointHoverBorderColor: `${theme.purple}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['plt'],
                data: [],
                borderColor: `${theme.pink}`,
                pointBackgroundColor: `${theme.pink}20`,
                pointBorderColor: `${theme.pink}`,
                pointHoverBackgroundColor: `${theme.pink}80`,
                pointHoverBorderColor: `${theme.pink}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['gpt'],
                data: [],
                borderColor: `${theme.red}`,
                pointBackgroundColor: `${theme.red}20`,
                pointBorderColor: `${theme.red}`,
                pointHoverBackgroundColor: `${theme.red}80`,
                pointHoverBorderColor: `${theme.red}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['got'],
                data: [],
                borderColor: `${theme.orange}`,
                pointBackgroundColor: `${theme.orange}20`,
                pointBorderColor: `${theme.orange}`,
                pointHoverBackgroundColor: `${theme.orange}80`,
                pointHoverBorderColor: `${theme.orange}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['cea'],
                data: [],
                borderColor: `${theme.yellow}`,
                pointBackgroundColor: `${theme.yellow}20`,
                pointBorderColor: `${theme.yellow}`,
                pointHoverBackgroundColor: `${theme.yellow}80`,
                pointHoverBorderColor: `${theme.yellow}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['ca153'],
                data: [],
                borderColor: `${theme.green}`,
                pointBackgroundColor: `${theme.green}20`,
                pointBorderColor: `${theme.green}`,
                pointHoverBackgroundColor: `${theme.green}80`,
                pointHoverBorderColor: `${theme.green}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
            {
                label: chartLabel['bun'],
                data: [],
                borderColor: `${theme.teal}`,
                pointBackgroundColor: `${theme.teal}20`,
                pointBorderColor: `${theme.teal}`,
                pointHoverBackgroundColor: `${theme.teal}80`,
                pointHoverBorderColor: `${theme.teal}`,
                pointBorderWidth: 1.5,
                pointRadius: 5,
                pointHoverRadius: 10,
                pointStyle: 'circle',
                hidden: false
            },
        ]
    };
    // 折線圖屬性設定
    const lineOptions = {
        responsive: true,
        maintainAspectRatio: false,
        elements: {
            line: {
                borderWidth: 3
            }
        },
        // 額外項目
        plugins: {
            zoom: {
                zoom: {
                    wheel: {
                        // Options of the mouse wheel behavior
                        enabled: true,
                    },
                    // drag: {
                    //     enabled: true,
                    //     backgroundColor: `${theme.primary}10`,
                    //     borderColor: `${theme.primary}`,
                    //     borderWidth: 1,
                    //     modifierKey: 'ctrl',
                    // },
                    pinch: {
                        // Options of the pinch behavior
                        enabled: true
                    },
                    mode: 'xy',
                    // overScaleMode: 'xy',
                },
                pan:{
                    enabled: true,
                    mode: 'xy',
                    // overScaleMode: 'xy',
                },
                // limits: {
                //     y: {
                //         min: 0,
                //         max: 100,
                //     },
                //     x: {
                //         min: 0,
                //         max: 100,
                //     }
                // }
            },
            // 圖例
            legend: {
                // 顯示標籤
                display: true,
                position: 'top',
                labels: {
                    color: `${theme.primary}`
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: `${theme.gray}90`,
                titleFont: {
                    size: 20
                },
                titleColor: `${theme.dark}`,
                bodyFont: {
                    size: 20
                },
                bodyColor: `${theme.dark}`,
                usePointStyle: true,
                displayColors: true
            },
        },
        scales: {
            x: {
                // min: 0,
                // max: 100,
                type: 'time',
                time: {
                    unit: 'day'
                },
                title: {
                    display: true,
                    text: '時間',
                    color: `${theme.primary}`,
                    font: {
                        size: 20,
                        weight: 700
                    },
                },
                grid: {
                    color: `${theme.primary}40`,
                    borderColor: `${theme.primary}80`,
                    tickColor: `${theme.primary}40`
                },
                ticks: {
                    color: `${theme.primary}`,
                    font: {
                        size: 15,
                        weight: 500
                    },
                    maxTicksLimit: 10,
                }
            },
            y: {
                // min: 0,
                // max: 100,
                title: {
                    display: true,
                    text: '數值',
                    color: `${theme.primary}`,
                    font: {
                        size: 20,
                        weight: 700
                    },
                },
                grid: {
                    color: `${theme.primary}40`,
                    borderColor: `${theme.primary}80`,
                    tickColor: `${theme.primary}40`
                },
                ticks: {
                    color: `${theme.primary}`,
                    font: {
                        size: 15,
                        weight: 500
                    },
                    maxTicksLimit: 10,
                }
            }
        }
    }
    // 寫入資料庫資料
    $.each(blood_components, function (key, value) {
        lineData['datasets']
            .find(option => option.label === chartLabel['wbc'])['data']
            .push({
            'x': value['created_at'],
            'y': value['wbc'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['hb'])['data']
            .push({
            'x': value['created_at'],
            'y': value['hb'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['plt'])['data']
            .push({
            'x': value['created_at'],
            'y': value['plt'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['gpt'])['data']
            .push({
            'x': value['created_at'],
            'y': value['gpt'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['got'])['data']
            .push({
            'x': value['created_at'],
            'y': value['got'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['cea'])['data']
            .push({
            'x': value['created_at'],
            'y': value['cea'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['ca153'])['data']
            .push({
            'x': value['created_at'],
            'y': value['ca153'],
        });
        lineData['datasets']
            .find(option => option.label === chartLabel['bun'])['data']
            .push({
            'x': value['created_at'],
            'y': value['bun'],
        });
    })

    // 圖表總資訊
    const chartInfo = {
        type: 'line',
        data: lineData,
        options: lineOptions
    };
    // 全域設定
    Chart.overrides.line.spanGaps = true;
    Chart.register(zoomPlugin);
    // 建立圖表
    const bloodChart = new Chart(
        document.getElementById('bloodChart'),
        chartInfo
    );

})
