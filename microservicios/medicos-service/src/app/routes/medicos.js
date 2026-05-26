const express = require('express');
const medicosController = require('../controllers/medicosController');

const router = express.Router();

router.get('/', medicosController.getAllMedicos);
router.get('/:id', medicosController.getMedicoById);
router.post('/', medicosController.createMedico);
router.put('/:id', medicosController.updateMedico);
router.delete('/:id', medicosController.deleteMedico);

module.exports = router;
