# Registro de Fiscales del Partido Movimiento Semilla

Este software desarrollado con Laravel 10, PHP 8.1 y MariaDB se encarga de administrar el registro de fiscales para el partido político Movimiento Semilla. El sistema cuenta con una licencia MIT, lo que permite su uso y modificación libremente.

## Características principales

1. Registro de usuarios y validación de correos electrónicos: Los fiscales interesados pueden registrarse en el sistema proporcionando sus datos personales y una dirección de correo electrónico válida. El sistema verifica la autenticidad de las direcciones de correo electrónico para garantizar la validez de los registros.

2. Base de datos de fiscales y mesas de votación: El sistema almacena los datos de los fiscales registrados y también cuenta con información sobre las 25,000 mesas de votación. Esto permite una gestión centralizada de los fiscales asignados a cada mesa.

3. Georeferenciación de mesas de votación: Las mesas de votación registradas en el sistema pueden ser georeferenciadas para visualizar su ubicación en un mapa. Esto facilita la identificación y seguimiento de las mesas de votación en diferentes áreas geográficas.

4. Generación de acreditaciones de fiscales: El sistema permite generar acreditaciones para los fiscales registrados. Estas acreditaciones pueden ser impresas o descargadas en formato digital, lo que facilita la identificación de los fiscales durante el proceso electoral.

5. Verificación en línea de acreditaciones: Para garantizar la autenticidad de las acreditaciones de fiscales, el sistema proporciona una función de verificación en línea. Esto permite a las autoridades electorales y a los interesados confirmar la validez de una acreditación a través de un proceso de verificación seguro.

## Instalación y configuración

1. Clonar el repositorio desde GitHub: git clone <URL_DEL_REPOSITORIO>.
2. Asegurarse de tener instalado PHP 8.1 y MariaDB en el servidor.
3. Ejecutar el comando composer install para instalar las dependencias del proyecto.
4. Configurar la conexión a la base de datos en el archivo .env.
5. Ejecutar las migraciones de la base de datos con el comando php artisan migrate.
6. Configurar el servidor web para apuntar al directorio public del proyecto.

## Contribuciones

Si deseas contribuir a este proyecto, te invitamos a seguir los siguientes pasos:

1. Realiza un fork del repositorio.
2. Crea una rama para tus modificaciones: git checkout -b nombre-de-la-rama.
3. Realiza los cambios y realiza commits con mensajes descriptivos.
4. Envía tus cambios al repositorio remoto: git push origin nombre-de-la-rama.
5. Crea un pull request en GitHub para revisar tus cambios y fusionarlos con la rama principal.

Agradecemos cualquier contribución que realices al proyecto.

## Licencia

Este software se distribuye bajo la licencia MIT. Puedes consultar el archivo LICENSE para obtener más detalles.