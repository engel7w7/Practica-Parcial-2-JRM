# Sistema de Gestión de Citas Médicas - COM350

## 📋 Descripción

Sistema web de gestión de citas médicas desarrollado con Laravel 11. Permite administrar médicos, pacientes y especialidades con una interfaz web moderna y responsiva.

## ✅ Requisitos Completados

### Módulo Administrativo (Laravel)
- ✅ **Migraciones**: Tablas de médicos, especialidades y pacientes
- ✅ **Modelos**: Medico, Especialidad, Paciente con relaciones
- ✅ **Factories**: Generadores de datos de prueba para todas las tablas
- ✅ **Seeders**: 
  - 5 especialidades predefinidas (Pediatría, Cardiología, Odontología, Ginecología, Medicina General)
  - 15 médicos asociados a diferentes especialidades
  - 40 pacientes de ejemplo
  - 2 usuarios para pruebas
- ✅ **Controladores CRUD**: MedicoController, EspecialidadController, PacienteController
- ✅ **Vistas Blade**: Interfaz completa para listar, crear, editar y eliminar
- ✅ **Rutas REST**: Recursos completos (index, create, store, show, edit, update, destroy)
- ✅ **Base de Datos**: Configurada con MySQL

## 🗂️ Estructura del Proyecto

```
app/
├── Http/
│   └── Controllers/
│       ├── MedicoController.php
│       ├── EspecialidadController.php
│       └── PacienteController.php
├── Models/
│   ├── Medico.php
│   ├── Especialidad.php
│   └── Paciente.php

database/
├── migrations/
│   ├── 2026_05_19_160500_create_especialidades_table.php
│   ├── 2026_05_19_160551_create_medicos_table.php
│   └── 2026_05_19_160617_create_pacientes_table.php
├── factories/
│   ├── MedicoFactory.php
│   ├── EspecialidadFactory.php
│   └── PacienteFactory.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── EspecialidadSeeder.php
    ├── MedicoSeeder.php
    └── PacienteSeeder.php

resources/views/
├── layouts/
│   └── app.blade.php (Layout base con Bootstrap 5)
├── medicos/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── especialidades/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── pacientes/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php
```

## 🚀 Instalación y Ejecución

### 1. Requisitos
- PHP 8.2+
- Laravel 11
- MySQL 8.0+
- Composer

### 2. Instalación

```bash
# Clonar el repositorio (si es necesario)
cd citas-medicas

# Instalar dependencias
composer install

# Crear archivo .env (si no existe)
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Configurar base de datos en .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=citas_medicas
# DB_USERNAME=root
# DB_PASSWORD=

# Ejecutar migraciones y seeders
php artisan migrate:fresh --seed
```

### 3. Ejecutar la aplicación

```bash
# Iniciar servidor de desarrollo
php artisan serve

# La aplicación estará disponible en http://localhost:8000
```

## 📊 Datos de Prueba

Después de ejecutar los seeders, el sistema incluye:

### Usuarios
- **Admin**: admin@citas-medicas.com / password123
- **Test**: test@example.com / password123

### Especialidades (5)
1. Pediatría - Especialidad médica dedicada al diagnóstico y tratamiento de enfermedades en niños.
2. Cardiología - Especialidad que se ocupa del diagnóstico y tratamiento de enfermedades del corazón.
3. Odontología - Rama de la medicina que se dedica a la salud bucal y dental.
4. Ginecología - Especialidad médica que trata la salud reproductiva de las mujeres.
5. Medicina General - Atención médica general y consulta de primaria para los pacientes.

### Médicos (15)
- Todos asociados a las especialidades mencionadas
- Con teléfono, email único y estado activo

### Pacientes (40)
- Nombres, emails, teléfonos, direcciones generadas aleatoriamente
- Fechas de nacimiento variadas
- Tipos: nuevo y recurrente (distribuidos aleatoriamente)

## 🌐 Rutas Principales

```
Médicos:
GET     /medicos              - Listar todos los médicos
GET     /medicos/create       - Formulario para crear médico
POST    /medicos              - Guardar nuevo médico
GET     /medicos/{id}         - Ver detalles del médico
GET     /medicos/{id}/edit    - Formulario para editar
PUT     /medicos/{id}         - Actualizar médico
DELETE  /medicos/{id}         - Eliminar médico

Especialidades:
GET     /especialidades              - Listar especialidades
GET     /especialidades/create       - Crear especialidad
POST    /especialidades              - Guardar especialidad
GET     /especialidades/{id}         - Ver detalles
GET     /especialidades/{id}/edit    - Editar
PUT     /especialidades/{id}         - Actualizar
DELETE  /especialidades/{id}         - Eliminar

Pacientes:
GET     /pacientes              - Listar pacientes
GET     /pacientes/create       - Crear paciente
POST    /pacientes              - Guardar paciente
GET     /pacientes/{id}         - Ver detalles
GET     /pacientes/{id}/edit    - Editar
PUT     /pacientes/{id}         - Actualizar
DELETE  /pacientes/{id}         - Eliminar
```

## 🎨 Diseño

- **Framework CSS**: Bootstrap 5
- **Colores**: Gradientes modernos (púrpura a azul)
- **Responsivo**: Optimizado para dispositivos móviles
- **Componentes**: Tablas, formularios, alerts, badges

## 🗄️ Estructura de Base de Datos

### Tabla: especialidades
```sql
- id (bigint, PK, auto_increment)
- nombre (varchar, unique)
- descripcion (varchar, nullable)
- created_at, updated_at
```

### Tabla: medicos
```sql
- id (bigint, PK, auto_increment)
- nombre_completo (varchar)
- especialidad_id (bigint, FK -> especialidades)
- telefono (varchar)
- email (varchar, unique)
- estado (enum: activo/inactivo)
- created_at, updated_at
```

### Tabla: pacientes
```sql
- id (bigint, PK, auto_increment)
- nombre_completo (varchar)
- email (varchar, unique)
- telefono (varchar)
- direccion (varchar, nullable)
- fecha_nacimiento (date)
- tipo_paciente (enum: nuevo/recurrente)
- created_at, updated_at
```

## 🔄 Operaciones CRUD

Todas las entidades soportan:
- **Listar** con tabla responsiva
- **Crear** con formularios validados
- **Ver** detalles con información completa
- **Editar** con valores preformados
- **Eliminar** con confirmación

## 💡 Características

✨ **Interfaz moderna** con Bootstrap 5
✨ **Formularios validados** en servidor y cliente
✨ **Tabla responsiva** para dispositivos móviles
✨ **Breadcrumbs** y navegación clara
✨ **Mensajes de éxito** y error
✨ **Relaciones de BD** implementadas correctamente
✨ **Seeders con datos realistas** para pruebas

## 📝 Notas de Desarrollo

- Los seeders usan Faker para generar datos realistas
- Las migraciones siguen la convención de Laravel
- Los modelos incluyen relaciones Eloquent
- Las vistas son reutilizables y extensibles
- El código sigue estándares PSR-12 de Laravel

## 🎯 Próximas Mejoras

- [ ] Implementar autenticación completa con roles
- [ ] API REST para microservicios
- [ ] Sistema de citas
- [ ] Reportes y estadísticas
- [ ] Notificaciones por email

---

**Práctica Parcial - COM350**  
**Desarrollado en**: Mayo 2026
