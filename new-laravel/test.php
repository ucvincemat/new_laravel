<?php

try {
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$app->runningInConsole = true;
$kernel->bootstrap();
echo 'database_path: ' . database_path('database.sqlite') . PHP_EOL;
echo 'Default connection: ' . $app['config']['database.default'] . PHP_EOL;
echo 'Config prefix: ' . $app['config']['database.connections.sqlite.prefix'] . PHP_EOL;
$connection = $app->make('db')->connection();
echo 'Connection made' . PHP_EOL;
echo 'Prefix: ' . $connection->getTablePrefix() . PHP_EOL;
$has = $connection->getSchemaBuilder()->hasTable('tasks');
echo 'Has table: ' . ($has ? 'yes' : 'no') . PHP_EOL;
} catch (Exception $e) {
echo 'Error: ' . $e->getMessage() . PHP_EOL;
}