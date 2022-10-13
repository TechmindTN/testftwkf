// Set new default font family and font color to mimic Bootstrap's default styling

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';

Chart.defaults.global.defaultFontColor = '#858796';

var att = parseInt(document.getElementById('att').innerText.split(' '))



function number_format(number, decimals, dec_point, thousands_sep) {

  // *     example: number_format(1234.56, 2, ',', ' ');

  // *     return: '1 234,56'

  number = (number + '').replace(',', '').replace(' ', '');

  var n = !isFinite(+number) ? 0 : +number,

    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),

    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,

    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,

    s = '',

    toFixedFix = function(n, prec) {

      var k = Math.pow(10, prec);

      return '' + Math.round(n * k) / k;

    };

  // Fix for IE parseFloat(0.55).toFixed(0) = 0;

  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

  if (s[0].length > 3) {

    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

  }

  if ((s[1] || '').length < prec) {

    s[1] = s[1] || '';

    s[1] += new Array(prec - s[1].length + 1).join('0');

  }

  return s.join(dec);

}



stat1=parseInt(document.getElementById("stat0").innerText);

stat2=parseInt(document.getElementById("stat1").innerText);

stat3=parseInt(document.getElementById("stat2").innerText);

stat4=parseInt(document.getElementById("stat3").innerText);

stat5=parseInt(document.getElementById("stat4").innerText);

stat6=parseInt(document.getElementById("stat5").innerText);

stat7=parseInt(document.getElementById("stat6").innerText);

stat8=parseInt(document.getElementById("stat7").innerText);

stat9=parseInt(document.getElementById("stat8").innerText);

stat10=parseInt(document.getElementById("stat9").innerText);

stat11=parseInt(document.getElementById("stat10").innerText);

stat12=parseInt(document.getElementById("stat11").innerText);








// Area Chart Example

var ctx = document.getElementById("myAreaChart");

var myLineChart = new Chart(ctx, {

  type: 'line',

  data: {

    labels: ["Jan", "Fev", "Mar", "Avril", "May", "Jun", "Jul", "Aauot", "Sep", "Oct", "Nov", "Dec"],

    datasets: [{

      label: "Ajouté",

      lineTension: 0.3,

      backgroundColor: "rgba(78, 115, 223, 0.05)",

      borderColor: "rgba(78, 115, 223, 1)",

      pointRadius: 3,

      pointBackgroundColor: "rgba(78, 115, 223, 1)",

      pointBorderColor: "rgba(78, 115, 223, 1)",

      pointHoverRadius: 3,

      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",

      pointHoverBorderColor: "rgba(78, 115, 223, 1)",

      pointHitRadius: 10,

      pointBorderWidth: 2,



      data: [stat1, stat2, stat3, stat4, stat5, stat6, stat7, stat8, stat9, stat10, stat11, stat12],

    }],

  },

  options: {

    maintainAspectRatio: false,

    layout: {

      padding: {

        left: 10,

        right: 25,

        top: 25,

        bottom: 0

      }

    },

    scales: {

      xAxes: [{

        time: {

          unit: 'date'

        },

        gridLines: {

          display: false,

          drawBorder: false

        },

        ticks: {

          maxTicksLimit: 7

        }

      }],

      yAxes: [{

        ticks: {

          maxTicksLimit: 5,

          padding: 10,

          // Include a dollar sign in the ticks

          callback: function(value, index, values) {

            return  value;

          }

        },

        gridLines: {

          color: "rgb(234, 236, 244)",

          zeroLineColor: "rgb(234, 236, 244)",

          drawBorder: false,

          borderDash: [2],

          zeroLineBorderDash: [2]

        }

      }],

    },

    legend: {

      display: false

    },

    tooltips: {

      backgroundColor: "rgb(255,255,255)",

      bodyFontColor: "#858796",

      titleMarginBottom: 10,

      titleFontColor: '#6e707e',

      titleFontSize: 14,

      borderColor: '#dddfeb',

      borderWidth: 1,

      xPadding: 5,

      yPadding: 5,

      displayColors: false,

      intersect: false,

      mode: 'index',

      caretPadding: 10,

      callbacks: {

        label: function(tooltipItem, chart) {

          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';

          return datasetLabel + tooltipItem.yLabel;

        }

      }

    }

  }

});

