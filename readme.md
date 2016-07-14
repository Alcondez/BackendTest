# Asignación Backend PHP 

## Solucuión Propuesta (Haciendo uso del framework Laravel)

Se plantea la creación de tres modelos: 

	- Usuario (User.php)
	- Establecimiento (Hotel.php)
	- Habitacion (Room.php)

y sus respectivos controladores:
	
	- Usuario (AuthController.php)
	- Establecimiento (HotelsController.php)
	- Habitacion (RoomsController.php)

Con las siguientes Relaciones:
	
	- 1:N Entre Usuario y Establecimiento
	- 1:N Entre Establecimiento y Habitacion
	(Diagramas en la carpeta Docs)

## Demo

http://backenddev.herokuapp.com/

## Para Pruebas Locales

Requerimientos:

PHP >= 5.5.9
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension

Ejecutar por consola "php artisan serve" desde la raiz del projecto

Ajustar las variables para la conexion a la base de datos en el archivo .env
