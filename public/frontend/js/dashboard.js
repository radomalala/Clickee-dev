new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'salesstat',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { month: 'Janvier', y: 20 },
    { month: 'Février', y: 14 },
    { month: 'Mars', y: 9 },
    { month: 'Avril', y: 4 },
    { month: 'Mai', y: 1 },
    { month: 'Juin', y: 2 },
    { month: 'Juillet', y: 2 },
    { month: 'Aout', y: 20 },
    { month: 'Septembre', y: 8 },
    { month: 'Octobre', y: 4 },
    { month: 'Novembre', y: 10 },
    { month: 'Décembre', y: 20 },
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['y'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Nombre'],
  barColors: function (row, series, type) {
    var percentage = (100 * row.y) / this.ymax;
    if(percentage <= 100 && percentage >= 75) return 'rgb(0,163,89)';
    else if(percentage < 75 && percentage >= 50) return 'rgb(0,192,239)';
    else if(percentage < 50 && percentage >= 25) return 'rgb(200,132,210)';
    else if(percentage < 25 && percentage >= 10) return 'rgb(255,128,50)';
    else if(percentage < 10) return 'rgb(255,0,0)';
  }

});



Morris.Donut({
  element: 'salescamembert',
  data: [
    {value: 70, label: 'en ligne'},
    {value: 15, label: 'locale'}
  ],
  backgroundColor: '#ccc',
  labelColor: '#004857',
  colors: [
    '#F7FF6B',
    '#FF793C'
  ],
  formatter: function (x) { return x + "%"}
});


  // barColors: function (row, series, type) {
  //   if (type === 'bar') {
  //     var blue = Math.ceil(100 * row.y / this.ymax);
  //     var green = Math.ceil(255 * row.y / this.ymax);
  //     return 'rgb(255,' + green + ',' + blue + ')';
  //   }
  //   else {
  //     return '#000';
  //   }
  // }