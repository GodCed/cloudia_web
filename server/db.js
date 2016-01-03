//mysql -u USERNAME -p -h localhost YOUR-DATA-BASE-NAME-HERE < YOUR-.SQL.FILE-NAME-HERE
var db = require('mysql');
var config = require('./config');

module.exports = db.createConnection({
    host: config.db_host,
    port: config.db_port,
    user: config.db_user,
    password: config.db_password,
    database: config.db_name
});
