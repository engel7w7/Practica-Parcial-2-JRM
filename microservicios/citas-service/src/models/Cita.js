const mongoose = require('mongoose');

const citaSchema = new mongoose.Schema({
    medico_id: {
        type: Number,
        required: true
    },
    paciente_id: {
        type: Number,
        required: true
    },
    fecha_cita: {
        type: Date,
        required: true
    },
    hora_cita: {
        type: String,
        required: true
    },
    estado: {
        type: String,
        enum: ['programada', 'atendida', 'cancelada'],
        default: 'programada'
    },
    observaciones: {
        type: String,
        default: ''
    },
    costo: {
        type: Number,
        default: 0
    },
    createdAt: {
        type: Date,
        default: Date.now
    },
    updatedAt: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model('Cita', citaSchema);
