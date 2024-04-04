<?php
    use yii;

    // Construct the view path dynamically based on the event type
    $viewPath = "@app/views/history/events/_{$model->event}.php";
    $defaultViewPath = '@app/views/history/events/_default';
    
    // Check if the specific event view exists
    if (is_file(Yii::getAlias($viewPath))) {
        // Render the specific event view
        echo $this->render($viewPath, ['model' => $model]);
    } else {
        // If the specific view does not exist, render a default view
        echo $this->render($defaultViewPath, ['model' => $model]);
    }