<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property integer $role_id
 * @property string $photo_url
 * @property string $last_login
 * @property string $last_logout
 * @property \app\models\Role $role
 */
class User extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name', 'role_id'], 'required'],
            [['role_id'], 'integer'],
            [['last_login', 'last_logout'], 'safe'],
            [['username', 'password', 'name'], 'string', 'max' => 50],
            [['nomor_handphone'], 'string', 'max' => 15],
            [[], 'string', 'max' => 32],
            [['photo_url'], 'string', 'max' => 255],
            [['username' ], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'role_id' => 'Role ID',
            'photo_url' => 'Photo Url',
            'nomor_handphone' => 'Nomor Handphone',
            'last_login' => 'Last Login',
            'last_logout' => 'Last Logout',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(\app\models\Role::className(), ['id' => 'role_id']);
    }

    public function getJenisKaryawans()
    {
        return $this->hasOne(\app\models\JenisKaryawan::className(), ['id' => 'id_jenis_karyawan']);
    }

}
