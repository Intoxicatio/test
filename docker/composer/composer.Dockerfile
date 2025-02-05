FROM composer:2

WORKDIR /app

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]