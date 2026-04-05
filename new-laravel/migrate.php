<?php

try {

require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$app->runningInConsole = true;

$kernel->bootstrap();

$connection = $app->make('db')->connection();

echo 'Connection made' . PHP_EOL;

// Create migrations table if not exists

if (!$connection->getSchemaBuilder()->hasTable('migrations')) {

$connection->getSchemaBuilder()->create('migrations', function ($table) {

$table->id();

$table->string('migration');

$table->integer('batch');

});

echo 'Migrations table created' . PHP_EOL;

}

// Run the migration

$connection->getSchemaBuilder()->create('tasks', function ($table) {

$table->id();

$table->string('title');

$table->text('description')->nullable();

$table->boolean('is_completed')->default(false);

$table->timestamps();

});

echo 'Tasks table created' . PHP_EOL;

// Add priority

$connection->getSchemaBuilder()->table('tasks', function ($table) {

$table->string('priority')->default('Normal')->after('is_completed');

});

echo 'Priority added' . PHP_EOL;

} catch (Exception $e) {

echo 'Error: ' . $e->getMessage() . PHP_EOL;

}