<?php

require __DIR__ . '/../vendor/autoload.php';

// On Vercel, storage paths need to use /tmp since filesystem is read-only
$storagePath = '/tmp/storage';

// Create required directories
$dirs = [
    $storagePath,
    $storagePath . '/app',
    $storagePath . '/app/public',
    $storagePath . '/framework',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Set essential environment variables for Vercel if .env is not present
$envDefaults = [
    'APP_NAME' => 'SNACKER',
    'APP_ENV' => 'production',
    'APP_KEY' => 'base64:6VMl0IB3J6K8+BpP5v9gMpKZ0Vex4tt9YOs3dSNF/ls=',
    'APP_DEBUG' => 'false',
    'APP_URL' => 'https://snacker-menu.vercel.app',
    'LOG_CHANNEL' => 'errorlog',
    'LOG_LEVEL' => 'error',
    'DB_CONNECTION' => 'sqlite',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'array',
    'QUEUE_CONNECTION' => 'sync',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
];

foreach ($envDefaults as $key => $value) {
    if (!isset($_ENV[$key]) && !getenv($key)) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

$app = require __DIR__ . '/../bootstrap/app.php';

// Override storage path for Vercel's writable /tmp
$app->useStoragePath($storagePath);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);