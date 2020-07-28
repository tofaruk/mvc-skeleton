<?php


namespace App\Services;


use Exception;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Validator;

class JsonSchemaValidator
{
    public function validate(object $data, string $schema): object
    {
        $schemaObject = (object)['$ref' => 'file://' . $schema];
        try {
            $jsonSchemaValidator = new Validator();
            $jsonSchemaValidator->validate($data, $schemaObject, Constraint::CHECK_MODE_NORMAL | Constraint::CHECK_MODE_TYPE_CAST);
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