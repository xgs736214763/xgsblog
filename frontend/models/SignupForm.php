<?php
namespace frontend\models;

use yii\base\Model;
use common\models\UserModel;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;

    public $email;

    public $password;

    public $repassword;

    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                'username',
                'trim'
            ],
            [
                'username',
                'required'
            ],
            [
                'username',
                'unique',
                'targetClass' => '\common\models\UserModel',
                'message' => 'This username has already been taken.'
            ],
            [
                'username',
                'string',
                'min' => 2,
                'max' => 255
            ],
            
            [
                'email',
                'trim'
            ],
            [
                'email',
                'required'
            ],
            [
                'email',
                'email'
            ],
            [
                'email',
                'string',
                'max' => 255
            ],
            [
                'email',
                'unique',
                'targetClass' => '\common\models\UserModel',
                'message' => Yii::t('common', 'This email address has already been taken')
            ],
            
            [
                [
                    'password',
                    'repassword'
                ],
                'required'
            ],
            [
                [
                    'password',
                    'repassword'
                ],
                'string',
                'min' => 6
            ],
            
            [
                'repassword',
                'compare',
                'compareAttribute' => 'password',
                'message' => Yii::t('common', 'The two password is inconsistent')
            ],
            
            [
                'verifyCode',
                'captcha'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'Email'),
            'password' => Yii::t('common', 'Password'),
            'signup' => Yii::t('common', 'Signup'),
            'repassword' => '确认密码',
            'verifyCode' => '验证码'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (! $this->validate()) {
            return null;
        }
        
        $user = new UserModel();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
