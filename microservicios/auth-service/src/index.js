require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const authRoutes = require('./app/routes/auth');

// Express settings
const app = express();
app.set('port', process.env.PORT || 3001);

// Middlewares
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Routes
app.use('/api/v1/auth', authRoutes);

// Start server
const server = app.listen(app.get('port'), () => {
    console.log('Express server for Auth escuchando on port ' + app.get('port'));
});

module.exports = server;
