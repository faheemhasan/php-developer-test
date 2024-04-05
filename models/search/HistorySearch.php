<?php

namespace app\models\search;

use Yii;
use app\models\History;
use app\models\mapping\ObjectMap;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * HistorySearch represents the model behind the search form about `app\models\History`.
 *
 * @property array $objects
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = History::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => [
                'ins_ts' => SORT_DESC,
                'id' => SORT_DESC
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->addSelect('history.*');

        // Determine which relations to preload dynamically
        $relationsToLoad = $this->determineRelationsToLoad();
        if (!empty($relationsToLoad)) {
            $query->with($relationsToLoad);
        }

        return $dataProvider;
    }

    protected function determineRelationsToLoad()
    {
        $query = History::find()->select('object')->distinct();
        $objects = $query->column();
        $relations = $this->fetchRelationsFromMapping($objects);
        
        return $relations;
    }

    protected function fetchRelationsFromMapping($objects)
    {
        //Yii::$app->cache->flush();
        //exit;
        $cache = Yii::$app->cache;
        $relations = [];

        foreach ($objects as $object) {
            $cacheKey = "relation_mapping_{$object}";
            $relation = $cache->get($cacheKey);

            if ($relation === false) {
                $relationMapping = ObjectMap::findOne(['object_type' => $object]);

                if($relationMapping == NULL){
                    $relation == null;
                }else {
                        $relation = $relationMapping->object_type;
                }
                //$relation = $relationMapping ? $relationMapping->relation_name : null;
                if ($relation) {
                    $cache->set($cacheKey, $relation, 86400); // 24 hours cache
                }
            }

            if ($relation && !in_array($relation, $relations)) {
                $relations[] = $relation;
            }
        }
        return $relations;
    }
}
