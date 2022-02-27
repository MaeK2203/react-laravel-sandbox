## Build

### SSL setting
```bash
mkcert -key-file docker/nginx/ssl/cert-key.pem -cert-file docker/nginx/ssl/cert.pem localhost 127.0.0.1 ::1
```

### Build
```bash
cp -p .env.example .env
```

```bash
docker-compose up -d --build
```

```bash
docker-compose exec php composer install
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate
```

```bash
docker-compose php npm i
docker-compose php npm run dev
```
