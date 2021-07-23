<?php
namespace AuraSidera\Compass\Template;

class Html implements TemplateInterface {
    private $template;

    public function __construct(string $template) {
        $this->template = $template;
    }

    public static function fromString(string $template): self {
        return new Html($template);
    }

    public static function fromFile(string $path): self {
        return new Html(file_get_contents($path));
    }

    public function __invoke(array $data): string {
        return sprintf($this->template, json_encode($data));
    }
}