<?php
namespace AuraSidera\Compass\Converter;

interface ConverterInterface {
    public function fromArray(array $data);
    public function toArray($data): array;
}