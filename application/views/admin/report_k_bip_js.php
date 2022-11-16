<script type="text/javascript">
	
	  /*
     * DONUT CHART F1761
     * -----------
     */

    var donutDataF1763 = [
     { label: 'ST', data: <?php echo $f1763_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1763_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1763_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1763_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1763_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1763', donutDataF1763, {
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

    var donutDataF1764 = [
     { label: 'ST', data: <?php echo $f1764_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1764_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1764_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1764_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1764_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1764', donutDataF1764, {
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