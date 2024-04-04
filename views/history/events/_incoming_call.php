<?php

use app\models\Call;

$call = $model->call;
$answered = $call && $call->status == Call::STATUS_ANSWERED;
$body = $call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ';

echo $this->render('_item_common', [
    'user' => $model->user,
    'content' => $call->comment ?? '',
    'body' => $body,
    'footerDatetime' => $model->ins_ts,
    'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
    'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
    'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
]);