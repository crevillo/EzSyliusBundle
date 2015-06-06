<?php
/**
 * File containing eZSyliusExtension class.
 * 
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\DependencyInjection;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Yaml\Yaml;

class eZSyliusExtension extends Extension implements PrependExtensionInterface
{
    /**
     * Loads a specific configuration.
     *
     * @param array $config    An array of configuration values
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load( array $config, ContainerBuilder $container )
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator( __DIR__ . '/../Resources/config' )
        );

        $yamlLoader = new YamlFileLoader(
            $container,
            new FileLocator( __DIR__ . '/../Resources/config' )
        );

        // Base services override
        $loader->load( 'services.xml' );

        // forms
        $yamlLoader->load( 'forms.yml' );
    }

    /**
     * Loads eZSyliusBundle configuration.
     * Will override demobundle ones
     *
     * @param ContainerBuilder $container
     */
    public function prepend( ContainerBuilder $container )
    {
        $configFile = __DIR__ . '/../Resources/config/template_overrides.yml';
        $config = Yaml::parse( file_get_contents( $configFile ) );
        $container->prependExtensionConfig( 'ezpublish', $config );
        $container->addResource( new FileResource( $configFile ) );

        $fieldTemplatesConfigFile = __DIR__ . '/../Resources/config/ez_field_templates.yml';
        $fieldTemplatesConfig = Yaml::parse( file_get_contents( $fieldTemplatesConfigFile ) );
        $container->prependExtensionConfig( 'ezpublish', $fieldTemplatesConfig );
        $container->addResource( new FileResource( $fieldTemplatesConfigFile ) );
    }
}
