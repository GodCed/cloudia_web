/* Mega query of jonction of a lot of table in php myadmin... */

var connection1 = require('../db');

module.exports = function (req, res) {
    if(req.method == 'GET') {
        get(req, res);
    } else {
        other(req, res);
    }
};
function get(req, res){
    
    res.setHeader("Access-Control-Allow-Origin", "*");
    var latlong = req.url;
    var final_QUERY ="";
    
    
    station_id = decodeURIComponent(latlong).slice(latlong.lastIndexOf('/')+1).toLowerCase().trim();
    //console.log("sensor_id");


   final_QUERY = 'SELECT\n\
sensor_unit.station_id,\n\
sensor.id as sensor_id,\n\
sensor.sensor_type_id as sensor_type,\n\
sensor_measure.sensor_id,\n\
MAX(sensor_measure.date_time) as date_time,\n\
sensor_measure.measure_value,\n\
sensor_type.id as sensor_type_id,\n\
sensor_type.name as sensor_type_name,\n\
sensor_type.description as description\n\
FROM `sensor_unit`\n\
INNER JOIN sensor ON (sensor_unit.station_id = ? AND  sensor.sensor_type_id IN (\'18\'))\n\
INNER JOIN sensor_measure ON sensor_measure.sensor_id LIKE sensor.id\n\
INNER JOIN sensor_type ON sensor_type.id LIKE sensor.sensor_type_id\n\
UNION \n\
SELECT \n\
sensor_unit.station_id,\n\
sensor.id as sensor_id,\n\
sensor.sensor_type_id as sensor_type,\n\
sensor_measure.sensor_id,\n\
MAX(sensor_measure.date_time) as date_time,\n\
sensor_measure.measure_value,\n\
sensor_type.id as sensor_type_id,\n\
sensor_type.name as sensor_type_name,\n\
sensor_type.description as description\n\
FROM `sensor_unit`\n\
INNER JOIN sensor ON (sensor_unit.station_id = ? AND  sensor.sensor_type_id IN (\'17\'))\n\
INNER JOIN sensor_measure ON sensor_measure.sensor_id LIKE sensor.id\n\
INNER JOIN sensor_type ON sensor_type.id LIKE sensor.sensor_type_id';

    console.log(final_QUERY);
    connection1.query(final_QUERY,[station_id,station_id], function(err, rows, fields) {
        if(!err) {

            /* GET ALL MEASURES*/
            //console.log(rows[0]) 
            var coordinate = {latlong: Array()};

            for(var i = 0; i < rows.length; ++i){
                coordinate.latlong.push(rows[i]);

            }
            res.contentType('application/json');
            res.setHeader("Access-Control-Allow-Origin", "*");
            res.send(JSON.stringify(coordinate));
        } else {
            res.send('Db query failed');
            console.log(err.toString());
        }
    });
	
}

function other(req, res){
    res.send('Not found.');
}


