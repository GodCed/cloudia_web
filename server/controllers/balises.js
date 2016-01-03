var connection = require('../db');


module.exports = function (req, res) {
    if(req.method == 'GET') {
        get(req, res);
    } else {
        other(req, res);
    }
};

function get(req, res){
    console.log(connection);
    connection.query('SELECT * from balises', function(err, rows, fields) {
        if(!err) {
            var name_list = {balises: Array()};
            for(var i = 0; i < rows.length; ++i)
                name_list.balises.push(rows[i]);
            
            res.contentType('application/json');
            res.setHeader("Access-Control-Allow-Origin", "*");
            res.send(JSON.stringify(name_list));
        } else {
            res.send(err.toString());
            console.log(err.toString());
        }
    });
}

function other(req, res){
    res.send('Not found.');
}
