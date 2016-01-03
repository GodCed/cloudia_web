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
    
  


   final_QUERY = 'SELECT id, name, description, sensor_id, date_time FROM sensor_alert WHERE date_time between CURRENT_DATE and CURRENT_DATE+1';

    console.log(final_QUERY);
    connection1.query(final_QUERY, function(err, rows, fields) {
        if(!err) {
            var sensor_units_list = {sensor_units: Array()};
            for(var i = 0; i < rows.length; ++i)
                sensor_units_list.sensor_units.push(rows[i]);
                console.log(rows[i]); 
                res.contentType('application/json');
                res.setHeader("Access-Control-Allow-Origin", "*");
                res.send(JSON.stringify(sensor_units_list));
        } else {
            res.send('Db query failed');
            console.log(err.toString());
        }
    });
	
}

function other(req, res){
    res.send('Not found.');
}