<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/6/17
 * Time: 23:41
 */
namespace frontend\controllers\base;

use yii\web\Controller;

class BaseController extends Controller
{

    public function beforeAction($action)
    {
        if (! parent::beforeAction($action)) {
            return false;
        }
        return true;
    }
}