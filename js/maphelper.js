/**
* Get the Country Data
*/        
function getCountry(results) {
    var geocoderAddressComponent,addressComponentTypes,address;
    for (var i in results) {
      geocoderAddressComponent = results[i].address_components;
      for (var j in geocoderAddressComponent) {
        address = geocoderAddressComponent[j];
        addressComponentTypes = geocoderAddressComponent[j].types;
        for (var k in addressComponentTypes) {
          if (addressComponentTypes[k] == 'country') {
            return address;
          }
        }
      }
    }
   return 'Unknown';
 }
 
/**
 * Get the Country Icon
 */
function getCountryIcon(country){
    icon_url  = chartBase;
    icon_url += 'd_simple_text_icon_left&chld=';
    icon_url += escape(country.long_name)  + '|16|000|flag_' 
    icon_url += country.short_name.toLowerCase() + '|24|000|FFF';
    console.log(icon_url);
  return icon_url;
}

function getMsgIcon(msg){
    return  chartBase + 'd_bubble_text_small&chld=edge_bl|' + msg + '|C6EF8C|000000';
}

function bnpw_mapclick(mouseEvent) {
    
    //var redMarkerIcon = chartBase + 'd_map_xpin_letter&chld=pin|+|C40000|000000|FF0000';
    
    //marker.setIcon(redMarkerIcon);
    map.setCenter(mouseEvent.latLng);
    geocoder.geocode({'latLng': mouseEvent.latLng},function(results, status) {
                        
    
                        
    switch(status){
        case google.maps.GeocoderStatus.OK:

            country = getCountry(results);
            /*country_chart.type  = 'population';
            country_chart.id    = 'SP.POP.TOTL';
            country_chart.range = '2003:2013';*/
            map.setCenter(results[0].geometry.location);
            map.setZoom(4);
            
            //marker.setPosition(mouseEvent.latLng);
            //marker.setIcon(getCountryIcon(country));
            
            google.load("visualization", "1", {
                packages    : ["corechart"],
                callback    : drawCountryVisualization
            });
            /**
             *
             * Load the Stuff and data here
             * 
             */
            
            break;
        case google.maps.GeocoderStatus.ZERO_RESULTS:
            
            marker.setPosition(mouseEvent.latLng);
            marker.setIcon(getMsgIcon('Oups, I have no idea, are you on water?'));
            
            break;
        case google.maps.GeocoderStatus.OVER_QUERY_LIMIT:
            
            marker.setPosition(mouseEvent.latLng);
            marker.setIcon(getMsgIcon('Whoa! Hold your horses :) You are quick! ' + 'too quick!'));
            
            break;
      }
                          
});
        
        return ;

}

function drawCountryVisualization() {
       
    range   = '2003:2013'; // Range for which the Data is being fetched
    url     = 'https://wbank-66d07c05404e.my.apitools.com/countries/';
    url    += country.short_name + '/indicators/SP.POP.TOTL?date=' + range +'&format=json';        
        
    chart_data  = [["Year","Population"]];
        
        
    jQuery.ajax({
        url         : url,
        dataType    :'json',
        error       : function(){
            
        },
        beforeSend  : function(){
            
        },
        success     :function(data){
            data[1]     = data[1].reverse();
                
            var options = {
                title           : 'Population groth Chart ' + country.long_name + ' ' + range,
                vAxis           : {title: "Populations"},
                hAxis           : {title: "Year"},
                seriesType      : "bars",
                series          : {5: {type: "line"}},
                animation       : {
                    duration    : 2000,
                    easing      : 'out'
                }
            };
                
            var chart_population = new google.visualization.ComboChart(document.getElementById(country.short_name + '_chart_population'));
            /**
             * Drawing the Data on Chart
             */
            for(i=0;i<data[1].length;i++){
                data_val = data[1][i];
                if(i==0){
                    chart_data.push([data_val.date,parseInt(data_val.value)]);
                    var final_data = google.visualization.arrayToDataTable(chart_data);

                }else{
                    final_data.addRow([data_val.date,parseInt(data_val.value)]);
                }
                chart_population.draw(final_data, options);

            }
        }
    });
    
    // Fetch the Forest Data
    url     = 'https://wbank-66d07c05404e.my.apitools.com/countries/';
    url    += country.short_name + '/indicators/AG.LND.FRST.K2?date=' + range +'&format=json';
    
    jQuery.ajax({
        url         : url,
        dataType    :'json',
        error       : function(){
            
        },
        beforeSend  : function(){
            
        },
        success     :function(data){
            data[1]     = data[1].reverse();
                
            var options = {
                title           : 'Forest land Reduction in (sqkm) for  ' + range,
                vAxis           : {title: "Forest Land Reduction in (sqkm)"},
                hAxis           : {title: "Year"},
                seriesType      : "bars",
                series          : {5: {type: "line"}},
                animation       : {
                    duration    : 2000,
                    easing      : 'out'
                },
                colors: ['#e0440e']
            };
                
            var chart_forest = new google.visualization.ComboChart(document.getElementById(country.short_name + '_chart_forest'));
            /**
             * Drawing the Data on Chart
             */
            forest_data = [["Year","Land"]];
            for(i=0;i<data[1].length;i++){
                data_val = data[1][i];
                if(i==0){
                    forest_data.push([data_val.date,parseInt(data_val.value)]);
                    var finalforest__data = google.visualization.arrayToDataTable(forest_data);

                }else{
                    finalforest__data.addRow([data_val.date,parseInt(data_val.value)]);
                }
                    
                chart_forest.draw(finalforest__data, options);

            }
        }
    });
    
    html    = "<div class='chart_ct'>";
    html   += "<h2> Population & Forest Land Reduction Data of " + country.long_name +  "</h2>";
    html   += "<div id='" + country.short_name + "_chart_population' class='chart_div'></div>";
    html   += "<div id='" + country.short_name + "_chart_forest' class='chart_div'></div>";
    html   += '<img src="' + getCountryIcon(country) + '" class="country_flag" /> ';
    html   += '<div class="copyright">&copy; All The above Data is copyright of <a href="http://www.worldbank.org/" target="_blank">www.worldbank.org</a> and fetched using their json Api</div>'
    html   += "</div>";
    
    infoboxOptions.content = html;
    infobox  = new InfoBox(infoboxOptions);
   
    infobox.open(map,marker);
                
}
/*
 * 
 
                        
                        
                        if (status == google.maps.GeocoderStatus.OK) {
                              var country = getCountry(results);
                              marker.setPosition(mouseEvent.latLng);
                              marker.setIcon(getCountryIcon(country));
                              headingP.innerHTML = country.long_name+ ' <br> ';

                              google.maps.event.addListener(marker, 'click', function() {
                                  country_chart       = country;

                                  country_chart.type  = 'population';
                                  country_chart.id    = 'SP.POP.TOTL';
                                  country_chart.range = '2003:2013';

                                  google.load("visualization", "1", {
                                      packages:["corechart"],
                                      callback:drawVisualization
                                  });


                                  country_chart.type  = 'forest';
                                  country_chart.id    = 'AG.LND.FRST.K2';
                                  country_chart.range = '2002:2012';

                                  google.load("visualization", "2", {
                                      packages:["corechart"],
                                      callback:drawVisualization
                                  });



                                  var html        = "<div style='width:600px;height:300px;'><div id='" + country.short_name + "_chart_population'></div></div>";
                                  html           += "<div style='width:600px;height:300px;'><div id='" + country.short_name + "_chart_forest'></div></div>";
                                  var infowindow  = new google.maps.InfoWindow({
                                      content: html
                                  });
                                  infowindow.open(map,marker);
                              });

                          }
                          
                          
                        }
}
*
*
*/