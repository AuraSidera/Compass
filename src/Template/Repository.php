<?php
namespace AuraSidera\Compass\Template;
use \Exception;

class Repository {
    public const DEFAULT_DIRECTORY = __DIR__ . '/templates';
    private $directory;

    public function __construct(string $directory) {
        $this->directory = $directory;
    }

    public static function fromDefault(): self {
        return new Repository(self::DEFAULT_DIRECTORY);
    }

    public function read(string $type, string $name): TemplateInterface {
        $path = $this->directory . '/' . $type . '/' . $name . '.tpl';
        switch ($type) {
            case 'html':
                return Html::fromFile($path);
            default:
                throw new Exception('Unknown type "' . $type . '".');
        }
    }
}