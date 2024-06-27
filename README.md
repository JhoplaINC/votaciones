# Sistema de votaciones

##### Qué herramientas se utilizaron para desarrollar este Sistema de votaciones?

Las herramientas utilizadas fueron:

* HTML
* CSS
* Bootstrap
* PHP 8.1.10
* Javascript
* jQuery
* MySQL 8.0.30

##### Cómo puedo ver este proyecto en mi PC?

Primero, necesitarán clonar este proyecto.

Dentro de este proyecto, podrán encontrar un archivo SQL que, dicho archivo, les permitirá crear la Base de Datos que utilizaremos para gestionar los datos.
Dicha query, nos rellenerá la Base de Datos con los datos necesarios, que serían: Canales de acercamiento, regiones del país, comunas por regiones, la conexión entre región-comuna 
y los candidatos. La cantidad de candidatos, son un total de 2 por región: 1 hombre y 1 mujer (los nombres y apellidos fueron creados al azar).

Al clonar este repositorio y ejecutar la query es nuestro DBMS (DataBase Management System) tal como MySQL Workbench o HeidiSQL, ya tendremos la base para comenzar a generar votaciones.

En cuanto al código, deberemos ejecutar nuestro entorno de desarrollo para comenzar a utilizar nuestra web de manera local.

##### Qué necesito para ver el formulario de votación y crear entradas en la Base de Datos?

Lo único que necesitaremos hacer, es ejecutar nuestro entorno de desarrollo (ya sea WAMP, XAMPP, Laragon o cualquiera que vayamos a utilizar) y dirigirnos a la ruta localhost/votaciones.
Una vez estemos en el sitio web, veremos que no necesitamos nada más, pues no hay sistema de login o de vistas privadas, solo tenemos /index y /formulario.

Una vez estemos en el formulario, podremos comenzar a crear entradas en la base de datos.

##### Información

El formulario está desarrollado para aserciorarse de que todo esté correcto:

* El campo 'Nombre y apellido' es obligatorio.
* El campo 'Alias' es obligatorio y debe tener un mínimo de 5 caracteres, incluyendo 1 número.
* El campo 'rut' es obligatorio y debe ser un rut válido.
* El campo 'rut', puede recibir el rut de 3 formas diferentes
    1. 11670732-2
    2. 116707322
    3. 11.670.732-2
* El campo 'rut' único, por lo que no podrá votar 2 veces con el mismo rut.
* El campo 'rut' está divido en rut y dv (dígito verificador) en la base de datos.
* El campo 'email' es obligatorio y debe tener un formato estándar (email@dominio.com).
* El campo 'email' es único, por lo que no podrá votar 2 veces con el mismo email.
* El campo 'región' es obligatorio.
* El campo 'comuna' es obligatorio y solo se podrán seleccionar comunas que correspondan a la región seleccionada.
Por eso, no podremos ver ni seleccionar una comuna hasta que se haya seleccionado una región primero.
* El campo 'candidato' es obligatorio y solo se podrán seleccionar candidatos que correspondan a la región seleccionada.
Por eso, no podremos ver ni seleccionar un candidato hasta que se haya seleccionado una región primero.
* El campo 'canales' (¿Cómo se enteró de nosotros?) es obligatorio y se deben seleccionar al menos 2 canales

#### ¡Atención!

Este sitio web *NO* cuenta con diseño responsivo