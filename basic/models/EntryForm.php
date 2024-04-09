<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
	public $nom;
	public $email;

	public function rules()
	{
		return [
		[['nom', 'email'], 'required'],
		['email', 'email'],
		];
	}
}
?>

<?php


$model = new EntryForm();
$model->nom = 'Qiang';
$model->email = 'mauvais';
if ($model->validate()) {
	// Bien !
} else {
	$model->getErrors();
}