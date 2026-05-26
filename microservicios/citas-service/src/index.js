const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const jwtMiddleware = require('./app/middleware/jwt');
const citasRoutes = require('./app/routes/citas');

// Express settings
const app = express();
app.set('port', process.env.PORT || 3003);

// Middlewares
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Conectar a MongoDB
const mongodbUri = process.env.MONGODB_URI || 
  `mongodb://${process.env.MONGODB_USER}:${process.env.MONGODB_PASSWORD}@${process.env.MONGODB_HOST}:${process.env.MONGODB_PORT}/${process.env.MONGODB_DATABASE}?authSource=admin`;

mongoose.connect(mongodbUri)
    .then(() => console.log('✅ Conectado a MongoDB'))
    .catch(err => console.error('❌ Error de conexión a MongoDB:', err));

// Routes
app.use('/api/v1/citas', jwtMiddleware, citasRoutes);

// Start server
const server = app.listen(app.get('port'), () => {
    console.log('Express server for Citas escuchando on port ' + app.get('port'));
});

module.exports = server;
