function buildBar() {
  
$('#bar').highcharts({
  chart: {
      type: 'column'
  },
  title: {
      text: 'Top RHCP Songs on Spotify'
  },
  subtitle: {
      text: 'Data from Spotify, November 2015'
  },
  xAxis: {
      type: 'category',
      labels: {
          rotation: -45,
          style: {
              fontSize: '9px',
              fontFamily: 'Verdana, sans-serif',
              color: 'black'

            }
          }
        // title: {
        //     text: 'Level of Strictness for DUI Laws'
        // }
  },
  yAxis: {
      min: 0,
      title: {
          text: 'Number of Favorites'
      }
  },
  legend: {
      enabled: false
  },
  tooltip: {
      pointFormat: 'Number of favorites as of November 2015: <b>{point.y:.1f}</b>'
  },
  series: [{
      name: 'Spotify Favorites',
      data:  [
        ['Californication', 88704030],
        ['Under The Bridge', 89916862],
        ['Snow (Hey Oh)', 77827298],
        ['Otherside', 62925309],
        ["Scar Tissue", 53699839],
        ["Can't Stop", 47645710],
        ["Dani California", 46998687],
        ["By The Way", 34122109],
        ["...Rain Dance Maggie", 16526392]

      ],
      color: 'red',
      //ParentData,
      dataLabels: {
        //  enabled: true,
          rotation: -90,
          color: '#3D316A',
          align: 'right',
        //  format: '{point.y:.1f}', // one decimal
          y: -10, // 10 pixels down from the top
          style: {
              fontSize: '13px',
              fontFamily: 'Verdana, sans-serif'
          }
      }
  }]
});
//  buildSomething();
};

$(document).ready(function(){
console.log("doc ready!");
buildBar();
})
