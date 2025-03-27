# Simple MVC Framework
This is a very simple MVC framework, Which will help you to create a small application. In this framework i added very few number of open source packages so its not that powerful but you can easily add new open source package very based on your need.  


### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop) (WSL 2 enabled if on Windows)
- [Git](https://git-scm.com/)


#### How to install 
* Prerequisites : php and mysql installed 
* Run `composer install && composer dump-autoload -o`
* Run `cp config/config.dist.php config/config.php` 
* Add database credentials in `config/config.php`
* Find database with sample data here `db/simple-mvc-framework.sql`
* Run this command in project directory `php -S localhost:8080 -t public/`

## Controllers 
You can create a controller class in `src/Controller/` directory which will extends `App\Core\BaseController`. 
#### Example of a controller method 
```$xslt
public function indexAction($prams = [], Request $request)
{
    $posts = $this->model->getAll();
    return View::render(['posts' => $posts]);
}
```
__Some conventions of controller__
* In every controller you have to define at least one method which is `indexAction`.
* All the public method which has a route need to have Action at the end of method name.

## Model 
You can create a model class in `src/Model/` directory which extends `App/Core/BaseModel`.

__Some conventions of model__ 
* Mention the main respective database table name in `protected $table = 'table_name';`
* Use `$this->db` for database connection which will return an instance of `\PDO`
* Use `$this->log` for error log it will have the instance of `\App\Core\Log`
 
#### Example of a model method 
```$xslt
public function getLastId()
{
    try {
        $statement = $this->db->query("SELECT id FROM " . $this->table." ORDER BY id DESC LIMIT 1;");
        $row = $statement->fetch(\PDO::FETCH_OBJ);
        if(isset($row->id)) {
            return $row->id;
        }
        return 0;
    } catch (\PDOException $e) {
        $error = array("message" => $e->getMessage());
    } catch (\Exception $e) {
        $error = array("message" => $e->getMessage());
    }
    $this->log->error(__METHOD__, $error);
    return;
}
```
## View
To create a view file go to `src/View/` and create a directory with the controller name eg. For HomeController view directory name will be Home. 
Under Home directory you need to create view file for each method name eg. `index.html.twig` for `indexAction` method. 

__Some conventions of view__ 
* In the controller method you dont need to specify the view name if you want to keep the method and view name same.
* Create at least one twig file (`index.html.twig`) for mandatory indexAction method.   
#### Example of render  view file from controller method 
```
public function addPostAction($prams = [], Request $request)
{
    ......
    return View::render([], 'addPost.html.twig');
}
```

## Routes 
You can define the Route in `\App\Route\Routes::defineRoutes` method .

#### Example of single route 
```$xslt
$r->addRoute('GET', '/', 'App\Controller\HomeController::indexAction');
```
#### Example of group route 
```$xslt
$r->addGroup('/post', function (RouteCollector $r) {
    $r->addRoute('GET', '', 'App\Controller\PostController::indexAction');
    $r->addRoute('GET', '/details/{id:\d+}', 'App\Controller\PostController::detailsAction');

});
```

## Other information 
* You will find log files under this directory `var/log/`
* Run phpunit tests by this command `./vendor/bin/phpunit tests`

##TODOs
- [X] use composer
- [X] use namespace   
- [X] add phpinit
- [X] use PDO database connection 
- [ ] orm  
- [X] follow mvc pattern  
- [X] use twig as template engine   
- [X] add routing system      
- [ ] cache    
- [X] add Logger : psr/log 
- [ ] implement API
- [ ] PHP Form & validation  