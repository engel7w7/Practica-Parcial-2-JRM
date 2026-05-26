const Cita = require('../models/Cita');

exports.getAllCitas = async (req, res) => {
    try {
        const citas = await Cita.find();
        return res.status(200).json(citas);
    } catch (error) {
        return res.status(500).json({
            message: 'Error al obtener citas',
            error: error.message
        });
    }
};

exports.getCitaById = async (req, res) => {
    try {
        const { id } = req.params;
        const cita = await Cita.findById(id);

        if (!cita) {
            return res.status(404).json({ message: 'Cita no encontrada' });
        }

        return res.status(200).json(cita);
    } catch (error) {
        return res.status(500).json({
            message: 'Error al obtener cita',
            error: error.message
        });
    }
};

exports.createCita = async (req, res) => {
    try {
        const { medico_id, paciente_id, fecha_cita, hora_cita, estado, observaciones, costo } = req.body;

        const nuevaCita = new Cita({
            medico_id,
            paciente_id,
            fecha_cita,
            hora_cita,
            estado: estado || 'programada',
            observaciones,
            costo
        });

        await nuevaCita.save();
        return res.status(201).json({
            message: 'Cita creada exitosamente',
            data: nuevaCita
        });
    } catch (error) {
        return res.status(500).json({
            message: 'Error al crear cita',
            error: error.message
        });
    }
};

exports.updateCita = async (req, res) => {
    try {
        const { id } = req.params;
        const update = req.body;
        update.updatedAt = Date.now();

        const citaActualizada = await Cita.findByIdAndUpdate(id, update, { new: true });

        if (!citaActualizada) {
            return res.status(404).json({ message: 'Cita no encontrada' });
        }

        return res.status(200).json({
            message: 'Cita actualizada',
            data: citaActualizada
        });
    } catch (error) {
        return res.status(500).json({
            message: 'Error al actualizar cita',
            error: error.message
        });
    }
};

exports.deleteCita = async (req, res) => {
    try {
        const { id } = req.params;
        const citaEliminada = await Cita.findByIdAndDelete(id);

        if (!citaEliminada) {
            return res.status(404).json({ message: 'Cita no encontrada' });
        }

        return res.status(200).json({
            message: 'Cita eliminada',
            data: citaEliminada
        });
    } catch (error) {
        return res.status(500).json({
            message: 'Error al eliminar cita',
            error: error.message
        });
    }
};

exports.getCitasByPaciente = async (req, res) => {
    try {
        const { paciente_id } = req.params;
        const citas = await Cita.find({ paciente_id });

        return res.status(200).json(citas);
    } catch (error) {
        return res.status(500).json({
            message: 'Error al obtener citas del paciente',
            error: error.message
        });
    }
};

exports.getCitasByMedico = async (req, res) => {
    try {
        const { medico_id } = req.params;
        const citas = await Cita.find({ medico_id });

        return res.status(200).json(citas);
    } catch (error) {
        return res.status(500).json({
            message: 'Error al obtener citas del médico',
            error: error.message
        });
    }
};
