<?php

namespace app\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/login.css',
        'css/form.css',
        'css/buttons.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}