var screen_resolution = window.screen.availWidth;
var allData = getData();
var lineColor = '#000000'
var font = 'Helvetica'

function drawLineChart(div, tab) {
    var chartTitle = allData['meta']['chart_title'][tab];
    var yAxis = allData['meta']['y_axis'][tab];
    var background = allData['meta']['bg_color'][tab];
    var rounding = allData['meta']['rounding'][tab];
    var legend = false;

    // Get Suffixes and Prefixes
    var prefix = allData['meta']['prefix'][tab];
    var suffix = allData['meta']['suffix'][tab];
    if (prefix == '_') {
        prefix = '';
    }
    if (suffix == '_') {
        suffix = '';
    }

    // Get values for charts
    var data = [];
    var lineColors = [];
    var i = 1;

    for (keyOne in allData[tab]) {
        var entry = {};
        var values = [];
        var colName = 'line_color_';
        var seriesName = keyOne;
        var indices = allData[tab][keyOne];
        var xAxis = [];
        colName = colName.concat(i);

        // Ensure keys are sorted correctly
        var keys = [];
        var k, j, len;

        for (k in indices) {
            if (indices.hasOwnProperty(k)) {
                keys.push(k);
            }
        }

        keys.sort();
        len = keys.length;

        // Cycle through keys in order
        for (j = 0; j < len; j++) {
            k = keys[j];
            value = Number(Number(indices[k]).toFixed(rounding));
            values.push(value);
            xAxis.push(k);
        }

        // Get meta data
        entry['name'] = seriesName;
        entry['data'] = values;
        entry['color'] = allData['meta'][colName][tab];
        data.push(entry);

        // Check if Legend is needed (i.e. there is more than 1 series)
        if (i > 1) {
            legend = true;
        }
        i = i + 1;
    }

    $('#' + div).highcharts({
        title: {
            text: chartTitle, // Chart text from meta data
            x: 0 //center
        },
        chart: {
            backgroundColor: background, // Background color
            style: {
                fontFamily: font
            }
        },
        xAxis: {
            lineColor: lineColor,
            tickColor: lineColor,
            categories: xAxis, // list of index values
            labels: {
                style: {
                    color: lineColor
                }
            }
        },
        yAxis: {
            title: {
                text: yAxis,
                style: {
                    color: lineColor
                }
            },
            labels: {
                style: {
                    color: lineColor
                }
            },
            gridLineColor: lineColor,
            gridLineDashStyle: 'ShortDot',
            plotLines: [{
                value: 0,
                width: 1,
            }]
        },
        tooltip: {
            valuePrefix: prefix,
            valueSuffix: suffix
        },
        legend: {
            enabled: legend
        },
        series: data
    });
}

function drawBarChart(div, tab, stacked) {
    var chartTitle = allData['meta']['chart_title'][tab];
    var yAxis = allData['meta']['y_axis'][tab];
    var background = allData['meta']['bg_color'][tab];
    var rounding = allData['meta']['rounding'][tab];
    var legend = false;

    // Get Suffixes and Prefixes
    var prefix = allData['meta']['prefix'][tab];
    var suffix = allData['meta']['suffix'][tab];
    if (prefix == '_') {
        prefix = '';
    }
    if (suffix == '_') {
        suffix = '';
    }

    // Determine if columns are stacked
    var chartType = null;
    if (stacked) {
        chartType = 'normal';
    }

    // Get values for charts
    var data = [];
    var lineColors = [];
    var i = 1;

    for (keyOne in allData[tab]) {
        var entry = {};
        var values = [];
        var colName = 'line_color_';
        var seriesName = keyOne;
        var indices = allData[tab][keyOne];
        var xAxis = [];
        colName = colName.concat(i);

        // Ensure keys are sorted correctly
        var keys = [];
        var k, j, len;

        for (k in indices) {
            if (indices.hasOwnProperty(k)) {
                keys.push(k);
            }
        }

        keys.sort();
        len = keys.length;

        // Cycle through keys in order
        for (j = 0; j < len; j++) {
            k = keys[j];
            value = Number(Number(indices[k]).toFixed(rounding));
            values.push(value);
            xAxis.push(k);
        }

        entry['name'] = seriesName;
        entry['data'] = values;
        entry['color'] = allData['meta'][colName][tab];
        data.push(entry);

        // Check if Legend is needed (i.e. there is more than 1 series)
        if (i > 1) {
            legend = true;
        }
        i = i + 1;
    }

    $('#' + div).highcharts({
        title: {
            text: chartTitle, // Chart text from meta data
            x: 0 //center
        },
        chart: {
            type: 'column',
            backgroundColor: background, // Background color
            style: {
                fontFamily: font
            }
        },
        plotOptions: {
            series: {
                stacking: chartType
            }
        },
        xAxis: {
            lineColor: lineColor,
            tickColor: lineColor,
            categories: xAxis, // list of index values
            labels: {
                style: {
                    color: lineColor
                }
            }
        },
        yAxis: {
            title: {
                text: yAxis,
                style: {
                    color: lineColor
                }
            },
            labels: {
                style: {
                    color: lineColor
                }
            },
            gridLineColor: lineColor,
            gridLineDashStyle: 'ShortDot',
            plotLines: [{
                value: 0,
                width: 1,
            }]
        },
        tooltip: {
            valuePrefix: prefix,
            valueSuffix: suffix
        },
        legend: {
            enabled: legend
        },
        series: data
    });
}

$(document).ready(function () {
    $("#line-chart-div").empty();
    var max_width = 800;
    var min_width = 310;
    if (screen_resolution <= 320) {
        max_width = 300;
        min_width = 250;
    } else if (screen_resolution > 320 && screen_resolution <= 480) {
        max_width = 330;
        min_width = 250;
    } else if (screen_resolution > 480 && screen_resolution < 1200) {
        max_width = 550;
        min_width = 310;
    } else if (screen_resolution > 1200 && screen_resolution < 1920) {
        max_width = 800;
        min_width = 310;
    } else if (screen_resolution >= 1920) {
        max_width = 1150;
        min_width = 310;
    }

      $("#line-chart-div").append("<div id='line-chart1' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div1").append("<div id='line-chart1' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div2").append("<div id='line-chart2' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div3").append("<div id='line-chart3' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div4").append("<div id='line-chart4' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div5").append("<div id='line-chart5' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div6").append("<div id='line-chart6' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div7").append("<div id='line-chart7' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div8").append("<div id='line-chart8' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div9").append("<div id='line-chart9' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div10").append("<div id='line-chart10' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div11").append("<div id='line-chart11' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div1").append("<div id='bar-chart1' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div2").append("<div id='bar-chart2' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div3").append("<div id='bar-chart3' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div5").append("<div id='bar-chart5' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div12").append("<div id='line-chart12' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div13").append("<div id='line-chart13' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div4").append("<div id='bar-chart4' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div14").append("<div id='line-chart14' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#line-chart-div15").append("<div id='line-chart15' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div7").append("<div id='bar-chart7' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div6").append("<div id='bar-chart6' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");
      $("#bar-chart-div8").append("<div id='bar-chart8' style='margin: auto; min-width: " + min_width + "px; max-width: " + max_width + "px; width: 100%; height: 400px;'></div>");


    // Draw Charts
    drawLineChart('line-chart1', '1_1');
    drawLineChart('line-chart2', '1_2');
    drawLineChart('line-chart3', '1_3');
    drawLineChart('line-chart4', '2_1');
    drawLineChart('line-chart5', '2_2');
    drawLineChart('line-chart6', '3_1');
    drawLineChart('line-chart7', '3_2');
    drawLineChart('line-chart8', '3_3');
    drawBarChart('bar-chart6', '3_4', true);
    drawLineChart('line-chart9', '4_1');
    drawLineChart('line-chart10', '4_2');
    drawLineChart('line-chart15', '4_3');
    drawLineChart('line-chart11', '5_1');
    drawBarChart('bar-chart1', '5_2', false);
    drawBarChart('bar-chart2', '5_3', false);
    drawBarChart('bar-chart3', '6_1', true);
    drawBarChart('bar-chart5', '6_2', true);
    drawLineChart('line-chart12', '7_1');
    drawLineChart('line-chart13', '7_2');
    drawBarChart('bar-chart4', '7_3', true);
    drawBarChart('bar-chart7', '7_4', true);
    drawLineChart('line-chart14', '8_1');
    drawBarChart('bar-chart8', '6_3', false);
})
