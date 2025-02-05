FROM php:8.1-cli-alpine

WORKDIR /app

# Установка необходимых расширений
RUN docker-php-ext-install pdo pdo_mysql pcntl

# Установка autoconf, pkg-config и других зависимостей
RUN apk add --no-cache autoconf g++ make libstdc++ pkgconfig brotli-dev \
    && pecl install swoole \
    && docker-php-ext-enable swoole

# Копирование файлов приложения
COPY . .

# Открытие порта для Octane
EXPOSE 8000

# Команда для запуска Octane
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]