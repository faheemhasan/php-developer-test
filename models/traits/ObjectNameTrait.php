<?php

namespace app\models\traits;

use Yii;
use app\models\mapping\ObjectMap;

trait ObjectNameTrait
{
    /**
     * @param $name
     * @param bool $throwException
     * @return mixed
     */
    public function getRelation($name, $throwException = true)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return parent::getRelation($name, $throwException);
        }

        $class = self::getClassNameByRelation($name);
        if ($class !== null) {
            return $this->hasOne($class, ['id' => 'object_id']);
        }

        if ($throwException) {
            throw new \yii\base\InvalidCallException("Relation $name does not exist.");
        }

        return null;
    }

    /**
     * @param $className
     * @return mixed
     */
    public static function getObjectByTableClassName($className)
    {
        if (method_exists($className, 'tableName')) {
            return str_replace(['{', '}', '%'], '', $className::tableName());
        }

        return $className;
    }

    /**
     * Dynamically resolves the model class name for a given relation.
     * 
     * @param string $relation The relation name.
     * @return string|null The fully qualified model class name or null if not found.
     */
    protected static function getClassNameByRelation($relation)
    {
        $cacheKey = "relation_class_{$relation}";

        $cached = Yii::$app->cache->get($cacheKey);
        if ($cached !== false) {
            return $cached;
        }
    
        $objectMap = ObjectMap::findOne(['object_type' => $relation]);
        $className = $objectMap ? $objectMap->model_class : null;
        
        Yii::$app->cache->set($cacheKey, $className, 3600); // Example: 1-hour duration
        return $className;
    }
    
}