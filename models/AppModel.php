<?php

namespace app\models;

use Yii;

class AppModel extends \yii\db\ActiveRecord 
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATE_ACTIVE = 1;
    const STATE_INACTIVE = 0;

    protected function setFlashAfterSave($insert) {
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Запись добавлена');
        } else {
            Yii::$app->session->setFlash('success', 'Запись обновлена');
        }
    }

    public function getStringState()
    {
        switch($this->state) {
            case self::STATE_ACTIVE: return '<span class="font-success">Активна</span>';
            case self::STATE_INACTIVE: return 'Не активна';
            default: return 'Не определено';
        }
    }

    public function getArrayState()
    {
        return [self::STATE_ACTIVE => 'Активна', self::STATE_INACTIVE => 'Не активна'];
    }

}