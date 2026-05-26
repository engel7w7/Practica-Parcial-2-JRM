const app = require('./app');
const port = process.env.PORT || 3001;

const server = app.listen(port, function() {
    console.log('Express server for Auth escuchando on port ' + port);
});

module.exports = server;
