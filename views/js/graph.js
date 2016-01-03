// GRAPH SCRIPT
function show_graph(sensor_id) {
    var measures;
    var balises;
    console.log("GET DATA FOR MEASURES");
    $.get("/api/measures/"+sensor_id, function(data){
        console.log("NOW HAVE DATA FOR MEASURES");
        measures = data.mesures;
        measures.sort(function(a,b) { 
                        return new Date(a.date_time).getTime() - new Date(b.date_time).getTime() 
                    });

        console.log("The first measure in the list is : ");
        console.log(measures[0]);
        if(measures[0]!=undefined){
            $.get("/api/balises", function(data){
                balises = data.balises;
                //console.log(balises);
                // console.log(measures[0]);
                Highcharts.setOptions({
                global : { useUTC : false}});

                // Create the chart            
                $('#grapharea').highcharts('StockChart', {
					
				chart: {
		            backgroundColor:'rgba(255, 255, 255, 0.8)' 
			    },

                title : {
                    text : measures[0].name,
                    style: { "color": "#338000", "font-size": "24px"},
                    y: 20,
                },

                subtitle: {
                    align: 'center',
                    floating: false,
                    style: { "color": "#003380", "font-size": "16px"},
                    //text: measures[0].measure_type.description,
                    useHTML: false,
                    verticalAlign: 'center',
                    text: 'Sensor id: '+sensor_id,
                    x: 0,
                    y: 40,

                },

                xAxis: {
                    title: {
                        text: 'Time',
                        type:"datetime"
                    },

                    tickInterval: 1
                },
                yAxis: {
                    align: 'left',
                    opposite: false,
                    title: {
                    text: measures[0].description + " ("+measures[0].measure_type+")"
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true,
                            format: "{point.y:.2f}"
                        }
                    }
                },

                tooltip:{
                        pointFormat: "Value: {point.y:.2f} mm",
                        useHTML: true,
                        formatter: function() {
                            var d = new Date(this.x);
                            var s = '';
                            s+='<b style="color: #555555">Time: '+Highcharts.dateFormat('%Y-%B-%d %H:%M:%S.',  this.x)  +d.getMilliseconds()+'</b></br>';
                            $.each(this.points, function(i, point) {

                                s += '<span style="color: '+point.series.color+';">'+point.series.name +'</span>'+': '+
                                    Highcharts.numberFormat(point.y,2,'.') +'</br>';
                            });
                            return s;
                        },
                        shared: true
                    },

                rangeSelector: {
                    buttons: [{
                        count: 1,
                        type: 'minute',
                        text: '1M'
                    },{
                        count: 5,
                        type: 'minute',
                        text: '5M'
                    }, {
                        count: 60,
                        type: 'minute',
                        text: '1H'
                    }, {
                        count: 1,
                        type: 'day',
                        text: '1D'
                    }, {
                        type: 'all',
                        text: 'All'
                    }],
                    inputEnabled: false,
                    selected: 0
                },

                exporting: {
                    enabled: false
                },

                series : [
                {
                    name : 'Value',
                    decimal : 2,
                    data : (function () {
                        // generate an array of random data
                        var data = [],
                            time = (new Date()).getTime(),
                            i;
                        //console.log(measures[1]);
                        for ( i = 0 ; i < measures.length ; i++ ) {
                            //console.log((measures[i].date_time.toString()));
                            //console.log(measures[i]);
                            var s = measures[i].date_time.toString();
                            var a = s.split(/[^0-9]/);
                            //for (i=0;i<a.length;i++) { alert(a[i]); }
                            var d=new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );

                            data.push([
                                Date.parse(d) ,
                                measures[i].measure_value
                            ]);
                        }
                        return data;
                    }())
                },{
                    name : 'Range',
                    type: 'arearange',
                    color: '#006600',
                    data : (function () {
                        // generate an array of random data
                        var range_data = [],
                            i;
                        for ( i = 0 ; i < measures.length ; i++ ) {
                            //console.log((measures[i].date_time.toString()));
                            //console.log(measures[i]);
                            var s = measures[i].date_time.toString();
                            var a = s.split(/[^0-9]/);
                            //for (i=0;i<a.length;i++) { alert(a[i]); }
                            var d=new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );
                            var range_min;
                            var range_max;
                           // console.log(balises);
                           // console.log(type);
                            for ( j = 0 ; j < balises.length ; j++ ) {
                                if(balises[j].description == measures[0].name){
                                    range_min = balises[j].min;
                                    range_max = balises[j].max;
                                }
                            }   
                            //console.log(range_max);
                            range_data.push([
                                Date.parse(d) ,
                                range_min,
                                range_max
                            ]);
                        }
                        console.log(range_data);
                        return range_data;
                    }())
                }],

                credits: {
                    enabled: true
                },
                });
            });
        }else{
            // append error to container if no data
            $( "#grapharea" ).load( "../errors/no_data.html #no_data");
            // We can use id of a div,li,a,p ... if we want...  
            //$( "#container" ).load( "../errors/no_data.html #no_data div"); 
        }    
    });
}; 
                    
