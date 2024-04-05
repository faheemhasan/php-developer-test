<?php

use yii\helpers\Html;

$fax = $model->fax;
echo $this->render('_item_common', [
    'user' => $model->user,
    'body' => $model->eventText .
        ' - ' .
        (isset($fax->document) ? Html::a(
            Yii::t('app', 'view document'),
            $fax->document->getViewUrl(),
            [
                'target' => '_blank',
                'data-pjax' => 0
            ]
        ) : ''),
    'footer' => Yii::t('app', '{type} was sent to {group}', [
        'type' => $fax ? $fax->getTypeText() : 'Fax',
        'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
    ]),
    'footerDatetime' => $model->ins_ts,
    'iconClass' => 'fa-fax bg-green'
]);