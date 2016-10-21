<?php
    echo gudezi\notifications\NotificationsWidget::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => $itemsFlag,
            'directoryAsset' =>$directoryAsset,
            'type' => gudezi\notifications\NotificationsWidget::TYPE_FLAG,
        ]
    ) 
?>
