<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about"><?= Html::csrfMetaTags() ?>
    <h1><?= Html::encode($this->title) ?> </h1>
    <form method=GET action=index.php>
    Автор: <select name=author >
<?php
	foreach ($authors as $auth)
	{
		echo "<option value=".$auth->id." >".$auth->name."</option>\n";
	}
?>
</select>
    <input type=hidden name=r value='books/index'> 
    <!-- <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />  -->
    <input type=text name=nam placeholder='название книги' >
    <input type=submit value='найти'>
    </form>

	 <div style="float: right;margin: 5px;"> <?php echo Html::a('Добавить книгу', array('books/create'), ['class'=>'btn btn-primary']); ?></div><br>
	<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Название</td>
	<td>Обложка</td>
	<td>Авторы</td>
        <td>Дата публикации</td>
        <td>Дата изменения</td>
	<td>Edit</td>
	<td>Del</td>
    </tr>
    <?php foreach ($data as $bk): ?>
        <tr>
            <td>
                <?php echo $bk->id; ?>
            </td>
            <td><?php echo $bk->name; ?></td>
	    <td><?php if ($bk->pic)
		{ 
			echo "<a class='fancybox' id='example_".$bk->id."' href='pics/_".$bk->pic."' ><img src=pics/_".$bk->pic." width=140> ";
		} 
		?> </td>
	    <td><?php echo $bk->getAuthors($bk->id); ?></td>
            <td><?php echo $bk->creat; ?></td>
             <td><?php echo $bk->upd; ?></td>
	<td><?php echo Html::a('Edit', array('books/read', 'id'=>$bk->id),['target'=>'_blank']); ?></td>
	<td><?php echo Html::a('Del', array('books/read', 'id'=>$bk->id)); ?></td>
		<!--	 <td><?php if ($bk->reader) echo "Книга занята"; ?></td> -->

        </tr>
    <?php endforeach; ?>
	</table>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
	<hr>
	<h3>Отчеты</h3>
	<?php echo Html::a("&curren; Спискок авторов, чьи книги в данный момент читает более трех читателей", array('report/index')); ?><br><br>
	<?php echo Html::a("&curren; Список книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.", array('report/index2')); ?><br><br>
	<?php echo Html::a("&curren; Пять случайных книг", array('report/random')); ?><br><br>

    <code><?= __FILE__ ?></code>
</div>
