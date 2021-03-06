<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6ba5c36bd736fcba0f8525b47f2655eb
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bankas\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bankas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6ba5c36bd736fcba0f8525b47f2655eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6ba5c36bd736fcba0f8525b47f2655eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6ba5c36bd736fcba0f8525b47f2655eb::$classMap;

        }, null, ClassLoader::class);
    }
}
