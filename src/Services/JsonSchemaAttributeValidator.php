<?php


namespace App\Services;


use Exception;
use JsonSchema\Validator;
use Pyz\Shared\ContentservImport\ContentservImportConstants;

class JsonSchemaAttributeValidator
{
    public function validate(array $payload, array $attributes=[]): array
    {
        $jsonSchemaValidator = new Validator();
        foreach ($payload as &$dataTransfer) {
            $data = (object)$dataTransfer->getIncomingData()[ContentservImportConstants::DATA_FIELD];
            try {
                foreach ($attributes as $attribute){
                    if (isset($data->$attribute)){
                        foreach ($data->$attribute as $key=>$value){
                            $schema = $this->getSchemaFile($key);
                            if ($schema){
                                $schemaObject = (object)['$ref' => 'file://' . $schema];
                                $value = (object)$value;
                                $jsonSchemaValidator->validate($value, $schemaObject);
                                if (!$jsonSchemaValidator->isValid()) {
                                    throw new Exception(sprintf('Invalid JSON format for %s. Please check the schema %s', $key,$schema));
                                }
                            }
                        }
                    }

                }
                $dataTransfer->setValid(true);
            } catch (Exception $e) {
                $this->getLogger()->error($e->getMessage(), $this->getLogContext($dataTransfer, $jsonSchemaValidator->getErrors()));
                $dataTransfer->setValid(false);
                $jsonSchemaValidator->reset();
            }
        }

        return $payload;
    }
}