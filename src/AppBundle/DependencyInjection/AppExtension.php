<?php  
namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;  
use Symfony\Component\HttpKernel\DependencyInjection\Extension;  
use Symfony\Component\DependencyInjection\ContainerBuilder;  
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;  
use Symfony\Component\Config\FileLocator;

class AppExtension extends Extension  
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $appConfig = $this->processConfiguration(new Configuration(), $configs);
        $container->setParameter('app.config', $appConfig);
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yml');
    }
    
    public function getAlias()
    {
        return 'app';
    }


}
?>