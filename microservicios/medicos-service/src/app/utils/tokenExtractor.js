const jwt = require('jsonwebtoken');

function extractSanctumToken(authHeader) {
    if (!authHeader) return null;
    
    const parts = authHeader.split(' ');
    if (parts.length !== 2 || parts[0] !== 'Bearer') {
        return null;
    }
    
    const token = parts[1];
    
    try {
        const decoded = jwt.verify(token, process.env.JWT_SECRET, {
            algorithms: [process.env.JWT_ALGORITHM || 'HS256']
        });
        
        return decoded.sanctum_token;
    } catch (error) {
        console.error('Error decoding JWT:', error.message);
        return null;
    }
}

module.exports = { extractSanctumToken };
