<<<<<<< HEAD
$(function () {
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?php foreach ($data1 as $data) { echo $data.',';}; ?>]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [<?php foreach ($data2 as $data) { echo $data.',';}; ?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: true,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value / 1000
                // value += ''
              }
              return value + ' K'
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: true,
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
}
=======

>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
