//var controllers = require('./controllers');

controllers = {};

controllers.balises         = require('./controllers/balises.js');
controllers.stations        = require('./controllers/stations.js');
controllers.sensors_units   = require('./controllers/sensor_unit.js');
controllers.sensors         = require('./controllers/sensor.js');
controllers.mesures         = require('./controllers/mesures.js');
controllers.sensors_alerts  = require('./controllers/sensors_alerts.js');
controllers.latlong         = require('./controllers/latlong.js');
controllers.multilanguage   = require('./controllers/multilanguage.js');

var express = require('express');
var app = express();

var bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({
	extended: true
}));

app.use('/', express.static(__dirname));

app.get('/api/balises',         controllers.balises       );
app.get('/api/stations',        controllers.stations      );
app.get('/api/sensor_unit',     controllers.sensors_units );
app.get('/api/sensor_unit/*',   controllers.sensors_units );
app.get('/api/sensors',         controllers.sensors       );
app.get('/api/sensors/*',       controllers.sensors       );
app.get('/api/measures/*',      controllers.mesures       );
app.get('/api/sensors_alerts',  controllers.sensors_alerts);
app.get('/api/latlong/*',       controllers.latlong);
app.get('/api/multilanguage/*', controllers.multilanguage);


        
app.listen(8080);
console.log('now listen on Port:8080');
