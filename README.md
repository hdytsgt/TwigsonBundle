# Twigson

Symfony Bundle for Twig Filter Extension to read local JSON file or directly through URL.



## Installation
Make sure you have installed [Composer](https://getcomposer.org/doc/00-intro.md) globally in your system. Then go to your terminal, inside your Symfony project run following command :

```
composer require hdytsgt/twigson-bundle:dev-master
```



When composer done installing the bundle, go to your `app/AppKernel.php` and add following Class `new hdytsgt\TwigsonBundle\TwigsonBundle()` into `registerBundles()` , example :

```php
public function registerBundles()
{
        $bundles = [
            ...
            new hdytsgt\TwigsonBundle\TwigsonBundle(),
        ];
}
```




## Usage

1. Using local JSON file :

   ```twig
   {% set json = './countries.json' | twigson %}

   {% for key, item in json %}

      {{ key }} : {{ item }}
      
   {% endfor %}
   ```

   This will find `countries.json` under your Symfony `web` folder. And of course you can pass absolute path too.  

   ​

2. Using URL :

   ```twig
   {% set json = 'http://yoursite.com/countries.json' | twigson %}

   {% for key, item in json %}

      {{ key }} : {{ item }}
      
   {% endfor %}
   ```

   ​


## Related Project

[Twigson for Craft CMS](https://github.com/hdytsgt/Twigson)



## License

[MIT](LICENSE)
