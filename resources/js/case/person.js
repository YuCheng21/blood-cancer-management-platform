$(document).ready(function () {
    // console.log('ready')

    /**
    Chart.js Tips
    https://www.chartjs.org/docs/latest/axes/cartesian/
    */
    // 折線圖資料設定
    const lineData = {
        // 資料集設定
        datasets: [
            {
                label: '白血球（WBC）',
                // 資料值
                data: [
                    {x: '2022-02-08T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12T00:00:00', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '血紅素（Hb）',
                data: [
                    {x: '2022-02-08T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11T00:00:00', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12T00:00:00', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '血小板（PLT）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '肝指數（GPT）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '肝指數（GOT）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '癌指數（CEA）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '癌指數（CA153）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
                label: '尿素氮（BUN）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
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
            {
                label: '肝指數（GPT）',
                data: [
                    {x: '2022-02-08', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-09', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-10', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-11', y: Math.floor(Math.random() * 100)},
                    {x: '2022-02-12', y: Math.floor(Math.random() * 100)},
                ],
                borderColor: `${theme.cyan}`,
                pointBackgroundColor: `${theme.cyan}20`,
                pointBorderColor: `${theme.cyan}`,
                pointHoverBackgroundColor: `${theme.cyan}80`,
                pointHoverBorderColor: `${theme.cyan}`,
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
        elements: {
            line: {
                borderWidth: 3
            }
        },
        // 額外項目
        plugins: {
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

    // 圖表總資訊
    const chartInfo = {
        type: 'line',
        data: lineData,
        options: lineOptions
    };

    // 建立圖表
    const bloodChart = new Chart(
        document.getElementById('bloodChart'),
        chartInfo
    );

})
