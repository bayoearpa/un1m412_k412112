<script type="text/javascript">
	
	  /*
     * DONUT CHART
     * -----------
     */

    var donutDataHorizontal = [
     { label: 'SE', data: <?php echo $v1 ?>, color: '#f20b0b' },
      { label: 'E', data: <?php echo $v2 ?>, color: '#ffad5f' },
      { label: 'CE', data: <?php echo $v3 ?>, color: '#ffd966' },
      { label: 'KE', data: <?php echo $v4 ?>, color: '#9af073' },
      { label: 'TSS', data: <?php echo $v5 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-horizontal', donutDataHorizontal, {
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