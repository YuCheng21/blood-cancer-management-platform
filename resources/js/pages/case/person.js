function fancybox_show(url){
    /**
     * https://fancyapps.com/docs/ui/fancybox/api
     */
    Fancybox.show([
        {
            src: url,
            type: "image",
        },
    ]);
}

$(document).on('click', '.deleteMedicineRecordBtn', function (e) {
    const deleteUrl = $(this).data('url');
    $('#deleteMedicineRecordForm').attr('action', deleteUrl)
    $('#deleteMedicineRecordSend').attr('href', deleteUrl)
})

$(document).on('click', '.updateMedicineRecordBtn', function (e) {
    const updateUrl = $(this).data('update-url');
    $('#updateMedicineRecordForm').attr('action', updateUrl)
    $('#updateMedicineRecordSend').attr('href', updateUrl)


    const updateId = $(this).data('id');
    let selectedMedicine = [];
    cases['medicine_records'].forEach(function (item) {
        if (item['id'] === updateId){
            selectedMedicine.push(item)
        }
    })

    $('#updateMedicineRecordDate').val(selectedMedicine[0]['date']);
    $('#updateMedicineRecordCourse').val(selectedMedicine[0]['course']);
    $('#updateMedicineRecordType').val(selectedMedicine[0]['type']);
    $('#updateMedicineRecordDose').val(selectedMedicine[0]['dose']);
})

$(document).ready(function () {
    $('#updateCaseForm').attr('action', updateUrl)
    $('#updateCaseSend').attr('href', updateUrl)

    $('#updateCaseAccount').val(cases['account']);
    $('#updateCasePassword').val(cases['password']);
    $('#updateCaseTransplantNum').val(cases['transplant_num']);
    $('#updateCaseName').val(cases['name']);
    $('#updateCaseGender').val(cases['gender_id']).change();
    $('#updateCaseBirth').val(cases['birthday']);

    $('#updateCaseHometown').val(cases['hometown_id']).change();
    $('#updateCaseHometownOther').val(cases['hometown_other']);
    $('#updateCaseEducation').val(cases['education_id']).change();
    $('#updateCaseMarriage').val(cases['marriage_id']).change();
    $('#updateCaseReligion').val(cases['religion_id']).change();
    $('#updateCaseReligionOther').val(cases['religion_other']);
    $('#updateCaseProfession').val(cases['profession_id']).change();
    $('#updateCaseProfessionDetail').val(cases['profession_detail_id']).change();
    $('#updateCaseIncome').val(cases['income_id']).change();
    $('#updateCaseSource').val(cases['source_id']).change();

    $('#updateCaseDiagnosed').val(cases['diagnosed']);

    $('#updateCaseDate').val(cases['date']);
    $('#updateCaseTransplantType').val(cases['transplant_type_id']).change();
    $('#updateCaseDiseaseType').val(cases['disease_type_id']).change();
    $('#updateCaseDiseaseState').val(cases['disease_state_id']).change();
    $('#updateCaseDiseaseClass').val(cases['disease_class_id']).change();
})

const randColor = () =>  {
    return "#" + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0').toUpperCase();
}

$(document).ready(function () {
    /**
     * Chart.js
     * https://www.chartjs.org/docs/latest/axes/cartesian/
     *
     * Chartjs Plugin Zoom
     * https://www.chartjs.org/chartjs-plugin-zoom/latest/guide/options.html
     */

    let color_map = [
        theme.blue, theme.purple, theme.pink, theme.red, theme.orange, theme.yellow, theme.green, theme.teal,
        randColor(), randColor(), randColor(), randColor(), randColor(), randColor(),
    ]
    // 折線圖資料設定
    const lineData = {
        // 資料集設定
        datasets: []
    };
    // 寫入資料庫資料
    $.each(reformat_blood_components, function (key0, value0) {
        $.each(value0, function (key, value) {
            const exist = lineData['datasets'].find(element => {
                if (element.label === value['blood_component']['name']){
                    return true;
                }
            });
            if (exist === undefined){
                const color = color_map.shift()
                lineData['datasets'].push({
                    label: value['blood_component']['name'],
                    // 資料值
                    data: [{
                        'x': value['created_at'],
                        'y': value['value'],
                    }],
                    borderColor: `${color}`,
                    pointBackgroundColor: `${color}20`,
                    pointBorderColor: `${color}`,
                    pointHoverBackgroundColor: `${color}80`,
                    pointHoverBorderColor: `${color}`,
                    pointBorderWidth: 1.5,
                    pointRadius: 5,
                    pointHoverRadius: 10,
                    pointStyle: 'circle',
                    hidden: false
                })
            }else{
                lineData['datasets'].find(element => {
                    if (element.label === value['blood_component']['name']){
                        return true;
                    }
                })['data'].push({
                    'x': value['created_at'],
                    'y': value['value'],
                });
            }
        })
    })
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
                pan: {
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
