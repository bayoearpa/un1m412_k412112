<script type="text/javascript">
	
	  /*
     * DONUT CHART F1761
     * -----------
     */

    var donutDataF1771 = [
     { label: 'ST', data: <?php echo $f1771_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1771_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1771_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1771_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1771_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1771', donutDataF1771, {
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

    var donutDataF1772 = [
     { label: 'ST', data: <?php echo $f1772_v5 ?>, color: '#f20b0b' },
      { label: 'T', data: <?php echo $f1772_v4 ?>, color: '#ffad5f' },
      { label: 'C', data: <?php echo $f1772_v3 ?>, color: '#ffd966' },
      { label: 'R', data: <?php echo $f1772_v2 ?>, color: '#9af073' },
      { label: 'SR', data: <?php echo $f1772_v1 ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-f1772', donutDataF1772, {
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