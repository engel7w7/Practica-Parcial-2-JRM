# Microservicios - Gestión de Citas Médicas

Sistema de 3 microservicios en Node.js con arquitectura de proxy inverso usando Nginx.

## Estructura

```
microservicios/
├── auth-service/          # Autenticación JWT - Puerto 3001
│   ├── src/
│   │   ├── app.js
│   │   ├── server.js
│   │   ├── controllers/
│   │   ├── routes/
│   │   └── middleware/
│   ├── package.json
│   └── Dockerfile
├── medicos-service/       # CRUD de médicos - Puerto 3002
│   ├── src/
│   │   ├── app.js
│   │   ├── server.js
│   │   ├── controllers/
│   │   ├── routes/
│   │   └── middleware/
│   ├── package.json
│   └── Dockerfile
├── citas-service/         # Gestión de citas - Puerto 3003
│   ├── src/
│   │   ├── app.js
│   │   ├── server.js
│   │   ├── models/
│   │   ├── controllers/
│   │   ├── routes/
│   │   └── middleware/
│   ├── package.json
│   └── Dockerfile
├── nginx/
│   └── nginx.conf         # Proxy inverso - Puerto 80
├── docker-compose.yml     # Orquestación de servicios
└── README.md
```

## Requisitos

- Docker y Docker Compose instalados
- Node.js 20.18.0+ (para desarrollo local)
- MongoDB 6+ (incluido en docker-compose)

## Instalación

### Con Docker Compose (Recomendado)

```bash
# Construir y ejecutar todos los servicios
docker-compose up --build

# En modo detached
docker-compose up -d --build

# Ver logs en tiempo real
docker-compose logs -f

# Detener servicios
docker-compose down
```

### Desarrollo Local

```bash
# Instalar dependencias de cada servicio
npm install --prefix auth-service
npm install --prefix medicos-service
npm install --prefix citas-service

# Ejecutar cada servicio en terminales diferentes
npm start --prefix auth-service
npm start --prefix medicos-service
npm start --prefix citas-service
```

## Rutas API

### A través de Nginx (Recomendado)
- **Gateway**: `http://localhost`
- **Auth**: `http://localhost/api/v1/auth`
- **Médicos**: `http://localhost/api/v1/medicos`
- **Citas**: `http://localhost/api/v1/citas`

### Acceso Directo a Servicios
- **Auth Service**: `http://localhost:3001`
- **Medicos Service**: `http://localhost:3002`
- **Citas Service**: `http://localhost:3003`
- **MongoDB**: `mongodb://localhost:27017` (usuario: admin, contraseña: password123)

## Endpoints Principales

### Auth Service (`/api/v1/auth`)
- `POST /login` - Autenticar usuario
- `GET /verify` - Verificar token

### Medicos Service (`/api/v1/medicos`)
- `GET /` - Obtener todos los médicos
- `GET /:id` - Obtener médico por ID
- `POST /` - Crear nuevo médico
- `PUT /:id` - Actualizar médico
- `DELETE /:id` - Eliminar médico

### Citas Service (`/api/v1/citas`)
- `GET /` - Obtener todas las citas
- `GET /:id` - Obtener cita por ID
- `POST /` - Crear nueva cita
- `PUT /:id` - Actualizar cita
- `DELETE /:id` - Eliminar cita
- `GET /paciente/:paciente_id` - Citas de un paciente
- `GET /medico/:medico_id` - Citas de un médico

## Variables de Entorno

Configuradas en `docker-compose.yml`:

```yaml
PORT=3001|3002|3003           # Puerto del servicio
JWT_SECRET=secret_key...      # Clave secreta JWT
JWT_ALGORITHM=HS256           # Algoritmo JWT
MONGODB_URI=mongodb://...     # URI de MongoDB (solo citas-service)
```

## Arquitectura

```
┌─────────────────┐
│   Cliente       │
└────────┬────────┘
         │ HTTP (Puerto 80)
         ▼
    ┌──────────────┐
    │   Nginx      │ (Reverse Proxy)
    └──────────────┘
    ┌──────────────────────────────────────┐
    │                                      │
    ▼             ▼               ▼
┌──────────┐ ┌──────────┐  ┌──────────┐
│ Auth     │ │ Medicos  │  │ Citas    │
│ Service  │ │ Service  │  │ Service  │
│ :3001    │ │ :3002    │  │ :3003    │
└──────────┘ └──────────┘  └──────────┘
                              │
                              ▼
                         ┌──────────┐
                         │ MongoDB  │
                         │ :27017   │
                         └──────────┘
```

## Testing con Insomnia

Importar `Insomnia_Collection.json` para probar los endpoints de los microservicios.
├── nginx/
│   └── nginx.conf         # Configuración proxy inverso
└── docker-compose.yml     # Orquestación de servicios
```

## Servicios

### 1. Auth Service (Puerto 3001)
- **POST /api/auth/login**: Login con email/password
- **GET /api/auth/verify**: Verificar token JWT

### 2. Medicos Service (Puerto 3002)
- **GET /api/medicos**: Listar médicos (protegido)
- **GET /api/medicos/:id**: Obtener médico (protegido)
- **POST /api/medicos**: Crear médico (protegido)
- **PUT /api/medicos/:id**: Actualizar médico (protegido)
- **DELETE /api/medicos/:id**: Eliminar médico (protegido)

### 3. Citas Service (Puerto 3003)
- **GET /api/citas**: Listar citas (protegido)
- **GET /api/citas/:id**: Obtener cita (protegido)
- **POST /api/citas**: Crear cita (protegido)
- **PUT /api/citas/:id**: Actualizar cita (protegido)
- **DELETE /api/citas/:id**: Eliminar cita (protegido)
- **GET /api/citas/paciente/:paciente_id**: Citas del paciente
- **GET /api/citas/medico/:medico_id**: Citas del médico

## Ejecución

### Opción 1: Con Docker Compose (Recomendado)

```bash
cd microservicios
docker-compose up --build
```

Esto levantará:
- Auth Service en http://localhost:3001 (directo)
- Medicos Service en http://localhost:3002 (directo)
- Citas Service en http://localhost:3003 (directo)
- MongoDB en :27017
- **Nginx en http://localhost:80** (proxy reverso)

### Opción 2: Local (sin Docker)

```bash
# Auth Service
cd auth-service
npm install
npm start

# Medicos Service (otra terminal)
cd medicos-service
npm install
npm start

# Citas Service (otra terminal)
cd citas-service
npm install
npm start
```

## Pruebas con Curl

### 1. Login
```bash
curl -X POST http://localhost:80/auth/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@citas-medicas.com","password":"password123"}'
```

### 2. Obtener token (respuesta de login)
```bash
TOKEN="eyJ0eXAiOiJKV1QiLCJhbGc..."
```

### 3. Listar médicos (con token)
```bash
curl -X GET http://localhost:80/medicos/api/medicos \
  -H "Authorization: Bearer $TOKEN"
```

### 4. Crear cita
```bash
curl -X POST http://localhost:80/citas/api/citas \
  -H "Authorization: Bearer $TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "medico_id": 1,
    "paciente_id": 1,
    "fecha_cita": "2026-05-25T10:00:00",
    "hora_cita": "10:00",
    "estado": "programada",
    "costo": 100
  }'
```

## Rutas a través de Nginx (Puerto 80)

| Servicio | Ruta | Puerto Directo |
|----------|------|---|
| Auth | http://localhost:80/auth/ | :3001 |
| Médicos | http://localhost:80/medicos/ | :3002 |
| Citas | http://localhost:80/citas/ | :3003 |

## Variables de Entorno

Cada servicio tiene un archivo `.env.example`:

- **JWT_SECRET**: Clave secreta para firmar tokens
- **JWT_ALGORITHM**: Algoritmo de JWT (HS256)
- **MONGODB_URI**: Conexión a MongoDB (solo citas-service)
- **LARAVEL_API**: URL del monolito Laravel

## Tecnologías

- **Express.js**: Framework Node.js
- **JWT (Firebase)**: Autenticación
- **Mongoose**: ODM para MongoDB
- **Nginx**: Proxy inverso
- **Docker & Docker Compose**: Containerización
