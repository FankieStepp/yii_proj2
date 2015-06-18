<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Books;
use app\models\Authors;
use yii\db\Query;

class BooksController extends Controller
{
    public function actionIndex()
	{
		$post = new Books;
		$authors = new Authors;

		$authors_list = $authors->find()->all();

		if (isset($_GET['nam']) || isset($_GET['author']))
		{
			$str = $_GET['nam'];
			$auth = 1*$_GET['author'];

			if ($auth > 0)
				$data = Books::findBySql("SELECT * FROM books LEFT JOIN book_authors ON books.id = book_authors.book_id WHERE ".
					"book_authors.author_id = ".$auth." and books.name like '%$str%'")->all();
			else
				$data = Books::findBySql("Select * from books where name like '%$str%'")->all();
			// print "it works! $str";	exit;	
		} else 
			$data = $post->find()->all();

		echo $this->render('index', array( 'data' => $data, 'authors' => $authors_list ));
	}
	
	public function actionRead($id=NULL)
	{
		if ($id === NULL)
            		return -1;
		
		$post = new Books;
		
		if (isset($_POST['book_id']) && isset($_POST['fnam']))
		{
			$book = 1*$_POST['book_id'];
			$file = $_POST['fnam'];

			$nam = preg_replace('/\s+/', '', $file);
			$file = preg_replace ("/[^a-zA-Z_0-9.]/","",$nam);

			$post->addCover($book, $file);
		}	

		if (isset($_POST['Authors']['id']))
		{
			$aid = 1*$_POST['Authors']['id'];
			// return "$aid , $id";
			
			$post->addAuthor($id, $aid);
		}
		
		if (isset($_POST['Readers']['id']))
		{
			$uid = 1*$_POST['Readers']['id'];
			
			$post = new Books;
			$data = $post->find()->where(['id' => $id])->one();
			$data->reader = $uid;
			$data->save();
		}
			
		$data = $post->find()->where(['id' => $id])->one();
		
		if ($post === NULL)
            		return -1;
		
		echo $this->render('read', array( 'data' => $data ));
	}
	
	public function actionUnlink($id=NULL)
	{	
		$post = new Books;
		$data = $post->find()->where(['id' => $id])->one();
		
		//if ($post === NULL)
        //    return -1;
		
		$data->reader = 0;
		$data->save();
		
		echo $this->render('read', array( 'data' => $data ));
	}
	
	public function actionCreate()
	{
		$model = new Books;
		
		$model->load(Yii::$app->request->post());
        
        		// You can then do the following
    		if ($model->save()) {
    			return $this->actionIndex();
        	}
    
 
		echo $this->render('create', array( 'model' => $model  ));
	}
	
	
	
}
