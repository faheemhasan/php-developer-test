<?php

use app\models\Customer;

echo $this->render('_item_statuses_change', [
    'model' => $model,
    'oldValue' => Customer::getTypeTextByType($model->getDetailOldValue('type')),
    'newValue' => Customer::getTypeTextByType($model->getDetailNewValue('type'))
]);
