<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 30/05/16
 * Time: 00.14
 */

namespace app\components;

use app\models\Pelatihan;
use yii\helpers\Html;

class ActionButton
{
    public static function getButtons($btn_pengajuan_selanjutnya = false)
    {
        $btn = [
            'view' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
            },
            'update' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-pencil'></i>", ["update", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Edit Data"]);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-trash'></i>", ["delete", "id"=>$model->id], [
                    "class"=>"btn btn-danger",
                    "title"=>"Hapus Data",
                    "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                    //"data-method" => "GET"
                ]);
            },
        ];
        $template = '{view} {update} {delete}';
        $width = "120px";


        return [
            'class' => 'yii\grid\ActionColumn',
            'template' => $template,
            'buttons' => $btn,
            'contentOptions' => ['nowrap'=>'nowrap', 'style'=>"text-align:center"]
        ];
    }
    public static function getButtonsPengajuan()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
                    },
                    'update' => function ($url, $model, $key) {
                        if($model->status == 1 ){
                            return Html::a("<i class='fa fa-pencil'></i>", ["update", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Edit Data"]);
                        }
                    },
                    'delete' => function ($url, $model, $key) {
                        if($model->status == 1 ){
                        return Html::a("<i class='fa fa-trash'></i>", ["delete", "id"=>$model->id], [
                            "class"=>"btn btn-danger",
                            "title"=>"Hapus Data",
                            "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                            //"data-method" => "GET"
                        ]);
                    }
                    },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
        public static function getButtonsView()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
                    },
                   
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
        public static function getButtonsOrder()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
                    },
                    'update' => function ($url, $model, $key) {
                        // if($model->status == 1 ){
                            return Html::a("<i class='fa fa-pencil'></i>", ["update", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Edit Data"]);
                        // }
                    },
                //     'cetak-delivery' => function ($url, $model, $key) {
                //       if($model->status == 3 ||$model->status == 4 ){
                //           return Html::a("<i class='fa fa-print'></i>", ["cetak-delivery", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Cetak Delivery Order",'target' => '_blank']);
                //       }
                //   },
                    'delete' => function ($url, $model, $key) {
                        // if($model->status == 1 ){
                        return Html::a("<i class='fa fa-trash'></i>", ["delete", "id"=>$model->id], [
                            "class"=>"btn btn-danger",
                            "title"=>"Hapus Data",
                            "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                            //"data-method" => "GET"
                        ]);
                    // }
                    },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
        public static function getButtonsOrderPrint()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Print',
                'template' => '{cetak-invoice} {cetak-purchase} {cetak-kwitansi} ',
                'buttons' => [
                    'cetak-purchase' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-print'></i>", ["cetak-purchase", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Cetak Purchase Order",'target' => '_blank']);
                    },
                  'cetak-invoice' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-print'></i>", ["cetak-invoice", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Cetak Invoice",'target' => '_blank']);
                },
                'cetak-kwitansi' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-print'></i>", ["cetak-kwitansi", "id"=>$model->id], ["class"=>"btn btn-danger", "title"=>"Cetak Kwitansi",'target' => '_blank']);
                },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:150px']
            ];
        }
        public static function getButtonsInvoice()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
                    },
                    'update' => function ($url, $model, $key) {
                            return Html::a("<i class='fa fa-pencil'></i>", ["update", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Edit Data"]);
                        },
                    'delete' => function ($url, $model, $key) {
                        return Html::a("<i class='fa fa-trash'></i>", ["delete", "id"=>$model->id], [
                            "class"=>"btn btn-danger",
                            "title"=>"Hapus Data",
                            "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                            //"data-method" => "GET"
                        ]);
                    },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
            ];
        }
        public static function getApproveHutang()
        {
            return [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        if($model->status  == 0){
                            return Html::a("<i class='fa fa-check'></i>", ["approve", "id"=>$model->id], [
                                "class"=>"btn btn-success",
                                "title"=>"Approve Hutang Piutang",
                                "data-confirm" => "Apakah Anda yakin sudah selesai ?",
                                //"data-method" => "GET"
                            ]);
                        }
                    },
    
                ],
                'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
            ];
        }
}