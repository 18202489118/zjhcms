<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'kartik\grid\ActionColumn',
    'template' => '{view}',
    'viewOptions' => [
        'class' => 'btn btn-info'
    ],
];
?>
<div class="assignment-index">


    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'hover' => true,//鼠标移动上去时，颜色变色，默认为false
        'floatHeader' => false,//向下滚动时，标题栏可以fixed，默认为false
        'showPageSummary' => false,//显示统计栏，默认为false
        'panel' =>
            [
                'type' => GridView::TYPE_DANGER,
                'heading' => false,//不要了
//                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
                'before' => '<div style="margin-top:8px">{summary}</div>',//放在before中，前面的div主要是想让它好看
            ],
        'toolbar' =>  [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', '刷新')])
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataOptions' => [
            'maxCount' => 200,//当超过200条时，此按钮隐藏，以免数据太多造成加载问题
            // 'minCount' => 10,//当超过10条,点击时才会下面的提示
            'confirmMsg' => Yii::t('com', 'There are {params} records. Are you sure want to display them all？', ['params' => number_format($dataProvider->getTotalCount())]),//点击时的确认
        ],
        'export' => [
            'fontAwesome' => 'fa fa-share-square-o',//图标
            'target' => '_blank',//在新标签打开
            'encoding' => 'gbk',//编码
        ],
        'exportConfig' => [
            GridView::CSV => [
                'label' => Yii::t('com', 'Export CSV'),
//                'icon' => $isFa ? 'file-code-o' : 'floppy-open',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The CSV export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Comma Separated Values')],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ",",
                    'rowDelimiter' => "\r\n",
                ]
            ],
            GridView::TEXT => [
                'label' => Yii::t('com', 'Export TXT'),
//                'icon' => $isFa ? 'file-text-o' : 'floppy-save',
                'iconOptions' => ['class' => 'text-muted'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The TEXT export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Tab Delimited Text')],
                'mime' => 'text/plain',
                'config' => [
                    'colDelimiter' => "\t",
                    'rowDelimiter' => "\r\n",
                ]
            ],
            GridView::EXCEL => [
                'label' => Yii::t('com', 'Export Excel'),
//                'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('kvgrid', 'grid-export'),
                'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
                'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
                    'cssFile' => ''
                ]
            ],
        ],
        'columns' => $columns,
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
