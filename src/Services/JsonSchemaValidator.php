<?php


namespace App\Services;


use Exception;
use JsonSchema\Validator;

class JsonSchemaValidator
{
    public function validate(object $data, string $schema): object
    {
        $schemaObject = (object)['$ref' => 'file://' . $schema];

        try {
            $jsonSchemaValidator = new Validator();
            $jsonSchemaValidator->validate($data, $schemaObject);
            if (!$jsonSchemaValidator->isValid()) {
                throw new Exception(sprintf('Invalid JSON format. Please check the schema %s', $schema));
            }
        echo sprintf('Validation is successful for %s', $schema);
        } catch (Exception $e) {
          print_r($e->getMessage());
          echo '<pre>';
          print_r($jsonSchemaValidator->getErrors());
          echo '--------------<br>';
            print_r($data);
            echo '</pre>';

        }

        return $data;
    }
}