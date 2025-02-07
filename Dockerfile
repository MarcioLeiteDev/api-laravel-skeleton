# Usando a imagem oficial do PHP com extensões necessárias
FROM php:8.2-fpm

# Instalando dependências do sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd mbstring pdo pdo_mysql

# Instalando Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Criando diretório de trabalho
WORKDIR /var/www

# Copiando arquivos do projeto
COPY . .

# Instalando dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Definindo permissões
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Definir o usuário correto
USER www-data

# Comando padrão ao iniciar o container
CMD ["php-fpm"]
