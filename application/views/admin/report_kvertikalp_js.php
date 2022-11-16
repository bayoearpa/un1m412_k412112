<script type="text/javascript">
	
	  /*
     * DONUT CHART
     * -----------
     */

    var donutDataVertikal = [
     { label: 'SLT', data: <?php echo $v1 ?>, color: '#f20b0b' },
      { label: 'TS', data: <?php echo $v2 ?>, color: '#ffad5f' },
      { label: 'SLR', data: <?php echo $v3 ?>, color: '#ffd966' },
      { label: 'TPPT', data: <?php echo $v4 ?>, color: '#9af073' }
    ]
    $.plot('#donut-chart-vertikal', donutDataVertikal, {
        series: {
          pie: { 
            show: true,
            radius: 1,
            label: {
              show: true,
              radius: 3/4,
              formatter: labelFormatter,
              background: {
                opacity: 0.5
              }
            }
          }
        },
        legend: {
          show: false
        }
      });

    /*
     * END DONUT CHART
     */
     /*
    
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>