<?php
namespace app\modules\timeTracker\models;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Auth model
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $access_token
 * @property string $refresh_token
 * @property string $expires_in
 * @property string $refresh_token_expires_in
 * @property string $realm_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class ApiAuth extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%api_auth}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()')
            ],
        ];
    }

    public static function getOrSetApiAuth(string $name): ?ApiAuth
    {
        $apiAuth = self::findOne(['name' => $name]);
        if (!$apiAuth) {
            $apiAuth = new self();
            $apiAuth->name = $name;
            $apiAuth->save();
        }
        return $apiAuth;
    }

}