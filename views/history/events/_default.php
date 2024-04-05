<?php

$task = $model->task;
    echo $this->render('_item_common', [
        'user' => $model->user,
        'body' => $model->eventText,
        'bodyDatetime' => $model->ins_ts,
        'iconClass' => 'fa-gear bg-purple-light'
    ]);