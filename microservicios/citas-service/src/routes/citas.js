const express = require('express');
const citasController = require('../controllers/citasController');
const jwtMiddleware = require('../middleware/jwt');

const router = express.Router();

// Todas las rutas requieren JWT
router.use(jwtMiddleware);

router.get('/', citasController.getAllCitas);
router.get('/:id', citasController.getCitaById);
router.post('/', citasController.createCita);
router.put('/:id', citasController.updateCita);
router.delete('/:id', citasController.deleteCita);
router.get('/paciente/:paciente_id', citasController.getCitasByPaciente);
router.get('/medico/:medico_id', citasController.getCitasByMedico);

module.exports = router;
