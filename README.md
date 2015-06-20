### Sitio para la sociedad de hemátologos y hemoterapeutas de la ciudad de La Plata ###

####Instalacion####

#####Copiar el archivo por defecto de apache (Puede variar el nombre)#####

    cp /etc/apache/sites-available/000-default.conf /etc/apache/sites-available/sociedadhh.conf

queda así

    <VirtualHost *:80>
            ServerName sociedadhh.local.com

            ServerAdmin webmaster@localhost
            DocumentRoot /var/www/sociedadhh-dev

            ErrorLog ${APACHE_LOG_DIR}/sociedadhh/error.log
            CustomLog ${APACHE_LOG_DIR}/sociedadhh/access.log combined
    </VirtualHost>

###LOG TIENE QUE ESTAR CREADA###
    sudo mkdir /var/log/apache2/sociedadhh

#####modifico /etc/hosts#####

    # sociedad de hematologia
    127.0.1.1       sociedadhh.local.com

 #####habilitamos el sitio#####

    sudo a2ensite sociedadhh.conf
    sudo service apache2 restart