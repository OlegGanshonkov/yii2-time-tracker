<?php

/** @var yii\web\View $this */

use kartik\icons\Icon;
use yii\jui\DatePicker;

$this->title = 'Outlook Service';
?>
<style>
    .data-table th {
        background: #f4f4f4;
    }

    .data-table td, .data-table th {
        padding: 4px 12px;
        border: 1px solid #ccc;
    }
</style>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <table>
                    <tr>
                        <td style="padding-right: 15px; vertical-align: top;"><h4 style="font-weight: normal;">Location
                                Report</h4></td>
                        <td><h4></h4></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <?php

                echo \kartik\grid\GridView::widget([
                    'dataProvider' => $provider,
                    'filterModel' => $filter,
                    'panel' => [
                        'heading' => '<h3 class="panel-title"></h3>',
//                        'type'=>'success',
                        'before' => '',
                        'after' => '',
                        'footer' => false
                    ],
                    'toolbar' => false,
                    'columns' => [
                        [
                            'attribute' => 'locationName',
                            'enableSorting' => false,
                            'format' => 'html',
                            'value' => function ($model) {
                                $model = (object)$model;
                                $icon = $model->isMicrosoftLocation ?
                                    Icon::show('check-circle', ['class' => 'fa-sm green', 'title' => 'Microsoft Outlook Location'], Icon::FA) : '';
                                return '<a style="text-decoration: none !important;" href="/time-tracker/report/location/' . $model->id . '">'
                                    . $icon
                                    . $model->locationName . '</a>    ';
                            },
                        ],
                    ],
                ]);
                ?>

            </div>
        </div>
    </div>
</div>
