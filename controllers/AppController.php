<?php

namespace app\controllers;

class AppController extends \yii\web\Controller
{

    public function debug($array) {
        var_dump ("<pre>$array</pre>", true);
        exit;
    }
}
