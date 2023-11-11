<?php

namespace Manuxi\SuluAppSettingsBasicBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

class SuluAppSettingsBasicExtension extends Extension implements PrependExtensionInterface
{

    public function prepend(ContainerBuilder $container)
    {
        if($container->hasExtension("sulu_admin")){
            $container->prependExtensionConfig(
                "sulu_admin",
                [
                    "forms" => [
                        "directories" => [
                            __DIR__ . "/../../config/forms"
                        ]
                    ],
                    "resources" => [
                        "app_settings_basic" => [
                            "routes" => [
                                "detail" => 'sulu_app_settings_basic.get_app-settings-basic'
                            ]
                        ]
                    ]
                ]
            );
        }

        $container->loadFromExtension('framework', [
            'default_locale' => 'en',
            'translator' => ['paths' => [__DIR__ . '/../../translations/']],
        ]);

    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . "/../../config"));
        $loader->load("services.xml");
    }

}