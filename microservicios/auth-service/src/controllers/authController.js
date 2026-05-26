const jwt = require('jsonwebtoken');
const axios = require('axios');

const generateToken = (user) => {
    const payload = {
        user_id: user.id,
        email: user.email,
        name: user.name,
        data: {
            id: user.id,
            email: user.email,
            name: user.name
        }
    };

    return jwt.sign(payload, process.env.JWT_SECRET, {
        algorithm: process.env.JWT_ALGORITHM,
        expiresIn: '24h'
    });
};

exports.login = async (req, res) => {
    try {
        const { email, password } = req.body;

        if (!email || !password) {
            return res.status(400).json({ message: 'Email y contraseña requeridos' });
        }

        const response = await axios.post(`${process.env.LARAVEL_API}/api/login`, {
            email,
            password
        });

        if (response.status === 200) {
            const user = response.data.user;
            const token = generateToken(user);

            return res.status(200).json({
                message: 'Login exitoso',
                token,
                user
            });
        }
    } catch (error) {
        return res.status(401).json({
            message: 'Credenciales inválidas',
            error: error.message
        });
    }
};

exports.verify = (req, res) => {
    try {
        const token = req.headers.authorization?.split(' ')[1];

        if (!token) {
            return res.status(401).json({ message: 'Token no proporcionado' });
        }

        const decoded = jwt.verify(token, process.env.JWT_SECRET, {
            algorithms: [process.env.JWT_ALGORITHM]
        });

        return res.status(200).json({
            message: 'Token válido',
            user: decoded
        });
    } catch (error) {
        return res.status(401).json({
            message: 'Token inválido o expirado',
            error: error.message
        });
    }
};
