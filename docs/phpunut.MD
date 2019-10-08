# Implement phpunit 

Followed link: [Here](https://phpunit.de/getting-started/phpunit-8.html)

### Add phpunit in compuser.json file 
`composer require --dev phpunit/phpunit ^8`

### Add new namespace for test 

```
    ....
    "autoload": {
        "psr-4": {
            "App\\": "src/",
            "Test\\": "tests/"
        }
    },
    .... 
``` 
### Run test 
`./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests`

### TODOs 
- [X] add example test : 
- [ ] add mock test example    
- [ ] add data provider example     