require('dotenv').config();
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const jwtMiddleware = require('./middleware/jwt');
const citasRoutes = require('./routes/citas');

const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Construir URI de MongoDB a partir de variables
let mongodbUri = process.env.MONGODB_URI;
if (!mongodbUri) {
  const user = process.env.MONGODB_USER;
  const pass = process.env.MONGODB_PASSWORD;
  const host = process.env.MONGODB_HOST || 'localhost';
  const port = process.env.MONGODB_PORT || 27017;
  const db = process.env.MONGODB_DATABASE || 'citas_db';
  
  if (user && pass) {
    mongodbUri = `mongodb://${user}:${pass}@${host}:${port}/${db}?authSource=admin`;
  } else {
    mongodbUri = `mongodb://${host}:${port}/${db}`;
  }
}

// Conectar a MongoDB
mongoose.connect(mongodbUri)
    .then(() => console.log('Conectado a MongoDB'))
    .catch(err => console.error('Error de conexión a MongoDB:', err));

// Rutas
app.use('/api/v1/citas', jwtMiddleware, citasRoutes);

// Health check
app.get('/', (req, res) => {
    res.json({ status: 'Citas Service OK', timestamp: new Date().toISOString() });
});

module.exports = app;
