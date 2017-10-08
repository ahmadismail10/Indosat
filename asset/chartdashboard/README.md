Introducing the FreshForks Google Analytics Dashboard - a dashboard for analysis using various Fusioncharts. 

Charts used (alias in brackets)
  - Dual Y Axis Combination chart (MSCombiDY2D)
  - Column Chart (column2d)
  - Pie Chart (pie2d)
  - Map (WorldwithCountries)

The dashboard has the following folder structure
google-analytics-dashboard
  - index.html
  - readme.md
  - css (contains css files)
  - fonts (contains all the fonts used by bootstrap)
  - js (contains js files)
  - imgs (contains image files)
  - fusioncharts (contains FusionCharts library files)

# dashboard.js
This is the controller file which notice the change in the Time period and prepares the chart object.

#data.js
This is file consist of data to be passed to the charts.

# fusioncharts.theme.zune.js
This is the theme file which is used to define the cosmetic properties of chart
such as chart-padding, chart-margin etc.