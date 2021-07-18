<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 30/05/16
 * Time: 00.14
 */

namespace app\components;


$direktur=\Yii::$app->user->identity->role_id ==4;
$keuangan=\Yii::$app->user->identity->role_id ==1;
use yii\helpers\Html;
    class ActionApproveButton
    {
        
        public static function getButtons()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve-finance} {cancel}',
                'header' => 'Approve / Cancel',
                'visible'=>\Yii::$app->user->identity->role_id ==1,
                'buttons' => [
                  'approve-finance' => function ($url, $model, $key) {
                    if($model->status ==1){
                      return Html::a("<i class='fa fa-check'></i>", ["approve-finance", "id"=>$model->id], [
                          "class"=>"btn btn-success",
                          "title"=>"Approve finance",
                          "data-confirm" => "Apakah Anda yakin ingin menyetujui pengajuan ini ?",
                      ]);
                    }
                  },
                  'cancel' => function ($url, $model, $key) {
                    if($model->status ==1){
                    return Html::a("<i class='fa fa-times'></i>", ["cancel", "id"=>$model->id], [
                        "class"=>"btn btn-danger",
                        "title"=>"Cancel",
                        "data-confirm" => "Apakah Anda yakin ingin menolak pengajuan ini ?",
                    ]);
                    }
                },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
            ];
        }
        public static function getApproveDirektur()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve-direktur} {cancel}',
                'header' => 'Approve / Cancel',
                'visible'=>\Yii::$app->user->identity->role_id ==4,
                'buttons' => [
                  'approve-direktur' => function ($url, $model, $key) {
                    if($model->status ==2){
                      return Html::a("<i class='fa fa-check'></i>", ["approve-direktur", "id"=>$model->id], [
                          "class"=>"btn btn-success",
                          "title"=>"Approve Pengajuan Oleh DIrektur",
                          "data-confirm" => "Apakah Anda yakin ingin menyetujui pengajuan ini ?",
                      ]);
                    }
                  },
                  'cancel' => function ($url, $model, $key) {
                    if($model->status ==2){
                    return Html::a("<i class='fa fa-times'></i>", ["cancel", "id"=>$model->id], [
                        "class"=>"btn btn-danger",
                        "title"=>"Cancel",
                        "data-confirm" => "Apakah Anda yakin ingin menolak pengajuan ini ?",
                    ]);
                    }
                },
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
            ];
        }
        public static function getApproveKomisaris()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve-direktur-utama} {cancel}',
                'header' => 'Approve / Cancel',
                'visible'=>\Yii::$app->user->identity->role_id ==6,
                'buttons' => [
                  'approve-direktur-utama' => function ($url, $model, $key) {
                    if($model->status ==3){
                      return Html::a("<i class='fa fa-check'></i>", ["approve-direktur-utama", "id"=>$model->id], [
                          "class"=>"btn btn-success",
                          "title"=>"Approve pengajuan oleh Direktur Utama",
                          "data-confirm" => "Apakah Anda yakin ingin menyetujui pengajuan ini ?",
                      ]);
                    }
                  },
                  'cancel' => function ($url, $model, $key) {
                    if($model->status ==3){
                    return Html::a("<i class='fa fa-times'></i>", ["cancel", "id"=>$model->id], [
                        "class"=>"btn btn-danger",
                        "title"=>"Cancel",
                        "data-confirm" => "Apakah Anda yakin ingin menolak pengajuan ini ?",
                    ]);
                    }
                },
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
            ];
        }
        public static function getButtonsPrint()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Print',
                'template' => '{cetak}',
                'buttons' => [
                    'cetak' => function ($url, $model, $key) {
                        if($model->status == 4 ){
                            return Html::a("<i class='fa fa-print'></i>", ["cetak", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Cetak Pengajuan",'target' => '_blank']);
                        }
                    },
                    'cetak-kwitansi' => function ($url, $model, $key) {
                        if($model->status == 4 ){
                            return Html::a("<i class='fa fa-file'></i>", ["cetak-kwitansi", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Cetak Invoice",'target' => '_blank']);
                        }
                    },
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
        public static function getButtonsNote()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{note}',
                'header' => 'Note',
                'buttons' => [
                    'note' => function ($url, $model, $key) {
                    
                        return Html::a("<i class='fa fa-pencil'></i>", ["update-note", "id"=>$model->id], [
                            "class"=>"btn btn-warning",
                            "title"=>"Note",
                            "data-confirm" => "Apakah Anda akan mengedit catatan ?",
                        ]); 
                      
                },
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
    }

