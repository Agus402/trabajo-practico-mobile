# Guía de Instalación y Configuración

El paso a paso para clonar e instalar el proyecto en tu maquina local:

## 1. Clonamos el repositorio
```bash
git clone https://github.com/Agus402/trabajo-practico-mobile.git
```

### 2. Nos dirigimos a la carpeta del repositorio
```bash
cd trabajo-practico-mobile
```

### 3. Instalamos las dependencias
```bash
composer install
```
### 4. Creamos el entorno de trabajo
```bash
cp .env.example
#si no te funciona cp, usa copy
```

### 5. Generamos la clave de la aplicación
```bash
php artisan key:generate
```
### 6. Corremos el proyecto / Levantamos el servidor
```bash
php artisan server
```


