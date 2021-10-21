<?php

class ProductDto
{
    public int $id;
    public string $name;
}

class CreateProductDtoFactory
{
    public static function fromArray(array $data): ProductDto
    {
        $dto = new ProductDto();

        $dto->id = $data['id'];
        $dto->name = $data['name'];

        return $dto;
    }
}

$product = [
    'id' => 1,
    'name' => 'Sony',
];

$productDto = CreateProductDtoFactory::fromArray($product);

echo '<pre>';
    var_dump($productDto);
echo '</pre>';
