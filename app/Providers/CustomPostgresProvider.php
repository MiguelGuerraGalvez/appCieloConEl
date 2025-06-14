<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\Connectors\PostgresConnector;
use Illuminate\Database\DatabaseManager;
use PDO;

class CustomPostgresProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->resolving('db', function (DatabaseManager $db) {
            $db->extend('pgsql', function ($config, $name) {
                $connector = new PostgresConnector();

                // Agregamos la opción de Neon Endpoint ID si existe
                if (isset($config['options']) && is_array($config['options'])) {
                    $options = $config['options'];
                } else {
                    $options = [];
                }

                // Si existe NEON_ENDPOINT_ID, lo pasamos como opción
                $endpointId = env('NEON_ENDPOINT_ID');
                if ($endpointId) {
                    $options[PDO::ATTR_PERSISTENT] = false;
                    $config['options'] = array_merge($options, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]);

                    // Añadir el parámetro 'options' al DSN de Postgres
                    $config['dsn'] = sprintf(
                        "pgsql:host=%s;port=%s;dbname=%s;sslmode=%s;options='endpoint=%s'",
                        $config['host'],
                        $config['port'],
                        $config['database'],
                        $config['sslmode'],
                        $endpointId
                    );
                }

                $pdo = $connector->connect($config);
                return new PostgresConnection($pdo, $config['database'], $config['prefix'], $config);
            });
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
