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
    var measures = req.url;
    var final_QUERY ="";
    
    
    sensor_id = decodeURIComponent(measures).slice(measures.lastIndexOf('/')+1).toLowerCase().trim();
    //console.log("sensor_id");


   final_QUERY = 'SELECT sensor_id,date_time,measure_value,measure_type.name as measure_type,measure_type.description,sensor_type.name FROM sensor_measure INNER JOIN sensor ON sensor_measure.sensor_id=sensor.id INNER JOIN measure_type ON sensor.measure_type_id=measure_type.id INNER JOIN sensor_type ON sensor.sensor_type_id=sensor_type.id WHERE sensor_measure.sensor_id = ? ORDER BY sensor_measure.date_time DESC LIMIT 0 ,50';

    console.log(final_QUERY);
    connection1.query(final_QUERY,[sensor_id], function(err, rows, fields) {
        if(!err) {

            /* GET ALL MEASURES*/
            //console.log(rows[0]) 
            var measures_list = {mesures: Array()};

            for(var i = 0; i < rows.length; ++i){
                measures_list.mesures.push(rows[i]);

            }
            res.contentType('application/json');
            res.setHeader("Access-Control-Allow-Origin", "*");
            res.send(JSON.stringify(measures_list));
        } else {
            res.send('Db query failed');
            console.log(err.toString());
        }
    });
	
}

function other(req, res){
    res.send('Not found.');
}
