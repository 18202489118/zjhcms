<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('com', 'Admin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p></p>
    <?php
    use kartik\widgets\Alert;

    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'You successfully read this important alert message.',
        'showSeparator' => true,
        'delay' => 2000
    ]);
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,


        //#################TABLE########################
        'bordered' => true,
        'striped' => true,
        'hover' => true,//鼠标移动上去时，颜色变色，默认为false
        'responsive' => true,//自适应，默认为true
        'floatHeader' => false,//向下滚动时，标题栏可以fixed，默认为false
        'showPageSummary' => false,//显示统计栏，默认为false
        'persistResize' => false,


        //#################PJAX########################
        'pjax' => true,
//        'pjaxSettings' => [
//            'neverTimeout' => true,
//            'beforeGrid' => '之前的我喜欢的内容。',
//            'afterGrid' => '我以后喜欢的内容。',
//        ],


        //##################TOOLBAR#######################
        // set your toolbar
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['signup'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => Yii::t('kvgrid', '新增')]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', '刷新')])
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataOptions' => [
            'all' => [
//                'icon' => '调整大小',
                'label' => Yii:: t('kvgrid', 'All'),
                'class' => 'btn btn-default',
                'title' => '显示所有数据'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => Yii:: t('kvgrid', 'Page'),
                'class' => 'btn btn-default',
                'title' => '显示第一页数据'
            ],
            'maxCount' => 200,//当超过200条时，此按钮隐藏，以免数据太多造成加载问题
            // 'minCount' => 10,//当超过10条,点击时才会下面的提示
            'confirmMsg' => Yii::t('com', 'There are {params} records. Are you sure want to display them all？', ['params' => number_format($dataProvider->getTotalCount())]),//点击时的确认
        ],


        //##################EXPORT#######################
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


        //################PANEL#########################
        'panel' =>
            [
                'type' => GridView::TYPE_INFO,
                'heading' => true,
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
//                'before' => '<div style="margin-top:8px">{summary}</div>',
                'before' => '<div style="margin-top:8px;color: red">Tips:这里可以写点提示信息</div>',
            ],

        'rowOptions' => function ($model) {
            if ($model->username == 'admin') {
                return ['class' => GridView::TYPE_DANGER];
            }
        },

        'columns' => [
            [
                'class' => 'kartik\grid\CheckboxColumn',//复选框
                'rowSelectedClass' => GridView::TYPE_INFO,//选中颜色
            ],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '3%',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return Yii::$app->controller->renderPartial('_expand-row-details', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true
            ],
            [
                'class' => 'kartik\grid\SerialColumn',
                'contentOptions' => ['class' => 'kartik-sheet-style'],
                'width' => '2%',
                'header' => '序号',
                'headerOptions' => ['class' => 'kartik-sheet-style']
            ],
            'username',
            'email',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i']
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'width' => '8%',
                'vAlign' => 'middle'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete} {approve}',
                'viewOptions' => [
                    'class' => 'btn btn-info'
                ],
                'updateOptions' => [
                    'class' => 'btn btn-primary'
                ],
                'deleteOptions' => [
                    'class' => 'btn btn-danger'
                ],
                'buttons' =>
                    [
                        'approve' => function ($url, $model) {
                            $options = [
                                'class' => 'btn btn-default',
                                'title' => Yii::t('com', 'Reserved'),
                                'data-confirm' => Yii::t('com', 'Reserved'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, $options);
                        }
                    ]
            ]
        ]
    ]); ?>
</div>
