// Dashboard - Modern
//----------------------

(function (window, document, $) {
  // //Sample toast
  setTimeout(function () {
    M.toast({ html: "Hola!" })
  }, 2000)

  // Donut chart
  // -----------
  var CurrentBalanceDonutChart = new Chartist.Pie(
    "#current-balance-donut-chart",
    {
      labels: [1, 2],
      series: [
        { meta: "Completed", value: 80 },
        { meta: "Remaining", value: 20 }
      ]
    },

    {
      donut: true,
      donutWidth: 8,
      showLabel: false,
      plugins: [
        Chartist.plugins.tooltip({
          class: "current-balance-tooltip",
          appendToBody: true
        }),
        Chartist.plugins.fillDonut({
          items: [
            {
              content:
                '<p class="small">Balance</p><h5 class="mt-0 mb-0">$ 10k</h5>'
            }
          ]
        })
      ]
    }
  )
  
})(window, document, jQuery)
