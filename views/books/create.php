<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
$this->title = 'Добавить книгу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['id' => 'my-form','options' => ['enctype'=>'multipart/form-data'] ]); ?>
<?= $form->field($model, 'name') ?>
Обложка: <input type=file name='pic' >
<?= Html::submitButton('Submit') ?>
<?php ActiveForm::end(); ?>

    <code><?= __FILE__ ?></code>
</div>
