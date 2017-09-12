<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends Controller
{

    public $layout = "local";

    public function actionIndex()
    {
        // echo 123;
        return $this->render('index');
    }
}

?>