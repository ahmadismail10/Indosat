/*
 FusionCharts JavaScript Library
 Copyright FusionCharts Technologies LLP
 License Information at <http://www.fusioncharts.com/license>
*/
 /**
 *  Dashboard Controllers
    The given below code will render all the charts that you see when the file is loaded
 */
//Creating the users chart for the no. of user that visited in that month

$(document).ready(function() {

  $("#user-chart-container").insertFusionCharts({
    type: 'column2d',
    width: '100%',
    height: '100',
    id: 'chart1',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "paletteColors": "#0075c2",
        "showvalues": "0",
        "divlinealpha": "30",
        "numdivlines": "3",
        "showlabels": "0",
        "showYAxisValues": "0",
        "yAxisMaxValue": "9000",
        "palettecolors": "008ae6",
        "plotspacepercent": "0",
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "plotToolText": "<div><b>$label, <br/>Users: $datavalue</b></div>",
        "theme": "zune"
      },
      "data": user_chart_data //from data.js
    }
  });
  //Creating Page Views Chart for that month
  $("#page-views-chart-container").insertFusionCharts({
    type: 'column2d',
    id: 'chart2',
    width: '100%',
    height: '100',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "paletteColors": "#0075c2",
        "showvalues": "0",
        "divlinealpha": "30",
        "numdivlines": "3",
        "showlabels": "0",
        "showYAxisValues": "0",
        "yAxisMaxValue": "28000",
        "palettecolors": "008ae6",
        "plotspacepercent": "0",
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "plotToolText": "<div><b>$label, <br/>Page Views: $datavalue</b></div>",
        "theme": "zune"
      },
      "data":page_views_chart_data//from data.js
    }
  });
  //Creating Avg. session duration Chart for that month
  $("#session-duration-chart-container").insertFusionCharts({
    type: 'column2d',
    id: 'chart3',
    width: '100%',
    height: '100',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "paletteColors": "#0075c2",
        "showvalues": "0",
        "divlinealpha": "30",
        "numdivlines": "3",
        "showlabels": "0",
        "showYAxisValues": "0",
        "yAxisMaxValue": "300",
        "palettecolors": "008ae6",
        "plotspacepercent": "0",
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "plotToolText": "<div><b>$label, <br/>Avg. Session Duration: $value secs</b></div>",
        "theme": "zune"
      },
      "data": session_duration_chart_data//from data.js
    }
  });
  //Creating Bounce rate Chart for that month
  $("#bounce-rate-chart-container").insertFusionCharts({
    type: 'column2d',
    id: 'chart4',
    width: '100%',
    height: '100',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "paletteColors": "#0075c2",
        "showvalues": "0",
        "divlinealpha": "30",
        "numdivlines": "3",
        "showlabels": "0",
        "showYAxisValues": "0",
        "yAxisMaxValue": "100",
        "palettecolors": "008ae6",
        "plotspacepercent": "0",
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "plotToolText": "<div><b>$label, <br/>Bounce Rate: $value%</b></div>",
        "theme": "zune"
      },
      "data": bounce_rate_chart_data//from data.js
    }
  });
  //Creating Session Chart for that month
  $("#session-chart-container").insertFusionCharts({
    type: 'mscombi2d',
    id: 'chart5',
    width: '100%',
    height: '200',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "palette": "2",
        "showvalues": "0",
        "yAxisMaxValue": "10000",
        "numDivLines": "2",
        "plotfillalpha": "20",
        "lineThickness": "4",
        "divlinealpha": "20",
        "formatnumberscale": "0",
        "showlegend": "0",
        "labelStep": "6",
        "palettecolors": "008ae6",
        "labelDisplay": "NONE",
        "chartLeftMargin": "10",
        "chartRightMargin": "10",
        "chartBottomMargin": "10",
        "yAxisValuesPadding": "10",
        "plotToolText": "<div><b>$label, <br/>Total Hits: $datavalue</b></div>",
        "theme": "zune"
      },
      "categories": session_chart_catagories,//from data.js
      "dataset": session_chart_data//from data.js
    }
  });
  //Creating Visistor Type Chart for that month
  $("#visitor-chart-container").insertFusionCharts({
    type: 'pie2d',
    id: 'chart6',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "chartTopMargin": "0",
        "chartBottomMargin": "0",
        "startingAngle": "90",
        "showValues": "1",
        "showLegend": "1",
        "plotTooltext": "<b>No. of $label Visitors: $value<br/>Traffic: $percentValue</b>",
        "theme": "zune"
      },
      "data": visitor_chart_data//from data.js
    }
  });
  //Creating Gender Chart for that month
  $("#gender-chart-container").insertFusionCharts({
    type: 'pie2d',
    id: 'chart7',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "chartTopMargin": "0",
        "chartBottomMargin": "0",
        "startingAngle": "90",
        "showValues": "1",
        "showLegend": "1",
        "plotTooltext": "<b>Gender: $label<br/>Traffic: $percentValue<br/>No. of users: $value</b>",
        "theme": "zune"
      },
      "data": gender_chart_data//from data.js
    }
  });
  //Creating Traffic Soucres Chart for that month
  $("#traffic-chart-container").insertFusionCharts({
    type: 'column2d',
    id: 'chart8',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "chartBottomMargin": "0",
        "xAxisName": "Traffic Source",
        "yAxisName": "No. of Users",
        "yAxisMaxValue": "100000",
        "placevaluesInside": "0",
        "valueFontColor": "000000",
        "palettecolors": "008ae6",
        "rotateValues": "0",
        "showValues": "1",
        "showLegend": "1",
        "divLineAlpha": "30",
        "plotTooltext": "<b>Traffic Source: $label<br/>No. of users: $value</b>",
        "theme": "zune"
      },
      "data": traffic_chart_data//from data.js
    }
  });
  //Creating Age Group Chart for that month , this tells the different age group of people that visited the site in that month
  $("#age-chart-container").insertFusionCharts({
    type: 'column2d',
    id: 'chart9',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "chartBottomMargin": "0",
        "xAxisName": "Age Group",
        "yAxisName": "No. of Users",
        "placevaluesInside": "0",
        "valueFontColor": "000000",
        "palettecolors": "008ae6",
        "rotateValues": "0",
        "showValues": "1",
        "showLegend": "1",
        "divLineAlpha": "30",
        "plotTooltext": "<b>Age Group: $label<br/>Traffic: $percentValue<br/>No. of users: $value</b></b>",
        "theme": "zune"
      },
      "data": age_chart_data//from data.js
    }
  });
  //Creating Geo Location Chart for that month , i.e the location for different places where the site was opened
  $("#location-chart-container").insertFusionCharts({
    type: 'WorldwithCountries',
    id: 'chart10',
    width: '100%',
    height: '500',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "animation": "0",
        "showbevel": "0",
        "usehovercolor": "1",
        "showlegend": "1",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendCaption": "Site Usage",
        "connectorcolor": "ff0000",
        "entityFillHoverColor": "bfbfbf",
        "legendpadding": "0",
        "chartLeftMargin": "0",
        "chartRightMargin": "0",
        "chartTopMargin": "0",
        "chartBottomMargin": "0",
        "showlabels": "0",
        "legendaxisbordercolor": "4db8ff",
        "legendspreadfactor": ".4",
        "entityToolText": "<b>Country: $lName<br/>No. of Viewers: $value</b>",
        "theme": "zune",
        "fillColor": "e6f5ff",
      },
      "colorrange": {
        "minvalue": "0",
        "code": "b3e0ff",
        "color": [
                      {
                          "minvalue": "0",
                          "maxvalue": "100",
                          "code": "#e6f5ff",
                          "displayValue" : "< 100"
                      },
                      {
                          "minvalue": "100",                        
                          "maxvalue": "1000",                        
                          "code": "#80ccff",
                          "displayValue" : "100-1K"
                      },
                      {
                          "minvalue": "1000",                        
                          "maxvalue": "15000",                        
                          "code": "#1aa3ff",
                          "displayValue" : "1K-15K"
                      },
                      {
                          "minvalue": "15000",                        
                          "maxvalue": "25000",                        
                          "code": "#0075c2",
                          "displayValue" : "15K-25K"
                      },
                      {
                          "minvalue": "25000",                        
                          "maxvalue": "35000",                        
                          "code": "#004d80",
                          "displayValue" : "25K-35K"
                      }
                  ]
      },
      "data": location_chart_data//from data.js
    }
  });
  //Calculating height and making the sidenav responsive for all the devices ,as soon as the Document loaded 
  sidenavHeight();
  //Sidenavbar is made responsive for both all types of devices
  function sidenavHeight() {
    var contemt_main = $("#contemt-main").height();
    var nav = $(".sidenav").height();

      if (nav <= contemt_main) {
        $(".sidenav").css("height", contemt_main);
        $("#loader").css("height", contemt_main);
      } else {
        $(".sidenav").css("height", nav);
        $("#loader").css("height", contemt_main);
      }
  }
  function data_export(dataset , day)
  {
      if(dataset[day].length > 0)
      {
        return dataset[day].shift(); 
      }
      else
      {
        for(var i = 0; i < 7 ; i++)
        {
            day++;
            if(dataset[day%7].length > 0)
            {
              return dataset[day%7].shift(); 
            }   
        }
      }
  }

  //Calculating height and making the sidenav responsive whenever their is change in window size
  $(window).resize(function() {
    sidenavHeight();
  });
  $(window).on("orientationchange",function() {
    sidenavHeight();
  });
  $(window).on("load",function() {
    sidenavHeight();
  });

  $(function() {
    //Maximum  date for which the analytic could be done
    var max_pickup_Date = new Date();
    var maxDate = new Date(new Date(max_pickup_Date).setMonth(max_pickup_Date.getMonth()-1));
    
    $('#datetimepicker6').datetimepicker({
      format:'DD/MM/YYYY',
      maxDate : maxDate
    });
    //Setting the defailt date 
    $('#datetimepicker6').data("DateTimePicker").date(new Date('1 July 2016'));  
    
    $('#datetimepicker7').datetimepicker({
      format:'DD/MM/YYYY'
    });
    
    $("#datetimepicker6 input").click(function(){
        $(".input-group-addon").click();
    });
    
    //Variable initialization
    var static_date = new Date($('#datetimepicker6 input').val());
    
    //Checking for any change in the Date Time Picker input box to manipulate the chart data accordingly  
    $("#datetimepicker6").on("dp.change", function(e) {
      
      $('#datetimepicker6 input').blur();
      $("#loader").removeClass("hidden");
      
      var pick_up_date = new Date(e.date);
      var one_month_foward = new Date(new Date(pick_up_date).setMonth(pick_up_date.getMonth()+1)); 
      $('#datetimepicker7').data("DateTimePicker").date(one_month_foward);
      
      setTimeout(function(){
        seed_data(pick_up_date,one_month_foward);  
      }, 1);
    });
    
    //Function is to update the chart data when ever their is a Change in the Date from the input
    function update_chart(chart , i , obj)
    {
       //Setting Timeout for the render of charts do that the change in each chart can be noticed .
        setTimeout(function(){
          //Updating Chart with a new set of values                
          chart.setJSONData(obj);
          //This is to remove the loader after everychange is complete
          if(i == 7)
          {
            $("#loader").addClass("hidden");   
          }
        } , 500 + i*300);
    }

    //Calculating fake data to be seeded in the graph .. if u want to update real time data you need to do changes in this function.
    function seed_data(pick_up_date , one_month_foward)
    {
        //Collection of the chart objects , they contains the list of ids that were specified in as the "id" parameter for the charts
        var charts = [chart1,chart2,chart3,chart4,chart6,chart7,chart8,chart9];
        //Flag variable
        var count =0;
        //Collection to store Data for the chart according to the day
        var dataset = [[],[],[],[],[],[],[]];
        
        var day = static_date.getDay(); 
        
        //Collection of all the months
        var monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                         ];
        
        
        //Calculating all the days between the two choosen dates
        var currentDate = new Date(pick_up_date.getTime());      
        //Collection of all the 31 dates between the choosen date and the the after a month 
        var  between = [];
        //Loop to find out the next 31 days from the pickup date
        while (currentDate <= one_month_foward || between.length < 31) {
            between.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }

              /*  Creating of fake data and json preparation that neeeds to be passed  */
        //Getting the current chart data
        var obj = chart5.getJSONData();
        $.each( obj['dataset'][0]['data'], function( k, v ) { 
          dataset[day % 7].push(obj['dataset'][0]['data'][count]['value']);
          day++;
          count++;
        });
        
        //Count value reset
        count = 0;
        
        //Calculating data to seeded  in Session Chart
        $.each( obj['dataset'][0]['data'], function( k, v ) {
          var value = data_export(dataset,between[count].getDay());
          var rndm = parseInt(value) + (Math.floor(Math.random() * value/50) + 1 )*((between[count].getDay() < 6)?((between[count].getDay() > 0)?between[count].getDay():-1):between[count].getDay()*(-1));
          obj['dataset'][0]['data'][count]['value'] = rndm ; 
          obj['dataset'][1]['data'][count]['value'] = rndm; 
          obj['categories'][0]['category'][count]['label'] = monthNames[between[count].getMonth()] + " " + between[count].getDate() + " " + between[count].getFullYear();
          
          count++;
        }); 
        //Updating Session chart with the fake data
        update_chart(chart5 , 5 , obj);

        
        //Updating Location Map with a new set of random data.
        obj = chart10.getJSONData();
        $.each( obj['data'][0]['data'], function( k, v ) {
          var rndm = (Math.floor(Math.random() * v.value/10) + 50);
          if(pick_up_date < static_date)
            rndm = -1 * rndm;
          v.value = ((parseInt(v.value) +rndm) < 0)?0:(parseInt(v.value) +rndm) ;
        }); 
        //Update Location in the Map
        update_chart(chart10 , 5 , obj);

        //Looping through all the charts and updating rest of the charts with new set of random Data    
        for(var i =0; i<8 ;i++)
        {
          //Count value reset
          count = 0 ;
          obj = charts[i].getJSONData();

          if(i<4)
          {
           day = static_date.getDay(); 
           //Getting current dataset
           $.each( obj['data'], function( k, v ) {     
              dataset[day%7].push(v.value);
              day++;
            });
          }
          //Creating fake data
          $.each( obj['data'], function( k, v ) {
            if(i<4)
            {
              //Random data
              var rndm = data_export(dataset,between[count].getDay());
              v.value = parseInt(rndm) + (Math.floor(Math.random() * rndm/50) + 20); 
              v.label = monthNames[between[count].getMonth()] + " " + between[count].getDate() + " " + between[count].getFullYear() ;
              count++;
            }
            else
            {
                v.value = parseInt(v.value) + (Math.floor(Math.random() * v.value/5)*2 + 20); 
            }
          });
          //Updating the value of the remaining charts
          update_chart(charts[i] , i , obj);
        }
        //Setting the day value to the new pick up date day
        day = between[0].getDay();        
    }

  });
});
