# SuluAppSettingsBasicBundle!
![php workflow](https://github.com/manuxi/SuluAppSettingsBasicBundle/actions/workflows/php.yml/badge.svg)
![symfony workflow](https://github.com/manuxi/SuluAppSettingsBasicBundle/actions/workflows/symfony.yml/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<a href="https://github.com/manuxi/SuluAppSettingsBasicBundle/tags" target="_blank">
<img src="https://img.shields.io/github/v/tag/manuxi/SuluAppSettingsBasicBundle" alt="GitHub license">
</a>

I made this bundle to have the possibility to manage some basic settings in my projects.

![image](https://github.com/user-attachments/assets/16b305ba-c8e3-4cd4-9aa7-de8b98c98f04)

This bundle contains
- Possibility to modify settings for
- language switcher
- search configuration

Please feel comfortable submitting feature requests. 
This bundle is still in development. Use at own risk 🤞🏻


## 👩🏻‍🏭 Installation
Install the package with:
```console
composer require manuxi/sulu-app-settings-basic-bundle
```
If you're *not* using Symfony Flex, you'll also
need to add the bundle in your `config/bundles.php` file:

```php
return [
    //...
    Manuxi\SuluAppSettingsBasicBundle\SuluAppSettingsBasicBundle::class => ['all' => true],
];
```
Please add the following to your `routes_admin.yaml`:
```yaml
SuluTestimonialsBundle:
    resource: '@SuluAppSettingsBasicBundle/Resources/config/routes_admin.yml'
```
Last but not least the schema of the database needs to be updated.  

Some tables will be created.  

See the needed queries with
```
php bin/console doctrine:schema:update --dump-sql
```  
Update the schema by executing 
```
php bin/console doctrine:schema:update --force
```  

Make sure you only process the bundles schema updates!

## 🎣 Usage
First: Grant permissions for app_settings_basic. 
After reload you should see the settings item in the navigation. 

## 🧶 Configuration
There exists no configuration.
