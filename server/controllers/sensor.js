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
    var sensors = req.url;
    var final_QUERY ="";
    
    sensor_units = decodeURIComponent(sensors).slice(sensors.lastIndexOf('/')+1).toLowerCase().trim();
    console.log(sensor_units);
    
    if(sensor_units!="sensors"){ 
        final_QUERY = 'SELECT sensor.id,sensor_type.name FROM sensor INNER JOIN sensor_type ON sensor.sensor_type_id=sensor_type.id WHERE sensor.sensor_unit_id = ?';
        

         console.log(final_QUERY);
         connection.query(final_QUERY,[sensor_units], function(err, rows) {
             if(!err) {

                 /* GET ALL MEASURES*/
                 console.log(rows[1]); 
                 var sensor_list = {sensors: Array()};

                 for(var i = 0; i < rows.length; ++i){
                     sensor_list.sensors.push(rows[i]);

                 }
                 res.contentType('application/json');
                 res.setHeader("Access-Control-Allow-Origin", "*");
                 res.send(JSON.stringify(sensor_list));
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
    connection.query('SELECT id FROM sensor', function(err, rows) {
        if(!err) {
            var sensor_list = {sensors: Array()};
            for(var i = 0; i < rows.length; ++i)
                sensor_list.sensors.push(rows[i]);
                console.log(rows[i]); 
                res.contentType('application/json');
                res.setHeader("Access-Control-Allow-Origin", "*");
                res.send(JSON.stringify(sensor_list));
        } else {
            res.send('Db query failed');
            console.log(err.toString());
        }
    });
}

function other(req, res){
    res.send('Not found.');
}
