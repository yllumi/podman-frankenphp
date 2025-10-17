# Simulasi Docker Container PHP

## Build images

```bash
# Login dulu ke docker.io
podman login docker.io

# Build image yang diinginkan
cd _images/frankenphp84
podman build -t frankenphp84 .

# Cek image
podman images
```

## Create Container

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

Open `http://localhost:8091`

### Nginx Unit

```bash
# Buat pod bila belum ada
podman pod create --name pod-app1 -p 8092:80

# Buat container (pastikan image sudah dibuild)
podman run -d \
  --name app1 \
  --pod pod-app1 \
  -v /home/yllumi/Developments/PODMAN/app1:/app \
  -v /home/yllumi/Developments/PODMAN/_configs/app1.unit.json:/docker-entrypoint.d/config.json \
  -v /home/yllumi/Developments/PODMAN/_sockets/app1:/run/unit-sockets \
  localhost/unitphp84
```

Open `http://localhost:8092`
