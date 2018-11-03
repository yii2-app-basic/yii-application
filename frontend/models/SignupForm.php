<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $name;
    public $middle_name;
    public $surname;
    public $telephone;
    public $city;
    public $address;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username',  'name', 'middle_name', 'surname', 'telephone', 'city', 'address', 'email','password'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Это имя пользователя уже занято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот адрес электронной почты уже занят.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Регистрирует пользователя.
     *
     * @return User|null сохраненная модель или null, если сохранение не выполняется
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->middle_name = $this->middle_name;
        $user->surname = $this->surname;
        $user->telephone = $this->telephone;
        $user->city = $this->city;
        $user->address = $this->address;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
