# LuxuryDom WordPress Theme Project

## Docker: запуск / зупинка WordPress (без втрати БД)

### 1) Налаштування `.env`
Файл: `geoplast_docker/.env`

```env
COMPOSE_PROJECT_NAME=geoplast
WP_PORT=8000
THEMES_DIR=theme-geoplast

MYSQL_ROOT_PASSWORD=rootpassword
MYSQL_DATABASE=wordpress
MYSQL_USER=wpuser
MYSQL_PASSWORD=wppassword

UPLOAD_LIMIT=128M
PHP_MEMORY_LIMIT=256M
TZ=Europe/Kyiv
```

### 2) Перший запуск (підняти все)
Запускати з папки, де лежить `docker-compose.yml`:

```bash
cd geoplast_docker
docker compose up -d
docker compose ps
```

Відкрити сайт:
- `http://localhost:8000/` (або порт з `WP_PORT`)

### 3) Зупинити / запустити БЕЗ втрати БД
✅ Зупинити (БД зберігається у volume):
```bash
docker compose stop
```

✅ Запустити назад (та сама БД):
```bash
docker compose start
```

### 4) Прибрати контейнери, але зберегти БД
```bash
docker compose down
```

Потім знову підняти:
```bash
docker compose up -d
```

⚠️ НЕ використовуй, якщо хочеш зберегти БД:
```bash
docker compose down -v
```

### 5) Логи (якщо щось не так)
```bash
docker compose logs -f
```

---

## Gulp: запуск збірки теми (Pug → PHP)

> Перед запуском Gulp має бути піднятий Docker (WordPress доступний на `http://localhost:8000/`).

### 1) Перейти в папку, де лежать `package.json` і `gulpfile.js`
Наприклад (якщо gulp у папці теми):
```bash
cd wordpress/wp-content/themes
```
або відкрий потрібну папку через Terminal у PhpStorm (головне — там має бути `package.json`).

### 2) Встановити залежності (один раз)
```bash
npm install
```

### 3) Запустити Gulp у режимі розробки (BrowserSync через WordPress)
#### PowerShell:
```powershell
$env:BS_PROXY="http://localhost:8000"; npx gulp
```

Після цього BrowserSync відкриється у браузері (зазвичай `http://localhost:3000`).

### Зупинити Gulp
У терміналі натисни: 
- `Ctrl + C`

> Примітка: Gulp компілює Pug одразу у `.php` та складає файли у папку теми (наприклад `theme-geoplast/`).
 