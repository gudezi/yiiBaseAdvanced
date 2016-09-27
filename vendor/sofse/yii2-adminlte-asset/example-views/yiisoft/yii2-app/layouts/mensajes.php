<?
    echo gudezi\notifications\NotificationsWidget::widget(
        [
            'options' => ['class' => 'sidebar-menu'],
            'items' => $itemsMessage,
            'directoryAsset' =>$directoryAsset,
            'type' => gudezi\notifications\NotificationsWidget::TYPE_MESSAGE,
        ]
    ) 
?>
