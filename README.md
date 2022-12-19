<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CRUD con Laravel - MySql

Aplicativo Web, desarrollado en Laravel integrado con base de dato MySql. Con la capacidad de realizar registro de ofertas para el módulo de procesos / eventos. A su vez permite la exportación de la información en formato Excel. Se encuentra adaptada para responsive.

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋

_Para la ejecución del proyecto se requiere:_

* Contar con un servidor local que le permita la gestión de bases de datos MySql

```
Puede usar Laragon.
```
* Contar con entorno de trabajo para ejecutar proyectos Laravel.
* Contar con un editor de código 

### Instalación 🔧

_Para el proceso de instalación procedemos a:_

Iniciamos clonando el repositorio [Repositorio](https://github.com/ABatista95/CRUD-Laravel), desde la rama _MASTER_ no dirigimos al escritorio y abrimos una terminal y ejecutamos el siguiente comando.
```
git clone https://github.com/ABatista95/CRUD-Laravel
```

Procedemos después a ejecutar el servidor local e iniciamos MySql en donde debemos crear una base de datos sin tablas con nombre:.
```
db_offers
````

Abrimos la carpeta del proyecto previamente clonado, con el editor de preferencia, ubicamos el archivo .env dentro del cual se debería configurar las variables relacionadas a la conexión de base de datos.
```
DB_DATABASE | DB_USERNAME | DB_PASSWORD
```

Una vez configurado procederemos a ejecutar las migraciones del proyecto para la creación de las tablas en la base de datos con sus respectivas relaciones.
```
php artisan migrated
```

Ahora será requerido importar información a tablas principales (offer_statuses | product_classes | products), en este mismo orden mencianos, los archivos .csv se encuentran en la carpeta _Documents_ del proyecto. Y usaremos la interfaz de PhpMyAdmin para el proceso. se debe indicar una separación de columnas en ( ; ), y las columnas no se encuentran encerradas con ningún carácter, esto para todos los archivos.

después procedemos a abrir una terminar ubicados en la carpeta del proyecto y ejecutamos el siguiente comando para iniciar un servidor de laravel para la ejecución del proyecto.
```
php artisan serve
```

## Ejecutando las pruebas ⚙️

El sistema le permitira navegar empleando un menu en la vista home, o por medio del menú desplegable.

* Opción CREAR: Le permitira registrar nuevas ofertas.
* Opción CONSULTAR: le permitira visualizar las ofertas creadas, a su vez le permitira filtrar y exportar la información.

### Analice las pruebas  🔩

El sistema se ajusto a la necesidad indicada en la problematica planteada de la prueba, tratando de implementar buenas practicas durante el desarrollo tanto de la base de datos relacional como en la parte Back-End y Front-End del aplicativo.

## Construido con 🛠️

Para la estructuración y desarrollo se emplearon las siguientes herramientas.

* [Laravel v8](http://www.dropwizard.io/1.0.2/docs/) - El framework web usado
* [MySql v5.2.0](https://www.mysql.com/) - El Gesto de base de datos
* [Laragon v5.0](https://laragon.org/download/index.html) - El servidor local
* [Node.Js](https://nodejs.org/en/) - Entorno de servidor
* [PHP v7.4](https://www.php.net/releases/7_4_0.php) - El lenguaje de desarrollo
* [Bootstrap v5.2](https://getbootstrap.com/) - Framework front-end de estilos
* [Composer v2.4](https://maven.apache.org/) - Sistema de gestión de paquetes. 
* [PhpStorm](https://www.jetbrains.com/phpstorm/) - IDE de desarrollo
* [Laravel-Excel](https://laravel-excel.com/) - Paquete de gestión.
* [GitHub](https://github.com/) - Gestor de repositorios.

## Acerca de Laravel

Laravel es un marco de aplicación web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia placentera y creativa para ser realmente satisfactorio. Laravel elimina el dolor del desarrollo al facilitar las tareas comunes utilizadas en muchos proyectos web, como:

- [Motor de enrutamiento simple y rápido.](https://laravel.com/docs/routing).
- [Potente contenedor de inyección de dependencia.](https://laravel.com/docs/container).
- Múltiples back-ends para [sessiones](https://laravel.com/docs/session) y almacenamiento en [caché](https://laravel.com/docs/cache).
- [Base de datos ORM](https://laravel.com/docs/eloquent) expresiva e intuitiva.
- [Migraciones de esquemas](https://laravel.com/docs/migrations) independientes de la base de datos.
- [Robusto procesamiento de trabajos en segundo plano](https://laravel.com/docs/queues).
- [Transmisión de eventos en tiempo real.](https://laravel.com/docs/broadcasting).

Laravel es accesible, potente y proporciona las herramientas necesarias para aplicaciones grandes y robustas.

## Versionado 📌

Se procedió a trabajar con el repositorio Github para la gestión de versiones del desarrollo del proyecto. [Repositorio](https://github.com/ABatista95/CRUD-Laravel)

## Lisencia 📄

El marco de Laravel es un software de código abierto con licencia [MIT license](https://opensource.org/licenses/MIT).

## Autore ✒️

* **Ahmansavthor Batista Chacon** - *Desarrollador* - [ABatista95](https://gist.github.com/ABatista95)

---
⌨️ [Villanuevand](https://github.com/Villanuevand)
