<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd56676d1d51aa1014798887ffa51ad55
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd56676d1d51aa1014798887ffa51ad55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd56676d1d51aa1014798887ffa51ad55::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
