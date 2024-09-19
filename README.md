
# Libreando

Sistema gratuito de administración de bibliotecas escolares. Desarrollado para la materia Prácticas Profesionalizantes de la Escuela Técnica N. 1 "Otto Krause"



## Instalación

Clonar el repositorio

```bash
git clone git@github.com:gabrielandradev/libreando-ls.git
```

Ir a la carpeta del repositorio clonado

```bash
cd libreando-ls
```

Crear un archivo .env con las [variables del entorno por defecto de Laravel](https://github.com/platformsh-templates/laravel/blob/master/.env.example). Configurar según el entorno local

Asegurarse de tener Composer instalado y habilitado globalmente

Instalar las dependencias de Composer

```bash
composer install
```

Instalar las dependencias de desarrollo

```bash
npm install
```

Realizar el build del proyecto

```bash
npm run build
```

Ejecutar las migraciones

```bash
php artisan migrate
```

## Ejecutar localmente

Para ejecutar el proyecto localmente, puede ejecutar el siguiente comando:

```bash
php artisan serve
```

El puerto en el cual se ejecute la aplicación estará definido por las variables del entorno especificadas en el archivo .env

## Ejecutar tests

Para ejecutar tests, utilizar el siguiente comando

```bash
php artisan test
```


## Autores

- [@Gabrielandradev](https://github.com/gabrielandradev)

- [@MartinMct123](https://github.com/MartinMct123)

- [@TheLife761](https://github.com/TheLife761)

- [@GuillermoCamero](https://github.com/GuillermoCamero)


## Licencia

[MIT](https://choosealicense.com/licenses/mit/)
