<?php
namespace AuraSidera\Compass\Template;

interface TemplateInterface {
    public function __invoke(array $data): string;
}