<?php

namespace common\models;

use yii;


class AccessHelpers {

    public static function getAcceso($operacion)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT nombre from (SELECT DISTINCT o.id, o.nombre
                    FROM rol_usuario ru
                    INNER JOIN rol r ON r.id = ru.rol_id
                    INNER JOIN rol_operacion ro ON r.id = ro.rol_id
                    INNER JOIN operacion o ON o.id = ro.operacion_id
                    WHERE o.nombre =:operacion
                    AND ru.usuario_id =:user_id) t1
                WHERE id not in (SELECT operacion_id FROM usuario_operacion WHERE usuario_id =:user_id)";
        
        
        /*SELECT o.nombre
                FROM user u
                JOIN rol r ON u.rol_id = r.id
                JOIN rol_operacion ro ON r.id = ro.rol_id
                JOIN operacion o ON ro.operacion_id = o.id
                WHERE o.nombre =:operacion
                AND u.rol_id =:rol_id
                */
                
        $command = $connection->createCommand($sql);
        $command->bindValue(":operacion", $operacion);
        $command->bindValue(":user_id", Yii::$app->user->identity->id);
        //$command->bindValue(":rol_id", Yii::$app->user->identity->rol_id);
        $result = $command->queryOne();
        if ($result['nombre'] != null){
            return true;
        } else {
            return false;
        }
    }

}