<?php
    echo gudezi\notifications\NotificationsWidget::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => $itemsAlert,
            'directoryAsset' =>$directoryAsset,
            'type' => gudezi\notifications\NotificationsWidget::TYPE_ALERT,
        ]
    ) 
?>
