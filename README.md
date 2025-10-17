# Simulasi Docker Container PHP

## Build image FrankenPHP server

```bash
# Login dulu ke docker.io
podman login docker.io

# Build image yang diinginkan
cd _images/frankenphp84
podman build -t frankenphp84 .

# Cek image
podman images
```

## Buat Container MySQL

Jalankan perintah ini untuk membuat container mysql-server

```bash
podman run -d \
  --name mysql-server \
  -e MYSQL_ROOT_PASSWORD=Pass4mysql \
  -e MYSQL_DATABASE=mysql \
  -p 3307:3306 \
  -v /home/yllumi/Developments/PODMAN/_mysqldata:/var/lib/mysql \
  docker.io/library/mysql:latest
```

Untuk membuat user dan database baru:

```bash
podman exec -i mysql-server mysql -u root -h 127.0.0.1 -pPass4mysql -e "CREATE DATABASE app1;"
podman exec -i mysql-server mysql -u root -h 127.0.0.1 -pPass4mysql -e "CREATE USER 'user_app1'@'%' IDENTIFIED BY 'Pass4app1';"
podman exec -i mysql-server mysql -u root -h 127.0.0.1 -pPass4mysql -e "GRANT ALL PRIVILEGES ON app1.* TO 'user_app1'@'%';"
podman exec -i mysql-server mysql -u root -h 127.0.0.1 -pPass4mysql -e "FLUSH PRIVILEGES;"
```

Database di container ini akan bisa diakses seperti ini:

```php
// MySQL database connection details
$host     = 'host.containers.internal';
$port     = '3307';
$user     = 'user_app1';
$password = 'Pass4app1';
$database = 'app1';
$db = new mysqli($host.':'.$port, $user, $password, $database);
```

## Create Container Aplikasi

### FrankenPHP

```bash
# Buat pod (network)
podman pod create --name pod-app1 -p 8091:80

# Buat container
podman run -d \
  --name app1 \
  --pod pod-app1 \
  -v /home/yllumi/Developments/PODMAN/app1:/app \
  -v /home/yllumi/Developments/PODMAN/_configs/app1.Caddyfile:/etc/caddy/Caddyfile \
  localhost/frankenphp84
```

Buka aplikasi di `http://localhost:8091`
Buka Adminer di `http://localhost:8091/adminer.php`
