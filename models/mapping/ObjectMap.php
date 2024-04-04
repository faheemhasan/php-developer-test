<?php

namespace app\models\mapping;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%object_map}}".
 *
 * @property integer $id
 * @property string $object_type
 * @property string $model_class
 */
class ObjectMap extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%object_map}}';
    }

}
