<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Breadcrumbs;

$this->title = 'Business Offers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    
    <div class="content">
        We are interested in using KSWEB in your business project. In this case we are ready to give you
        flexible opportunities in licensing and discounts in acquiring multiple licenses.
        Flexible Opportunities in Licensing

        We suggest the following opportunities of licensing. License can be bound to Google account or to a unique id, identifying a concrete device. Thereby there are the following variants of licensing:

        1) Each license (serial key) is bound to a concrete Google account and can be activated on only one device. In this case when buying more than one license it is necessary to have as many different Google accounts as needed licenses.
        2) Serial key that is bound to a concrete Google account, can include in itself multiple licenses which at the same time can be activated on multiple devices.

        As it earlier stated both these license variants can be bound to a unique id of a device and in this case cannot be bound to Google account at all.

        Multiple Licenses

        When buying multiple licenses at once we suggest profitable discounts. They are presented bellow.
    </div>
                <div class="content" >
        <table border="0" width="700px" align="center">
            <tr >
                <td colspan="3">
                    KSWEB Standard – $2.99
                </td>
            </tr>
            <tr>
                <td>
                    Number of Licenses (pcs)
                </td>
                <td>
                    Markdown (%)
                </td>
                <td>
                    Price for pcs with discount ($)
                </td>
            </tr>
            <tr>
                <td>
                    6 – 50
                </td>
                <td>
                    7
                </td>
                <td>
                    2.78
                </td>
            </tr>
            <tr>
                <td>
                    51 – …
                </td>
                <td>
                    10
                </td>
                <td>
                    2.7
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    KSWEB PRO – $3.99
                </td>
            </tr>
            <tr>
                <td>
                    6 – 50
                </td>
                <td>
                   10
                </td>
                <td>
                   3.59
                </td>
            </tr>
            <tr>
                <td>
                    51 – …
                </td>
                <td>
                    15
                </td>
                <td>
                    3.39
                </td>
            </tr>
        </table>
    </div>
                
    <div class="content">
        <p>On purchasing of licenses, please, contact us <?= Html::a('dkcocto@gmail.com.', Url::to(['dkcocto@gmail.com', 'subject' => 'KSWEB License'])) ?><p>
    </div>
    
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row">'
                        . '<div class="col-lg-3">{image}</div>'
                        . '<div class="col-lg-6">{input}</div>'
                        . '</div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

We are interested in using KSWEB in your business project. In this case we are ready to give you
flexible opportunities in licensing and discounts in acquiring multiple licenses.

Flexible Opportunities in Licensing

We suggest the following opportunities of licensing. License can be bound to Google account or to a unique id, identifying a concrete device. Thereby there are the following variants of licensing:

1) Each license (serial key) is bound to a concrete Google account and can be activated on only one device. In this case when buying more than one license it is necessary to have as many different Google accounts as needed licenses.
2) Serial key that is bound to a concrete Google account, can include in itself multiple licenses which at the same time can be activated on multiple devices.

As it earlier stated both these license variants can be bound to a unique id of a device and in this case cannot be bound to Google account at all.

Multiple Licenses

When buying multiple licenses at once we suggest profitable discounts. They are presented bellow.