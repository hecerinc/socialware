<?php

/*
|--------------------------------------------------------------------------
| Autoloader de vendor
|--------------------------------------------------------------------------
|
| El autoloader de vendor carga las librerias externas para uso del 
| framework
|
*/

require ROOT . 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Autoloader para cargar modelos
|--------------------------------------------------------------------------
|
| Carga todos los modelos que se encuentren en:
| /app/models/
|
*/

// Autoloader to load classes in /app/models/
spl_autoload_register(function ($class) {
            if (0 !== strpos($class, 'Model_')) {
                return;
            }

            if (is_file($file = ROOT . 'app/models/' . $class . '.php')) {
                require $file;
            }
        });

        
?>
