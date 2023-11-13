<?php
use DI\ContainerBuilder;

$builder = new ContainerBuilder();

$builder->addDefinitions(require __DIR__ . '/dependencies.php');
try {
    return $builder->build();
} catch (Exception $e) {
    var_dump($e->getMessage());die;
}