### Sitio para la sociedad de hemátologos y hemoterapeutas de la ciudad de La Plata ###

###Requeridos###
    git
    composer
    npm
    nodejs-legacy
    gulp ( sudo npm install -g gulp)
##### para testear
    phpunit (sudo apt-get install phpunit)
    sqlite (sudo apt-get install sqlite php5-sqlite)


###Instalacion###

####Git & Composer ####
    clone git clone git@bitbucket.org:team_sociedad_hh/sociedad_hh.git .
    cd source
    sudo apt-get install nodejs-legacy
    composer install && npm install
    cp .env.example .env
    php artisan key:generate
    -----quizas debas copiar la clave al archivo /config/app.php
####Base de Datos####
Crear una base de datos llamada db_sociedadhh
    CREATE DATABASE db_sociedadhh;

Configurar base de datos en la aplicacion

    #modify path/to/laravel/project/.env
    DB_HOST=localhost
    DB_DATABASE=db_sociedadhh
    DB_USERNAME=username
    DB_PASSWORD=password

Ejecutar la migracion de la base de datos
    php artisan migrate

####Configuracion Apache####

#####Copiar el archivo por defecto de apache (Puede variar el nombre)#####

    cp /etc/apache/sites-available/000-default.conf /etc/apache/sites-available/sociedadhh.conf

queda así

    <VirtualHost *:80>
            ServerName sociedadhh.local.com
        	<Directory "/var/www/sociedadhh-dev/source/public">
		        AllowOverride All
	        </Directory>
            ServerAdmin webmaster@localhost
            DocumentRoot /var/www/sociedadhh-dev

            ErrorLog ${APACHE_LOG_DIR}/sociedadhh/error.log
            CustomLog ${APACHE_LOG_DIR}/sociedadhh/access.log combined
    </VirtualHost>

### LOG TIENE QUE ESTAR CREADA ###
    sudo mkdir /var/log/apache2/sociedadhh

##### modifico /etc/hosts #####

    # sociedad de hematologia
    127.0.1.1       sociedadhh.local.com

##### habilitamos el sitio #####

    sudo a2ensite sociedadhh.conf
    sudo service apache2 restart

### Compilar CSS y JS con GULP ###

Desde consola, en el root del proyecto, tirar:

    gulp // Compila los recursos

    gulp watch // Compila y se queda a la escucha de cambios, recompila solo

    gulp --production // Compila y minifica

### Comandos básicos para configurar y correr todo el stack ###

composer dumpautoload
gulp
php artisan migrate:refresh --seed