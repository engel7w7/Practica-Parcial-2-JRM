const express = require('express');
const bodyParser = require('body-parser');
const jwtMiddleware = require('./middleware/jwt');
const medicosRoutes = require('./routes/medicos');

const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Rutas
app.use('/api/v1/medicos', jwtMiddleware, medicosRoutes);

// Health check
app.get('/', (req, res) => {
    res.json({ status: 'Medicos Service OK', timestamp: new Date().toISOString() });
});

module.exports = app;
