<?php
class RequestController extends Controller
{
	public function actions()
	{
		return array(
			'suggestCompany'=>array(
													'class'=>'ext.actions.XSuggestAction',
													'modelName'=>'Company',
													'methodName'=>'suggest',
												),
		 'suggestProject'=>array(
													'class'=>'ext.actions.XSuggestAction',
													'modelName'=>'Project',
													'methodName'=>'suggest',
												),
		);
	}
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array(
					'suggestCompany',
					'suggestProject',
				),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}
?>