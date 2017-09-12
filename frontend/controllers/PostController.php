<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/6/17
 * Time: 23:45
 * 文章控制器
 */
namespace frontend\controllers;

use Yii;
use frontend\controllers\base\BaseController;
use frontend\models\PostForm;
use common\models\CatModel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\PostExtendsModel;
use common\models\PostsModel;

class PostController extends BaseController
{

    /**
     * @inheritdoc
     * @表示认证用户
     * ？表示访客
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'index',
                    'create',
                    'upload',
                    'ueditor',
                    'update'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'index'
                        ],
                        'allow' => true,
                        'roles' => [
                            '?'
                        ]
                    ],
                    [
                        'actions' => [
                            'index',
                            'create',
                            'upload',
                            'ueditor',
                            'update'
                        ],
                        'allow' => true,
                        'roles' => [
                            '@'
                        ]
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*' => [
                        'get'
                    ],
                    'create' => [
                        'get',
                        'post'
                    ],
                    'upload' => [
                        'post'
                    ],
                    'ueditor' => [
                        'get',
                        'post'
                    ],
                    'update' => [
                        'post',
                        'get'
                    ]
                ]
            ]
        ];
    }

    /*
     * 组件
     */
    public function actions()
    {
        return [
            'upload' => [ // 图片上传组件
                'class' => 'common\widgets\file_upload\UploadAction', // 这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}"
                ]
            ],
            'ueditor' => [ // 百度编辑器组件
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config' => [
                    // 上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}" /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }

    /*
     * 文章列表
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    // 创建
    public function actionCreate()
    {
        $model = new PostForm();
        // 定义场景
        $model->setScenario(PostForm::SCENARIOS_CREATE);
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            if (! $model->create()) {
                // echo 123;exit;
                Yii::$app->session->setFlash('warning', $model->_lastError);
            } else {
                return $this->redirect([
                    'post/view',
                    'id' => $model->id
                ]);
            }
        }
        // 查询分类
        $cat = CatModel::getAllCats();
        return $this->render('create', [
            'model' => $model,
            'cat' => $cat
        ]);
    }

    /*
     * 文章详情
     */
    public function actionView($id)
    {
        $model = new PostForm();
        $data = $model->getViewById($id);
        // 文章统计
        $model = new PostExtendsModel();
        $model->upCounter([
            'post_id' => $id
        ], 'browser', 1);
        return $this->render('view', [
            'data' => $data
        ]);
    }

    /**
     * 博客文章编辑
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = PostsModel::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $models = new PostExtendsModel();
            $models->upCounter([
                'post_id' => $id
            ], 'browser', - 1);
            return $this->redirect([
                'view',
                'id' => $model->id
            ]);
        } else {
            $cat = CatModel::getAllCats();
            return $this->render('update', [
                'model' => $model,
                'cat' => $cat
            ]);
        }
    }
}