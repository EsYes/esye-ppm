# ESYE PHP PROJECT MANAGER

Свободная библиотека для управления php проектом.

## Предисловие

Несмотря на то, что разработка библиотеки ведётся под нужды проектов
ESYE, она легко может быть интегрирована в любой другой проект.

### Возможности библиотеки

* Автозагрузка классов **ДА**

* Подключение файлов **НЕТ**

## Установка

1. Выполните клонирование этого репозитория любым удобным способом.
2. Поместите склонированное содержимое в папку `/vendor/esye-ppm` вашего сайта.
3. Теперь подключите Esye-PPM в ваш файл первоначальной загрузки (например index.php), например таким образом:

**index.php**

```php
<?php 
    require_once 'vendor/esye-ppm/autoload.php';
?>
```

## Настройка

Если вы используете структуру файлов в соответствии с требованиями PSR-4, настройка может быть не обязательна.

Например, если вы желаете использовать класс у которого неймспейс
`Engine\Core\Foo\Bar`, файл которого лежит в
`Engine\Core\Foo\Bar.php`.

### Настройка, как сокращённый неймспейс

Предположим, что по пути `Content/Vendor/Plugins/QrCodeGenetarot/QrCodeGenetarot.php`
располагается нужный нам класс. Мы можем его использовать так:

**index.php**

```php
use Content/Vendor/Plugins/QrCodeGenetarot/QrCodeGenetarot;
```

А можем использовать так:

**index.php**

```php
use Plugin/QrCodeGenetarot/QrCodeGenetarot;
```

Для этого нам необходимо в файле настроек ppm-config.json указать соответствующее правило:

**ppm-config.json**

```json
{
    "autoload": {
        "psr-4": {
            "Plugin\\": "Content/Vendor/Plugins/"
        }
    }
}
```

То же самое можно использовать таким образом:

Предположим, что по пути `content/vendor/plugins/QrCodeGenetarot/QrCodeGenetarot.php`
располагается нужный нам класс. PHP не сможет его найти, так как путь к файлу не соответствует PSR-4:

**index.php**

```php
use Content/Vendor/Plugins/QrCodeGenetarot/QrCodeGenetarot;
```

Это легко исправляется той же настройкой ppm-config.json:

**ppm-config.json**

```json
{
    "autoload": {
        "psr-4": {
            "Content\\Vendor\\Plugins\\": "content/vendor/plugins/"
        }
    }
}
```

И, опять же, неймспейс можно сократить:

**index.php**

```php
use Plugin/QrCodeGenetarot/QrCodeGenetarot;
```

**ppm-config.json**

```json
{
    "autoload": {
        "psr-4": {
            "Plugin\\": "content/vendor/plugins/"
        }
    }
}
```

## Лицензия

Библиотека распространяется по свободной лицензии GNU General Public License v.3.

Копия лицензии поставляется вместе с этой программой и находится в файле COPYING.md.
