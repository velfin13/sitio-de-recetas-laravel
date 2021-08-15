### Requierimientos

-   Un servidor xamp con php 7.4
-   Composer 2.1.5
-   npm 6.14.14
-   Tener una cuenta en pusher
-   git

#Pasos a seguir

### 1) Previamente debes tener el servidor Apache y Mysql coriendo y definir php en las variables del sistema para poder usarlo en consola.

### 2) Clonar el proyecto

`$ git clone https://github.com/Velfin-Velasquez/sitio-de-recetas-laravel.git`

### 3) Copiar el archivo .env.example y configurar tu entorno

### 4) Una vez configurado ejecutamos

`$ composer install`

### 5) Luego

`$ npm install`

### 6) Generamos las migraciones

`$ php artisan migrate`

### 7) Ejecutamos el seed

`$ php artisan db:seed`

### 8) Creamos el enlace simbólicos a los recursos estáticos

`$ php artisan storage:link`

### 9) Finalmente ejecutamos el servidos

`$ php artisan serve`
