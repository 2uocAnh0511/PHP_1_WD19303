<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd6e4e2a55fe35e5c43c280a4658a27ff
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd6e4e2a55fe35e5c43c280a4658a27ff', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd6e4e2a55fe35e5c43c280a4658a27ff', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd6e4e2a55fe35e5c43c280a4658a27ff::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
