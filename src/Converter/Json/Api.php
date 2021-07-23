<?php
namespace AuraSidera\Compass\Converter\Json;
use \AuraSidera\Compass\Converter\ConverterInterface;

class Api implements ConverterInterface {
    public static function fromDefault(): self {
        return new Api();
    }

    public function fromArray(array $data) {
        return json_encode($data);
    }

    public function toArray($data): array {
        return json_decode($data, true);
    }
}