#!/usr/bin/env php
<?php
use \AuraSidera\Compass\Template\Repository as TemplateRepository;
use \AuraSidera\Compass\Converter\Yaml\Api as ApiConverter;

foreach (['vendor/autoload.php', __DIR__ . '/../../autoload.php', __DIR__ . '/../vendor/autoload.php', __DIR__ . '/vendor/autoload.php'] as $file) {
    if (file_exists($file)) {
        require $file;
        break;
    }
}

////////////////////////////////////////////////////////////////////////
// Sanity check
if (count($argv) < 5) {
    die(
        "Usage:" . PHP_EOL
      . "\t " . $argv[0] . " <template type> <template name> <api path> <output path>" . PHP_EOL
      . "Where:" . PHP_EOL
      . "\ttemplate type:    Type of template, one of:" . PHP_EOL
      . "\t\thtml" . PHP_EOL
      . "\ttemplate name:    Name of the template" . PHP_EOL
      . "\tapi path:         Path to OpenAPI 3 YAML file" . PHP_EOL
      . "\tapi path:         Path to output file" . PHP_EOL
    );
}

////////////////////////////////////////////////////////////////////////
// Setup
$template_repository = TemplateRepository::fromDefault();
$api_converter = ApiConverter::fromDefault();
$template = $template_repository->read($argv[1], $argv[2]);
$api = $api_converter->toArray(file_get_contents($argv[3]));
file_put_contents($argv[4], $template($api));
echo "Documentation written to " . $argv[4] . PHP_EOL;