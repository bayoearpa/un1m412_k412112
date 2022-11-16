<script type="text/javascript">
	
	  /*
     * DONUT CHART F1761
     * -----------
     */

    var donutDataF1761 = [
     { label: 'ST', data: <?php echo $f1761_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1761_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1761_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1761_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1761_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1761', donutDataF1761, {
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
     * END DONUT CHART F1762
     */
     /*

     /*
     * DONUT CHART F1761
     * -----------
     */

    var donutDataF1762 = [
     { label: 'ST', data: <?php echo $f1762_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1762_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1762_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1762_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1762_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1762', donutDataF1762, {
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
     * END DONUT CHART F1762
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