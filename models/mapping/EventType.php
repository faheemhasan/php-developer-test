<?php

namespace app\models\mapping;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%event_type}}".
 *
 * @property integer $id
 * @property string $event
 * @property string $text
 */
class EventType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event_type}}';
    }

}
