<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visiteur".
 *
 * @property string $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $login
 * @property string|null $mdp
 * @property string|null $adresse
 * @property string|null $cp
 * @property string|null $ville
 * @property string|null $dateEmbauche
 * @property string $carteGrise
 *
 * @property Fichefrais[] $fichefrais
 */
class Visiteur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visiteur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'carteGrise'], 'required'],
            [['dateEmbauche'], 'safe'],
            [['id'], 'string', 'max' => 4],
            [['nom', 'prenom', 'adresse', 'ville'], 'string', 'max' => 30],
            [['login', 'mdp'], 'string', 'max' => 20],
            [['cp'], 'string', 'max' => 5],
            [['carteGrise'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'login' => 'Login',
            'mdp' => 'Mdp',
            'adresse' => 'Adresse',
            'cp' => 'Cp',
            'ville' => 'Ville',
            'dateEmbauche' => 'Date Embauche',
            'carteGrise' => 'Carte Grise',
        ];
    }

    /**
     * Gets query for [[Fichefrais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFichefrais()
    {
        return $this->hasMany(Fichefrais::class, ['idVisiteur' => 'id']);
    }
}
