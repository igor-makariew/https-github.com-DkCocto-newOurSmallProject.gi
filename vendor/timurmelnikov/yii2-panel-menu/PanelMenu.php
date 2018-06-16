<?php

namespace timurmelnikov\widgets;

use yii\bootstrap\Widget;
use yii\bootstrap\Nav;

/**
 * timurmelnikov\widgets\PanelMenu Виджет "Вертикальное меню bootstrap"
 *
 * @author Тимур Мельников <melnikovt@gmail.com>
 * @since Версия 0.2
 */
class PanelMenu extends Widget {

    /**
     * @var Тип - panel-primary, panel-success, panel-info, panel-warning, panel-danger.
     */
    public $type;

    /**
     * @var Заголовок
     */
    public $heading;

    /**
     * @var Подвал
     */
    public $footer;

    /**
     * @var Массив пунктов меню.
     */
    public $items = [];

    /**
     * Инициализация виджета
     */
    public function init() {
        parent::init();
        if ($this->items === null) {
            $this->items = [];
        }
        if ($this->type === NULL) {
            $this->type = 'panel-default';
        }
    }

    /**
     * Выполнение виджета
     * @return string строка, содержащая HTML виджета
     */
    public function run() {

        //Заполнение заголовка
        if (isset($this->heading)) {
            $heading = '<div class="panel-heading">' . $this->heading . '</div>';
        } else {
            $heading = '';
        }

        //Заполнение подвала
        if (isset($this->footer)) {
            $footer = '<div class="panel-footer">' . $this->footer . '</div>';
        } else {
            $footer = '';
        }

        //Возврат результата
        return '<div class="panel ' . $this->type . '">'
                . $heading
                . '<div class="panel-body"> ' . Nav::widget([
                    'options' => ['class' => 'nav-stacked'],
                    'items' => $this->items,
                ])
                . ' </div>'
                . $footer
                . '</div>';
    }

}
