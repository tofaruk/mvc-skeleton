# 🧩 Simple MVC Framework (Dockerized PHP Project)

A lightweight and extensible PHP MVC framework, running inside Docker using Apache, MySQL, and Composer. Built for clean separation of concerns, testability, and simplicity.

---

## ⚙️ Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop) — with WSL 2 enabled if you're on Windows
- [Git](https://git-scm.com/)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/tofaruk/mvc-skeleton.git
cd mvc-skeleton
```

### 2. Set Up Environment File

```bash
cp .env.example .env
```

### 3. Start the Application

```bash
docker-compose up --build
```

Then open your browser and navigate to:

> 🔗 http://localhost:8080/

---

## 🧠 Application Structure

```
.
├── public/        # Web root (entry point: index.php)
├── src/           # Controllers, Models, Core classes
├── db/            # SQL files (for MySQL container)
├── tests/         # PHPUnit test cases
├── var/log/       # App logs
├── .env           # Environment config
└── docker-compose.yml
```

---

## 🧩 Controllers

Controllers are located in `src/Controller/` and must extend `App\Core\BaseController`.

### ✅ Example Controller Method

```php
public function indexAction($prams = [], Request $request)
{
    $posts = $this->model->getAll();
    return View::render(['posts' => $posts]);
}
```

### 🔖 Conventions

- Every controller must have at least one method: `indexAction`.
- All route-bound methods must end with `Action`.

---

## 🗃️ Models

Models are located in `src/Model/` and extend `App\Core\BaseModel`.

### ✅ Example Model Method

```php
public function getLastId()
{
    try {
        $statement = $this->db->query("SELECT id FROM {$this->table} ORDER BY id DESC LIMIT 1;");
        $row = $statement->fetch(\PDO::FETCH_OBJ);
        return $row->id ?? 0;
    } catch (\Throwable $e) {
        $this->log->error(__METHOD__, ['message' => $e->getMessage()]);
        return;
    }
}
```

### 🔖 Conventions

- Declare your table name with `protected $table = 'your_table'`.
- Use `$this->db` for the PDO instance.
- Use `$this->log` (instance of `App\Core\Log`) for logging errors.

---

## 🎨 Views

View files live in `src/View/{ControllerName}/`.

### ✅ Rendering Views

```php
return View::render([], 'addPost.html.twig');
```

### 🔖 Conventions

- Use a Twig file named after the action (e.g. `index.html.twig` for `indexAction`).
- If the view name matches the action name, it can be omitted.
- Every controller must at least have `index.html.twig`.

---

## 🛣️ Routes

Define all routes in `App\Route\Routes::defineRoutes()`.

### ✅ Single Route Example

```php
$r->addRoute('GET', '/', 'App\Controller\HomeController::indexAction');
```

### ✅ Grouped Route Example

```php
$r->addGroup('/post', function (RouteCollector $r) {
    $r->addRoute('GET', '', 'App\Controller\PostController::indexAction');
    $r->addRoute('GET', '/details/{id:\d+}', 'App\Controller\PostController::detailsAction');
});
```

---

## 🧪 Running Tests

To run PHPUnit tests inside the Docker container:

```bash
docker exec -it mvc-php-app-dev ./vendor/bin/phpunit tests
```

> Tip: Create a `test.sh` script for convenience:

```bash
#!/bin/bash
docker exec -it mvc-php-app-dev ./vendor/bin/phpunit "$@"
```

Then run:

```bash
chmod +x test.sh
./test.sh
```

---

## 📝 Logging

Log files are saved under:

```
var/log/
```

Errors and debug information from models, controllers, and core services are stored here using `App\Core\Log`.

---

## 📃 License & Author

Created by [tofaruk](https://github.com/tofaruk)  
Licensed under the [MIT License](LICENSE)
