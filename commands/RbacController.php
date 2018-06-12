<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Users;
use Yii;

/**
 * Description of RbacController
 *
 * @author SKYNET
 */
class RbacController extends Controller {
    //put your code here
    
    public function actionInit() {
        $auth = Yii::$app->authManager;
    
        // Удалить все старые данные из БД
        $auth->removeAll();

        // Создаём роли
        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');
        
        // Записываем роли в БД
        $auth->add($admin);
        $auth->add($user);
        
        // Создаём разрешения
        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админки';
        
        $editUser = $auth->createPermission('editUser');
        $editUser->description = 'Редактирование пользователя';
        
        $addNews = $auth->createPermission('addNews');
        $addNews->description = 'Добавление новостей';
        
        $editNews = $auth->createPermission('editNews');
        $editNews->description = 'Редактирование новостей';
        
        $deleteNews = $auth->createPermission('deleteNews');
        $deleteNews->description = 'Удаление новостей';
        
         // Записываем разрешение в БД
        $auth->add($viewAdminPage);
        $auth->add($editUser);
        $auth->add($addNews);
        $auth->add($editNews);
        $auth->add($deleteNews);
        
        // Добавим наследование
        $auth->addChild($user, $editUser);
        
        // Админ налседут разрешения редоктировать пользователя
        $auth->addChild($admin, $user);
        
        // У администратора есть свои разрешения
        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($admin, $addNews);
        $auth->addChild($admin, $editNews);
        $auth->addChild($admin, $deleteNews);
        
        // Назначаем пользователя с ID 1 администратором сайта
        $auth->assign($admin, 1);
    }
    
    
}
