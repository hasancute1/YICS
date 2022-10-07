$(function () {
  Morris.Donut({
    element: 'graph',
    data: [
      {value: 4000, label: 'Body Plant 1'},
      {value: 3500, label: 'Body Plant 2'},
      {value: 2500, label: 'BQC'},
    ],
    colors: [Config.colors("yellow", 500), Config.colors("red", 500), Config.colors("purple", 500)],
    // formatter: function (x) { return x + "%"}
    formatter: function (y, data) { return 'Rp ' + y },
  }).on('click', function(i, row){
    console.log(i, row);
  });
});