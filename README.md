# Evaluacion3IgnacioMolina
# Introducción
Para la instalación del proyecto se necesita:

    composer install
    php artisan key:generate

Crear una base de datos en MySQL con el nombre que se desee.
Luego de eso, modificar las credenciales de la base de datos en el .env:

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT="puerto"
    DB_DATABASE="nombre de la base de datos"
    DB_USERNAME=root
    DB_PASSWORD="contraseña"
```

Finalmente en la consola ejecutar el siguiente comando para migrar la base de datos junto con las semillas:

```bash
    php artisan migrate --seed
```

Y para ejecutar el proyecto:

```bash
   php artisan serve --host=0.0.0.0
```
