# Solución Prueba SenaSoft
PDF: https://drive.google.com/file/d/1XcmbOt7LukHsSrco-NG4RvJenZGKbK8M/view?usp=sharing

Para probar funcionamiento seguir los pasos.

    git clone https://github.com/AriasCamilaA/SenaSoft.git

Descargar las dependencias

    composer install

Ejecuta la base de datos que se encuentra en el database/senasoft_db.sql

Archivo para que funcione la conexión con la bd y demás configuraciones de entorno

    copy .env.example .env

Abrir el archivo .env credenciales de la bd

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=senasoft_db
        DB_USERNAME=root
        DB_PASSWORD=


Generar clave

    php artisan key:generate


Encender el servidor

    php artisan serve

Los usuarios que estan en la base de datos para que puedas loguearte son:

    Usuario:Vendedor
    Contrseña:12345678

    Usuario:Comprador
    Contrseña:12345678

    Usuario:CompradorVendedor
    Contrseña:12345678

