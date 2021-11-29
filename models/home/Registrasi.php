<?php

namespace app\models\home;

use app\components\Constant;
use app\models\User;
use Yii;
use yii\base\Model;

class Registrasi extends Model
{
    public $name;
    public $nomor_handphone;
    public $username;
    public $password;
    public $konfirmasi_password;
    public $pin;
    public $konfirmasi_pin;
    public $reCaptcha;

    public function rules()
    {
        return [
            [[
                'name',
                'nomor_handphone',
                'username',
                'password',
                'konfirmasi_password',
                'pin',
                'konfirmasi_pin',
                'reCaptcha'
            ], 'required'],
            [
                ['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator3::className(),
                'secret' => Yii::$app->params['recaptcha3.secretKey'], // unnecessary if reСaptcha is already configured
                'threshold' => 0.5,
                'action' => 'registrasi',
            ],
        ];
    }


    public function registrasi()
    {
        $transaction = Yii::$app->db->beginTransaction();

        if ($this->validate() == false) {
            $this->addErrors($this->getErrors());
            return false;
        }

        $user = new User;
        $user->load($this->getAttributes(), "");

        $user->role_id = 5; // Pewakaf
        $user->nomor_handphone = Constant::purifyPhone($user->nomor_handphone);
        if ($this->pin != $this->konfirmasi_pin) {
            Yii::$app->session->setFlash("error", "Pendaftaran gagal. Pin anda tidak sama");
            return false;
        } else if ($this->password != $this->konfirmasi_password) {
            Yii::$app->session->setFlash("error", "Pendaftaran gagal. Pin anda tidak sama");
            return false;
        }

        $user->password = Yii::$app->security->generatePasswordHash($user->password);
        if ($user->validate() == false) {
            $this->addErrors($this->getErrors());
            return 0;
        }

        $user->save();
        $transaction->commit();
        return true;
    }
}
