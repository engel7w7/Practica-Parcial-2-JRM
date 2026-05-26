# Sistema de Gestión de Citas Médicas - COM350

## Descripción del proyecto

Este proyecto consiste en un sistema web diseñado para la gestión de citas médicas, el cual desarrollamos utilizando la versión 11 de Laravel. Su principal objetivo es facilitar la administración de médicos, pacientes y especialidades, ofreciendo a los usuarios una interfaz web moderna, intuitiva y completamente responsiva.

## Lo que hemos completado

### Módulo Administrativo (Laravel)
- Migraciones: Creamos las tablas necesarias para médicos, especialidades y pacientes.
- Modelos: Implementamos los modelos Medico, Especialidad y Paciente, incluyendo sus respectivas relaciones.
- Factories: Desarrollamos generadores de datos de prueba para agilizar el proceso de desarrollo en todas las tablas.
- Seeders: Configuramos datos iniciales que incluyen:
  - 5 especialidades médicas (Pediatría, Cardiología, Odontología, Ginecología y Medicina General).
  - 15 médicos que ya están asignados a diferentes especialidades.
  - 40 pacientes con datos de ejemplo.
  - 2 cuentas de usuario listas para realizar pruebas.
- Controladores: Implementamos la lógica para la gestión de datos en MedicoController, EspecialidadController y PacienteController.
- Vistas Blade: Construimos una interfaz completa que permite visualizar, crear, editar y eliminar registros de manera sencilla.
- Rutas REST: Definimos todos los recursos necesarios para el funcionamiento de la aplicación (index, create, store, show, edit, update, destroy).
- Base de Datos: Todo el sistema está configurado para trabajar con MySQL.

## Organización del proyecto

Así es como hemos estructurado los archivos principales de la aplicación:

```text
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

## Guía para empezar

### 1. ¿Qué necesitas?
Para ejecutar este proyecto, asegúrate de tener instalado:
- PHP en su versión 8.2 o superior.
- Laravel 11.
- MySQL 8.0 o una versión más reciente.
- Composer para la gestión de dependencias.

### 2. Pasos de instalación

Si quieres levantar el proyecto en tu entorno local, sigue estos pasos en tu terminal:

```bash
# Primero, clona el repositorio e ingresa a la carpeta del proyecto
cd citas-medicas

# Luego, instala las dependencias de PHP
composer install

# Crea tu archivo de configuración de entorno basándote en el ejemplo
cp .env.example .env

# Genera una nueva clave para la aplicación
php artisan key:generate

# No olvides configurar tu base de datos en el archivo .env:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=citas_medicas
# DB_USERNAME=root
# DB_PASSWORD=

# Finalmente, ejecuta las migraciones y carga los datos de prueba
php artisan migrate:fresh --seed
```

### 3. Puesta en marcha

Una vez instalado todo, puedes iniciar el servidor de desarrollo así:

```bash
php artisan serve

# Ahora podrás ver la aplicación ingresando a http://localhost:8000 desde tu navegador
```

## Información de prueba incluida

Para que puedas probar el sistema de inmediato, los seeders generarán los siguientes datos:

### Usuarios para acceder
- Administrador: admin@citas-medicas.com / password123
- Usuario de prueba: test@example.com / password123

### Especialidades
El sistema cuenta con 5 especialidades base:
1. Pediatría: Especialidad médica dedicada al diagnóstico y tratamiento de enfermedades en niños.
2. Cardiología: Especialidad que se ocupa del diagnóstico y tratamiento de enfermedades del corazón.
3. Odontología: Rama de la medicina que se dedica a la salud bucal y dental.
4. Ginecología: Especialidad médica que trata la salud reproductiva de las mujeres.
5. Medicina General: Atención médica general y consulta primaria para los pacientes.

### Médicos registrados
Se han incluido 15 médicos de prueba, cada uno asociado a una de las especialidades anteriores. Todos cuentan con información de contacto única y un estado activo.

### Pacientes de ejemplo
Encontrarás 40 pacientes con nombres, correos, teléfonos y direcciones generadas de forma aleatoria, además de diferentes fechas de nacimiento y clasificaciones entre pacientes nuevos o recurrentes.

## Rutas principales de la aplicación

Aquí tienes un resumen de las rutas configuradas en el sistema:

```text
Gestión de Médicos:
GET     /medicos              - Ver el listado completo de médicos
GET     /medicos/create       - Abrir el formulario para registrar un médico nuevo
POST    /medicos              - Guardar la información del nuevo médico
GET     /medicos/{id}         - Consultar los detalles de un médico específico
GET     /medicos/{id}/edit    - Abrir el formulario para modificar sus datos
PUT     /medicos/{id}         - Guardar los cambios realizados
DELETE  /medicos/{id}         - Eliminar al médico del sistema

Gestión de Especialidades:
GET     /especialidades              - Ver todas las especialidades
GET     /especialidades/create       - Formulario para una nueva especialidad
POST    /especialidades              - Registrar la especialidad
GET     /especialidades/{id}         - Ver información detallada
GET     /especialidades/{id}/edit    - Modificar la especialidad
PUT     /especialidades/{id}         - Guardar modificaciones
DELETE  /especialidades/{id}         - Eliminar la especialidad

Gestión de Pacientes:
GET     /pacientes              - Listado de pacientes
GET     /pacientes/create       - Formulario para registrar un paciente
POST    /pacientes              - Guardar el nuevo paciente
GET     /pacientes/{id}         - Consultar la información del paciente
GET     /pacientes/{id}/edit    - Modificar sus datos
PUT     /pacientes/{id}         - Actualizar la información
DELETE  /pacientes/{id}         - Dar de baja al paciente
```

## Diseño de la interfaz

- Framework CSS: Utilizamos Bootstrap 5 para el maquetado.
- Paleta de colores: Incorporamos gradientes modernos que van desde el púrpura al azul para darle un aspecto fresco.
- Diseño responsivo: Toda la plataforma está pensada para verse bien tanto en computadoras de escritorio como en dispositivos móviles.
- Componentes: Usamos tablas claras, formularios intuitivos, alertas descriptivas y etiquetas para facilitar la navegación.

## Estructura de la base de datos

### Tabla de especialidades
```sql
- id (bigint, llave primaria, autoincremental)
- nombre (varchar, único)
- descripcion (varchar, opcional)
- created_at, updated_at
```

### Tabla de médicos
```sql
- id (bigint, llave primaria, autoincremental)
- nombre_completo (varchar)
- especialidad_id (bigint, llave foránea hacia especialidades)
- telefono (varchar)
- email (varchar, único)
- estado (enum: activo/inactivo)
- created_at, updated_at
```

### Tabla de pacientes
```sql
- id (bigint, llave primaria, autoincremental)
- nombre_completo (varchar)
- email (varchar, único)
- telefono (varchar)
- direccion (varchar, opcional)
- fecha_nacimiento (date)
- tipo_paciente (enum: nuevo/recurrente)
- created_at, updated_at
```

## Operaciones de gestión (CRUD)

Para todas las entidades del sistema aseguramos las siguientes funcionalidades:
- Visualización mediante tablas responsivas.
- Creación de registros a través de formularios con validación.
- Vistas de detalle con toda la información pertinente.
- Edición con carga previa de los datos actuales.
- Eliminación segura con pasos de confirmación.

## Principales características

- Interfaz moderna construida sobre Bootstrap 5.
- Formularios seguros con validación tanto del lado del cliente como del servidor.
- Tablas adaptables que se ven perfectas en pantallas pequeñas.
- Sistema de migas de pan (breadcrumbs) para que los usuarios no se pierdan al navegar.
- Notificaciones claras cuando las acciones son exitosas o cuando ocurre algún error.
- Relaciones de base de datos bien definidas para mantener la integridad de la información.
- Seeders que inyectan datos de prueba muy parecidos a los que se usarían en la vida real.

## Algunas notas sobre el desarrollo

- Para generar información falsa que pareciera real durante las pruebas, utilizamos la librería Faker en nuestros seeders.
- Todas nuestras migraciones respetan las convenciones de nombres y estructura recomendadas por Laravel.
- Los modelos aprovechan las relaciones de Eloquent para facilitar las consultas.
- Diseñamos las vistas pensando en que fueran modulares y fáciles de reutilizar.
- Cuidamos que el código fuente cumpla con los estándares PSR-12, manteniendo el estilo característico de Laravel.

---

**Práctica Parcial - COM350**
Desarrollado en mayo de 2026.
