docker-php-ext-configure pdo_mysql && docker-php-ext-install pdo_mysql
ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}/public!g' /etc/apache2/sites-available/*.conf
sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
sed -ri -e '\!<Directory ${APACHE_DOCUMENT_ROOT}>/public!,\!</Directory>! s!AllowOverride None!AllowOverride all!' /etc/apache2/apache2.conf
