<?php

class PersonaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

    public function behaviors()
    {
        return array(
            'restAPI' => array('class' => '\rest\controller\Behavior')
        );
    }

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
//            array(
//                'ext.starship.RestfullYii.filters.ERestFilter +
//                REST.GET, REST.PUT, REST.POST, REST.DELETE'
//            ),
		);
	}

//    public function actions()
//    {
//        return array(
//            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
//        );
//    }

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'gestion', 'eliminar', 'create', 'actualizar', 'verRest'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function render($view, $data = null, $return = false, array $fields = array('count', 'model', 'data'))
    {
        if (($behavior = $this->asa('restAPI')) && $behavior->getEnabled()) {
            if (isset($data['model']) && $this->isRestService() &&
                count(array_intersect(array_keys($data), $fields)) == 1) {
                $data = $data['model'];
                $fields = null;
            }
            return $this->renderRest($view, $data, $return, $fields);
        } else {
            return parent::render($view, $data, $return);
        }
    }

	// ------------------ ACCIONES HITO 2
	public function actionIndex(){
        if($this->isRestService()){
            $model = Persona::model()->findAll();
            $data = array(
                'model' => $model
            );
            $this->render('empty', $data);
        }
		if(isset($_REQUEST['ajax'])){
			$this->renderPartial("index");
		}else{
			$this->render("index");
		}



	}
	public function actionGestion(){
		$personas = Persona::model()->findAll();
		if(isset($_REQUEST['ajax'])){
			$this->renderPartial("gestion", array("personas"=>$personas));
		}else{
			$this->render("gestion", array("personas"=>$personas));
		}
	}
//    public function actionVerRest(){
//        $personas = $_POST['personas'];
//        if(isset($_REQUEST['ajax'])){
//            $this->renderPartial("gestion", array("personas"=>$personas));
//        }else{
//            $this->render("lista", array("personas"=>$personas));
//        }
//    }
	
	public function actionEliminar($id){
		$this->loadModel($id)->delete();
	}
	
	public function actionActualizar(){
		$id = $_POST['id'];
		$model=$this->loadModel($id);
		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if(!isset($model->estudiante)) $model->estudiante="off";
			if($model->save()){
				$personas = Persona::model()->findAll();
				$this->renderPartial("lista", array("personas"=>$personas));
			}
				
		}else{
            echo "else";
        }
	}
	
	public function actionCreate()
	{
		$model=new Persona;
		if(isset($_POST['Persona'])){
			
			$model->attributes = $_POST['Persona'];
			
			if(!isset($model->estudiante)) $model->estudiante="off";
			if($model->save())
                $this->renderPartial('_ver', array('persona'=> $model));
		}else{
            echo "else";
        }
	}
	
	// -------------------------  ACCIONES CREADAS POR YII
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		if(isset($_POST['Persona']))
		{
			$model->attributes=$_POST['Persona'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionAdmin()
	{
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	// ------------------------- METODOS NECESARIOS
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
