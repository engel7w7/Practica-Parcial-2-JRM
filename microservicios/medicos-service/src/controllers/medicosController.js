const axios = require('axios');

exports.getAllMedicos = async (req, res) => {
    try {
        const response = await axios.get(`${process.env.LARAVEL_API}/api/medicos`, {
            headers: {
                Authorization: req.headers.authorization
            }
        });

        return res.status(200).json(response.data);
    } catch (error) {
        return res.status(error.response?.status || 500).json({
            message: 'Error al obtener médicos',
            error: error.message
        });
    }
};

exports.getMedicoById = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.get(`${process.env.LARAVEL_API}/api/medicos/${id}`, {
            headers: {
                Authorization: req.headers.authorization
            }
        });

        return res.status(200).json(response.data);
    } catch (error) {
        return res.status(error.response?.status || 500).json({
            message: 'Error al obtener médico',
            error: error.message
        });
    }
};

exports.createMedico = async (req, res) => {
    try {
        const response = await axios.post(`${process.env.LARAVEL_API}/api/medicos`, req.body, {
            headers: {
                Authorization: req.headers.authorization
            }
        });

        return res.status(201).json(response.data);
    } catch (error) {
        return res.status(error.response?.status || 500).json({
            message: 'Error al crear médico',
            error: error.message
        });
    }
};

exports.updateMedico = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.put(`${process.env.LARAVEL_API}/api/medicos/${id}`, req.body, {
            headers: {
                Authorization: req.headers.authorization
            }
        });

        return res.status(200).json(response.data);
    } catch (error) {
        return res.status(error.response?.status || 500).json({
            message: 'Error al actualizar médico',
            error: error.message
        });
    }
};

exports.deleteMedico = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.delete(`${process.env.LARAVEL_API}/api/medicos/${id}`, {
            headers: {
                Authorization: req.headers.authorization
            }
        });

        return res.status(200).json(response.data);
    } catch (error) {
        return res.status(error.response?.status || 500).json({
            message: 'Error al eliminar médico',
            error: error.message
        });
    }
};
