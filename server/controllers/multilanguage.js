var connection = require('../db');
fs = require('fs');


module.exports = function (req, res) {
    if(req.method == 'GET') {
        get(req, res);
    } else {
        other(req, res);
    }
};
function get(req, res){
    
    res.setHeader("Access-Control-Allow-Origin", "*");
    var multilanguage = req.url;
    multilanguage= multilanguage.split("/");
    
    //console.log(multilanguage[3]);  == language
    //console.log(multilanguage[4]);  == string to get
    
    
    //try to get json file
    // set file to local
    var pathlocal = '/home/cegep/Bureau/ClouDIA_WEB/multilanguage/';
    // set file to server 
    var pathserver = '/home/www/public_html/dev/multilanguage/';
    fs.readFile(pathlocal+multilanguage[3]+'.json', 'utf8', function (err,data) {
  if (err) {
    return console.log(err);
  }
  var json = JSON.parse(data);
   console.log("is it work now?"+multilanguage[4]);
   console.log(json[multilanguage[4]]);
   
  /*var sensor_units_list = {sensor_units: Array()};
    for(var i = 0; i < rows.length; ++i){
        sensor_units_list.sensor_units.push(rows[i]);

    }*/
    res.contentType('application/json');
    res.setHeader("Access-Control-Allow-Origin", "*");
    res.send(JSON.stringify(data));
});




    
}

function other(req, res){
    res.send('Not found.');
}
