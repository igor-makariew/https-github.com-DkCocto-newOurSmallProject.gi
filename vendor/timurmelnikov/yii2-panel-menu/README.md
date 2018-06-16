Виджет "Вертикальное меню bootstrap"
==================================
Реализация бокового вертикального меню, на основе компонента <a href="http://getbootstrap.com/components/#panels" target="blanc">Bootstrap panels</a>

Установка:
------------
Установка производится с помощью [composer](http://getcomposer.org/download/).
Добавить в секцию "require" файла `composer.json` Вашего приложения:
```
{
    "require": {
        "timurmelnikov/yii2-panel-menu": "*"
    }
}
```
После редактирования файла выполнить команду `composer update`

##Использование:
В представлении, где будет использоваться yii2-panel-menu, подключить:
``` php
use timurmelnikov\widgets\PanelMenu;
```
Вывести виджет:
``` php
        echo PanelMenu::widget(['items' => [
                ['label' => 'Пункт меню1', 'url' => ['#']],
                ['label' => 'Пункт меню2', 'url' => ['#']],
                ['label' => 'Пункт меню3', 'url' => ['#']],
            ],
            'heading' => 'Текст заголовка...',
            'type' => 'panel-danger',
            'footer' => 'Текст подвала...'
        ]);
```
Свойство `type`, может принимать значения - `panel-success`, `panel-info`, `panel-warning` или `panel-danger`

