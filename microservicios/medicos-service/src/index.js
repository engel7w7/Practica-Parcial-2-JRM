require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const jwtMiddleware = require('./app/middleware/jwt');
const medicosRoutes = require('./app/routes/medicos');

// Express settings
const app = express();
app.set('port', process.env.PORT || 3002);

// Middlewares
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Routes
app.use('/api/v1/medicos', jwtMiddleware, medicosRoutes);

// Start server
const server = app.listen(app.get('port'), () => {
    console.log('Express server for Medicos escuchando on port ' + app.get('port'));
});

module.exports = server;
