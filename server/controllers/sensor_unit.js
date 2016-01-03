var connection = require('../db');


module.exports = function (req, res) {
    if(req.method == 'GET') {
        get(req, res);
    } else {
        other(req, res);
    }
};
function get(req, res){
    
    res.setHeader("Access-Control-Allow-Origin", "*");
    var sensor_units = req.url;
    var final_QUERY ="";
    
    station_id = decodeURIComponent(sensor_units).slice(sensor_units.lastIndexOf('/')+1).toLowerCase().trim();
    console.log(station_id);
    
    if(station_id!="sensor_unit"){ 
        final_QUERY = 'SELECT id FROM sensor_unit WHERE station_id = ? ';

         console.log(final_QUERY);
         connection.query(final_QUERY,[station_id], function(err, rows) {
             if(!err) {

                 /* GET ALL MEASURES*/
                 console.log(rows[1]); 
                 var sensor_units_list = {sensor_units: Array()};

                 for(var i = 0; i < rows.length; ++i){
                     sensor_units_list.sensor_units.push(rows[i]);

                 }
                 res.contentType('application/json');
                 res.setHeader("Access-Control-Allow-Origin", "*");
                 res.send(JSON.stringify(sensor_units_list));
             } else {
                 res.send('Db query failed');
                 console.log(err.toString());
             }
         });
     }else{
         get_all(req,res);
     }
	
}
function get_all(req, res){
    console.log(connection);
    connection.query('SELECT id FROM sensor_unit', function(err, rows) {
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
