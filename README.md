# Simple MVC Framework
This is a MVC framework, will help to start a small application. 

## Controllers 
You can create a controller class in `src/Controller/` directory which will extends `App\Core\BaseController`. 

__Some conventions of controller__
* In every controller you have to define at least one method which is `indexAction`.
* All the public method which has a route need to have Action at the end of method name.

## Model 
You can create a model class in `src/Model/` directory which extends `App/Core/BaseModel`.

__Some conventions of model__ 
* Mention the main respective database table name in `protected $table = 'table_name';`
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
* You will find log file under this directory `var/log`



## Run phpunit test 
`./vendor/bin/phpunit tests`




I will try implement different topics in this project. There will be different git branches for each topics. Everything should be merged in master branch which is working. 

Epic branches will have  more than one branch to check are they working together or not. Remember every time you switch the branch maybe need to run composer install command.  

#### Start the server 
Run this command in project directory `php -S localhost:8080 -t public/`

## Tips 
* `composer dump-autoload -o` to generate autoloader 

##TODOS
- [X] composer : master branch 
- [X] namespace   
- [X] phpinit
- [X] database connection 
- [ ] orm  
- [X] mvc  
- [X] templating : twig   
- [X] routing   
- [ ] validation   
- [ ] login    
- [ ] cache    
- [ ] enable xdebug 
- [ ] read credentials from .env file and create .env.dist file 
- [X] Logger : psr/log 
- [ ] API
- [X] Form
- [ ] PHP Form
- [ ] One day for symfony 