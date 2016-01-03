var sations;
var station;
var sensors_units;
/* Fonctions qui permet d'afficher ou non les élments*/


/*Fonction qui rajoute les sation*/
function show_station(){
    window.onload = function(){
        //console.log("Dans la fonction show_station: WAIT TO GET JSON");
        station = document.getElementById("station");
        $.getJSON( '/api/stations', function( data ) {
            
            var items = [];

            $.each( data, function( key, val ) {
                items.push( "<tr id='" + key + "'>" + val + "</tr>" );
            });
            //console.log("JSON RECEIVED : items are :");
            window.sations = data;
            station.innerHTML = elements_to_row_html(window.sations);
        });
        //alert(document.getElementById("navarea"));
    }
};
function elements_to_row_html(elements){
    
    var innerHTML = '';
    
    //console.log(elements.station[0]);
    for (index = 0; index < elements.station.length; ++index) {
        //console.log(elements.station[index].name);
        innerHTML     +='<tr class="active">';
        innerHTML     += '  <td class="expandable" href="#" title="Dashboard">';
        // innerHTML     += '      <span class="glyphicon glyphicon-home expanded-elementyy"></span>';
        innerHTML     += '      <a class="station_name orange-header" href="#" onclick=display_sensor_units("'+elements.station[index].id.toString()+'") class="expanded-element"> '+elements.station[index].name.toString()+'</a>';
        innerHTML     += '      <a id ='+elements.station[index].id.toString()+' href="#" class="expanded-element"></a>';
        innerHTML     += '  </td>';
        innerHTML     += '</tr>';
    }
    return innerHTML;
};


function display_sensor_units(station) {
        //console.log(station);
        //console.log("Dans la fonction display_sensor_units: WAIT TO GET JSON");

    $.getJSON( '/api/sensor_unit/'+station, function( data ) {
            
        var items = [];

            $.each( data, function( key, val ) {
                items.push( "<li id='" + key + "'>" + val + "</li>" );
            });
            //le.log("JSON RECEIVED : items for "+station);
            ////console.log(data);
            if (verify_display(station)){
                //station.innerHTML = elements_to_row_html(window.sations);
                for (index = 0; index < data.sensor_units.length; ++index) {
                    //console.log("Display sensors");
                    display_sensors(data.sensor_units[index].id.toString(),station);
                }}
            else{
                //le.log("Delete sensors");
                var sensors;
                sensors = document.getElementById(station);
                sensors.innerHTML = '';} 
                });
        
      
            }
            function display_sensors(sensor_unit, station) {
            	
        //console.log("Dans la fonction display_sensor_units: WAIT TO GET JSON" + station);
        
                $.getJSON( '/api/sensors/'+ sensor_unit, function( data ) {
            
            var items = [];
            var innerHTML_sensors = '';
           // console.log("comparaison 1");
           // console.log(data);
            
                    innerHTML_sensors     +='<table class="table table-hover" id='+"station1"+'>';
            
                    $.each( data, function( key, val ) {
                        items.push( "<li id='" + key + "'>" + val + "</li>" );
                    });
            

                //station.innerHTML = elements_to_row_html(window.sations);
                //console.log(data);
                for (index = 0; index < data.sensors.length; ++index) {
                        innerHTML_sensors     +='<tr class="active">';
                        innerHTML_sensors     += '  <td id ='+data.sensors[index].id.toString()+' class="expandable" href="#" title="Dashboard">';
                        //innerHTML_sensors     += '      <span class="glyphicon glyphicon-home expanded-elementyy"></span>';
                        innerHTML_sensors     += '      <a class="sensor_name" href="#" onclick=display_graph("'+data.sensors[index].id.toString()+'") class="expanded-element"> '+data.sensors[index].name.toString()+'</a>';
                        innerHTML_sensors     += '  </td>';
                        innerHTML_sensors     += '</tr>';

                    }
                    innerHTML_sensors     +='</table>';
                    var stations;
                    document.getElementById(station).innerHTML = innerHTML_sensors;

                });
            }
    
function verify_display(id_table){
        var sensor;
       // console.log("Ben voyon donc");
        sensor = document.getElementById("station1");
        //console.log(sensor);
        if (sensor === null){
            //console.log("NULL");
            return true;
        }
        return false;
        
            }

function display_graph(sensor_id){
    //console.log("show graphique");
    show_graph(sensor_id);
};

function setmarker(station){
    codeAddress(station);
}

             
