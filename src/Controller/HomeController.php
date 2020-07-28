<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;
use App\Services\JsonSchemaValidator;
use App\Services\JsonValidator;

class HomeController extends BaseController
{
    public function indexAction($prams = [], Request $request)
    {
        return View::render();
    }

    public function jsonAction($prams = [], Request $request)
    {

       // $this->validateAttribute();
       // $this->validateMainProduct();
     //   $this->validateVariant();
        $this->validateCategory();

    }

    protected function validateAttribute()
    {
        $schema = $this->getSchemaFile('AttributeSchema.json');
        $data = $this->getExampleData('attribute_color.json');
      //  $data = $this->getExampleData('attribute_ga_height_of_filling_from_to.json');
        $jsonValidator = new JsonSchemaValidator();
        $jsonValidator->validate((object)$data, $schema);

    }

    protected function validateMainProduct()
    {
        $schema = $this->getSchemaFile('AbstractProductSchema.json');
        $data = $this->getExampleData('main-product-1.json');
    //    $data = $this->getExampleData('main-product-3.json');
        $jsonValidator = new JsonSchemaValidator();
        $jsonValidator->validate((object)$data, $schema);

    }

    protected function validateVariant()
    {
        $schema = $this->getSchemaFile('ConcreteSchema.json');
        $data = $this->getExampleData('variant-1.json');
        $data = $this->getExampleData('variant-2.json');
        $jsonValidator = new JsonSchemaValidator();
        $jsonValidator->validate((object)$data, $schema);

    }

    protected function validateCategory()
    {
        $schema = $this->getSchemaFile('CategorySchema.json');
        $data = $this->getExampleData('category-level-1.json');
        $data = $this->getExampleData('category-level-2.json');
        $data = $this->getExampleData('category-level-3.json');

        $jsonValidator = new JsonSchemaValidator();
        $jsonValidator->validate((object)$data, $schema);

    }


    /**
     * @param string|null $file
     * @return false|string
     */
    private function getSchemaFile(string $file = null)
    {
        $path = $this->getSchemaConfig();
        return realpath($path . $file);
    }


    /**
     * @param string|null $file
     * @return false|string
     */
    private function getExampleData(string $file = null)
    {
        $path = $this->getExampleConfig();

        $str = file_get_contents($path . $file);
        return json_decode($str);
    }


    private function getSchemaConfig()
    {
        $pathParts = [
            '..',
            'jsondata',
            'jsonSchema',
        ];

        return implode(DIRECTORY_SEPARATOR, $pathParts) . DIRECTORY_SEPARATOR;
    }


    private function getExampleConfig()
    {
        $pathParts = [
            '..',
            'jsondata',
            'example',
        ];

        return implode(DIRECTORY_SEPARATOR, $pathParts) . DIRECTORY_SEPARATOR;
    }
}