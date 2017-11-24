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
        switch ($response->format) {
            case 'xls' :
                $this->formatXLS($response);
                break;
            default :
                $this->formatCSV($response);
                break;
        }
    }

    /**
     * @param \yii\web\Response $response
     */
    public function formatXLS($response)
    {
        $phpexcel = new \PHPExcel();
        $phpexcel->setActiveSheetIndex(0);

        $phpexcel->getActiveSheet()->fromArray($response->data['data']);
        $filename = ArrayHelper::getValue($response->data, 'filename', 'data') . '.xlsx';

        $writer = new \PHPExcel_Writer_Excel2007($phpexcel);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $writer->save('php://output');
    }

    /**
     * @param \yii\web\Response $response
     */
    public function formatCSV($response)
    {
        
    }

}
