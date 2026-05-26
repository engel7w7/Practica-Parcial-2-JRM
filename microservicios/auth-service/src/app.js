const express = require('express');
const bodyParser = require('body-parser');
const authRoutes = require('./routes/auth');

const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Rutas
app.use('/api/v1/auth', authRoutes);

// Health check
app.get('/', (req, res) => {
    res.json({ status: 'Auth Service OK', timestamp: new Date().toISOString() });
});

module.exports = app;
