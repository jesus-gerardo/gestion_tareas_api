# PRUEBA TÉCNICA DESARROLLADOR FULLSTACK HANNAH SOFTWARE

configuracion del equipo
* php 8.1.10
* mysql 8.4

requisitos previos
* ejecutar comando composer install
* configurar las variables de entornos
* ejecutar comando: php artisan key:generate
* ejecutar comando: php artisan migrate:fresh --seed 
* ejecutar comando: php artisan storage:link
* ejecutar comando: php artisan serve

claves de acceso
* usuario: admin@mail.com
* contraseña: 1 

Aplicación: Una aplicación de gestión de tareas (ToDo List)

Requisitos
• Backend (Laravel):

o API REST:

▪ Crear un modelo de Tarea con los siguientes campos como mínimo, título, descripción,
estado (pendiente, en progreso, completada), fecha de creación y fecha de vencimiento.
▪ Implementar CRUD completo para las tareas (crear, leer, actualizar, eliminar) a través de
controladores y rutas.

▪ Utilizar Eloquent para la interacción con la base de datos.

▪ Implementar autenticación básica (token-based) para proteger la API.

▪ Validar los datos de entrada en los controladores.

o Backend:

o Agregar columnas a la tabla Tareas para reordenar los registros

• Ambos: Agregar carga y/o actualización de una imagen por tarea.