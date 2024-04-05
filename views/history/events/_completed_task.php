<?php

$task = $model->task;
    echo $this->render('_item_common', [
        'user' => $model->user,
        'body' => "$model->eventText: " . ($task->title ?? ''),
        'iconClass' => 'fa-check-square bg-yellow',
        'footerDatetime' => $model->ins_ts,
        'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
    ]);