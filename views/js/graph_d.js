function show_graph(sensor_id) {
    var measures,
        balises;

    $.get("http://127.0.0.1:8080/api/measures/" + sensor_id, function(data) {
        measures = data.mesures;
        measures.sort(function(a,b) {
           return new Date(a.date_time).getTime() - new Date(b.date_time).getTime() 
        });

        if(measures[0] != undefined) {
            $.get("http://127.0.0.1:8080/api/balises", function(data) {
                balises = data.balises;
                Highcharts.setOptions({
                    global : { useUTC : false }
                });
                
                // Script to internationalize graph

                var language;

                // Get the language variable
                var re = /;\slanguage=(\w*)/;
                var cookie = document.cookie;
                var m;

                if ((m = re.exec(cookie)) !== null) {
                    if (m.index === re.lastIndex) {
                        re.lastIndex++;
                    }

                    $.getJSON("../../multilanguage/" + m[1] + ".json", function(json) {
                        language = json;
                        console.log(language);
                    });
                }
                
                console.log('THE DATA IS HERE : ' + this );

                var range_data,
                             i;

                range_data = [];

                for ( i = 0 ; i < measures.length ; i++ ) {
                    var s,
                        a,
			        d,
			        j,
			        range_min,
			        range_max;
                                        
		            s = measures[i].date_time.toString();
		            a = s.split(/[^0-9]/); 
		            d = new Date ( a[0], a[1]-1, a[2], a[3], a[4], a[5] );
                                        
                    for ( j = 0 ; j < balises.length ; j++ ) {
                        if(balises[j].description == measures[0].name) {
                            console.log('BAS : ' + balises[j].min + ' HAUT : ' + balises[j].max);
                            range_min = balises[j].min;
                            range_max = balises[j].max;
                        }
                    }

                    range_data.push([
                        Date.parse(d),
                        range_min,
                        range_max,
                        20                        
                    ]);

                    console.log('THE RANGE_DATA is : ' + range_data[i] + '\n');
                }

                // Create the chart                
                var chart = new Highcharts.StockChart({
 
                        chart: {
                            renderTo: 'grapharea',
                            backgroundColor:'rgba(255, 255, 255, 0.8)'
                        },
                        
                        title: {
                            text: measures[0].name,
                            style: { "color": "#338000", "font-size": "24px"},
                            y: 20,
                        },
                        
                        subtitle: {
                            align: 'center',
                            floating: false,
                            style: { "color": "#003380", "font-size": "16px"},
                            useHTML: false,
                            verticalAlign: 'center',
                            text: 'Sensor id: ' + sensor_id,
                            x: 0,
                            y: 40,
                        },
                                               
                        xAxis: {
                            title: {
                                text: 'Time',
                                type: 'datetime'
                            },
                            tickInterval: 1
                        },
                                
                        yAxis: {
                            align: 'left',
                            opposite: false,
                            title: {
                                text: measures[0].description + ' (' + measures[0].measure_type + ')'
                            },
                plotLines: [{
                    id: 'limit-min',
                    color: '#FF0000',
                    dashStyle: 'ShortDash',
                    width: 2,
                    value: 8,
                    zIndex: 0,
                    label : {
                        text : 'Min'
                    }
                }, {
                    id: 'limit-max',
                    color: '#008000',
                    dashStyle: 'ShortDash',
                    width: 2,
                    value: 20,
                    zIndex: 0,
                    label : {
                        text : 'Max'
                    }
                }]

                        },
                                    
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.2f}'
                                }
                            }
                        },
                                        
                        tooltip: {
                            useHTML: true,
                            formatter: function() {
				console.log(this);
                                var range;

                                

                                if (typeof this.points[1].point.low == 'undefined' || typeof this.points[1].point.high == 'undefined') {
                                    range = 'Range : Not defined';
                                } else {
                                    range = 'Range : ' + Highcharts.numberFormat(this.points[1].point.low, 2) + ' to ' + Highcharts.numberFormat(this.points[1].point.high, 2);
                                }
                                return Highcharts.dateFormat('%a %d %b %H:%M:%S', new Date(this.x)) + '<br>' +
                                       '<b style="color: #555555">value</b>' + ': ' + Highcharts.numberFormat(this.y, 2) + '<br>' +
                                       range;
                            },
                            crosshairs: [true, true],
                            shared: true
                        },

                        navigator: {
                            series: {
                                includeInCSVExport: false
                            }
                        },
                       
                       series : [{
                            name: 'Value',
                            zIndex: 2,
                            decimal: 2,
                            marker: {
                                enabled: true,
                            },
                            data: (function () {
                                var data = [],
                                    time = (new Date()).getTime(),
                                    i;

                                for ( i = 0 ; i < measures.length ; i++ ) {
                                    var s,
                                        a,
                                        d;

                                    s = measures[i].date_time.toString();
                                    a = s.split(/[^0-9]/);
                                
                                    d = new Date ( a[0], a[1]-1, a[2], a[3], a[4], a[5] );

                                    data.push([
                                        Date.parse(d),
                                        measures[i].measure_value
                                    ]);
                                }
                                return data;
                            }())
                        },{
                            name: 'Range',
                            zIndex: 1,
                            type: 'arearange',
                            color: 'rgba(0, 120, 0, 1.0)',
                            data : range_data
                        }],
                                                   
                       exporting: {
                           csv: {
                               dateFormat: '%Y-%m-%d'
                           }
                       }
                });
        });

        } else {
            console.log("SET ERRORS PAGE FOR GRAPHAREA");
            $('#grapharea').load('../errors/no_data.html #no_data');
            var language_cookie = getCookie("language");
            console.log(language_cookie);
            
            if (language_cookie === undefined){
                language_cookie = "English";
            };
            $.get("http://127.0.0.1:8080/api/multilanguage/" + language_cookie, function(data) {
                var obj = JSON.parse(data.toString());
                document.getElementById("header_error_id").innerHTML = obj.error_no_data_h1;
                document.getElementById("header2_error_id").innerHTML = obj.error_no_data_h2;
                
            });       
            
            
        }    
    });
};
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
                    
