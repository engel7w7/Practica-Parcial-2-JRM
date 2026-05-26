const app = require('./app');
const port = process.env.PORT || 3002;

const server = app.listen(port, function() {
    console.log('Express server for Medicos escuchando on port ' + port);
});

module.exports = server;
