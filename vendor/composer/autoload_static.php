<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc58713b60a5b26c87bbdfa4ca395fc5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdc58713b60a5b26c87bbdfa4ca395fc5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdc58713b60a5b26c87bbdfa4ca395fc5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdc58713b60a5b26c87bbdfa4ca395fc5::$classMap;

        }, null, ClassLoader::class);
    }
}
