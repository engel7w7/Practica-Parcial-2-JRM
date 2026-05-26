const jwt = require('jsonwebtoken');

const jwtMiddleware = (req, res, next) => {
    try {
        const token = req.headers.authorization?.split(' ')[1];

        if (!token) {
            return res.status(401).json({ message: 'Token no proporcionado' });
        }

        const decoded = jwt.verify(token, process.env.JWT_SECRET, {
            algorithms: [process.env.JWT_ALGORITHM]
        });

        req.user = decoded.data || decoded;
        next();
    } catch (error) {
        return res.status(401).json({
            message: 'Token inválido o expirado',
            error: error.message
        });
    }
};

module.exports = jwtMiddleware;
