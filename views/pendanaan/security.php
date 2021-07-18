<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Request;

/* @var $this yii\web\View */
// var_dump($bg);
// die;
$this->title = 'CARIDANA';
?>
<style type="text/css">
    @media(min-width: 900px) {
        body {
            background-image: url("<?php echo \Yii::$app->request->BaseUrl.'/uploads/setting/'.$bg ?>");
            background-color: #FFA500;
            background-size: cover;
            overflow-y: hidden;
        }
        form {
            width: 30%;
            padding: 2%;
            margin-left: 34%;
            transform: translateY(-2%);
        }
        .wrap {
            transform: translateY(-4%);
            height: 110%;
            background: rgba(250, 171, 53, 0.7);
            
        }
        input[type='button'] {
            background: transparent;
            color: white;
            font-weight: bold;
            font-size: 35px;
            width: 200%;
            height: 70px;
            border-radius: 50%;
            border: 2px solid white;
            margin-bottom: 20px;
        }
        input[name='display'] {
            font-size: 20px;
            width: 100%;
            height: 50px;
            margin-bottom: 30px;
            border: 2px solid white;
        }
        td {
            padding-left: 24px;
            padding-right: 30px;
            padding-top: 5px;
        }
        .btn {
            background: transparent;
            border: 2px solid white;
            width: 50%;
            font-weight: bold;
            color: white;
            margin-right: 1.5%;
            margin-left: 1.5%;
        }
        a {
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: 2px solid white;
            border-radius: 10px;
            padding: 10px;
        }
        .bottom {
            display: inline-flex;
        }
    }

</style>

<div class="site-index">

    <div class="body-content">

        <?= Html::a( '<<< Go Back', Yii::$app->request->referrer); ?>

        <form action="<?= Url::to(['/pendanaan/index']) ?>" name="pin" style="text-align: center;" method="post">
            <p style="color: white;font-weight: bold;font-size: 40px">Security Page</p>
            <table>
                <tr>
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">
                    <input type="text" name="display" id="display">
                </tr>
                <tr>
                  <td><input type="button" name="one" value="1" onclick="pin.display.value += '1'"></td>
                  <td><input type="button" name="two" value="2" onclick="pin.display.value += '2'"></td>
                  <td><input type="button" name="three" value="3" onclick="pin.display.value += '3'"></td>
               </tr>
               <tr>
                  <td><input type="button" name="four" value="4" onclick="pin.display.value += '4'"></td>
                  <td><input type="button" name="five" value="5" onclick="pin.display.value += '5'"></td>
                  <td><input type="button" name="six" value="6" onclick="pin.display.value += '6'"></td>
               </tr>
               <tr>
                  <td><input type="button" name="seven" value="7" onclick="pin.display.value += '7'"></td>
                  <td><input type="button" name="eight" value="8" onclick="pin.display.value += '8'"></td>
                  <td><input type="button" name="nine" value="9" onclick="pin.display.value += '9'"></td>
               </tr>
            </table>
            <div class="bottom">
                <input class="btn" value="clear" onclick="document.getElementById('display').value = ''" readonly>
                <input class="btn" type="submit">
            </div>
        </form>

    </div>
</div>
<script>
    if (`<?= Yii::$app->session->getFlash('Failed') ?>`) {
        alert(`<?= Yii::$app->session->getFlash('Failed') ?>`);
    }
</script>