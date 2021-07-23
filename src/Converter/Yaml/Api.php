<?php
namespace AuraSidera\Compass\Converter\Yaml;
use Symfony\Component\Yaml\Yaml;
use \AuraSidera\Compass\Converter\ConverterInterface;

class Api implements ConverterInterface {
    public static function fromDefault(): self {
        return new Api();
    }

    public function fromArray(array $data) {
        return Yaml::dump($data);
    }

    public function toArray($data): array {
        return Yaml::parse($data);
    }
}