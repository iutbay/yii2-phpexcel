<?php

namespace iutbay\yii2phpexcel;

use Yii;
use yii\base\Component;
use yii\web\ResponseFormatterInterface;
use yii\helpers\ArrayHelper;

/**
 * PHPExcel response formatter.
 * 
 * @author Kevin LEVRON <kevin.levron@gmail.com>
 */
class PHPExcelResponseFormatter extends Component implements ResponseFormatterInterface
{

    /**
     * @inheritdoc
     */
    public function format($response)
    {
    }

}
