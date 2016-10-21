<?php
    echo gudezi\notifications\NotificationsWidget::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => $itemsTask,
            'directoryAsset' =>$directoryAsset,
            'type' => gudezi\notifications\NotificationsWidget::TYPE_TASK,
        ]
    ) 
?>
