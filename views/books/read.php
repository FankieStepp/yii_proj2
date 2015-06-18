<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Readers;
use app\models\Authors;

/* @var $this yii\web\View */
$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about"><?= Html::csrfMetaTags() ?>
    <h1><?php echo $data->name; ?> </h1>
	<table><tr><td width=400>

	<b>Авторы:</b><br>
	<?php echo $data->getAuthors($data->id); ?><br>
	
	<?php
			$form = ActiveForm::begin(['id' => 'authors-form','options' => ['class' => 'form-horizontal' ],]);

			$model2 = new Authors;
			echo Html::activeDropDownList($model2, 'id',
			ArrayHelper::map(Authors::find()->all(), 'id', 'name'));
			echo Html::submitButton('Добавить автора');
			ActiveForm::end();
	?>
	<br>
	    Дата внесения в базу: <?php echo $data->creat; ?><br>
		Дата последнего изменения: <?php echo $data->upd; ?><br><br>
	</td><td>
		<?php 
		if ($data->pic)
			echo "<div style='position: relative; left: 190px;'><img src=pics/_".$data->pic." style='float: right;' width=200></div>";
	?>
	</td></tr></table>

	<form action="/demo/web/pics/post_file.php" class="dropzone"  id="myDropzone"> 
			
			<div class="fake-file" id='fakeBtn' style='padding: 9px; position: relative; left: 40%;' >Выбрать файл</div></form>
			<div id='gonext' style='z-index: 1; position: relative; top: -100px; left: -690px;display: inline; float: right;'>
					Ок, изображение успешно загружено. <br>
					
					<form method=post >
					<input type=hidden name=fnam  id='fname'>
					<input type=hidden name=book_id value='<?php echo $data->id; ?>'>
					<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
					<button  type='submit' class="fake-file" >Сохранить</button>
					</form>
			
				</div>
<script language=Javascript>	
			var myDropzone = new Dropzone("#myDropzone");		
			myDropzone.on("complete", function(file) {
					
					 $('#fname').val(file.name);
					 $('#fakeBtn').hide();
					 
					 $('#gonext').show();
					 
			});
</script>
	<script language=Javascript>
$(document).ready(function(){
	
	$( "#fakeBtn" ).click(function() {
		$( "#myDropzone" ).click();
	});
	 $('#gonext').hide();
});
</script>
	<hr>
	<?php if ($data->reader)
		{ 
			echo "Книга занята! <br>"; 
			echo Html::a('Освободить книгу (отвязать от читателя)', array('books/unlink', 'id'=>$data->id), ['class'=>'btn btn-primary']); 
		} else {
			echo "<b>Привязать к пользователю?</b><br>";
			
			$form = ActiveForm::begin(['id' => 'active-form','options' => ['class' => 'form-horizontal' ],]);

			$model = new Readers;
			echo Html::activeDropDownList($model, 'id',
		ArrayHelper::map(Readers::find()->all(), 'id', 'name'));
			echo Html::submitButton('Привязать');
			ActiveForm::end();

		}
	?>
	<br><br>
    <code><?= __FILE__ ?></code>
</div>
