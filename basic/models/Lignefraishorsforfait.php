<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lignefraishorsforfait".
 *
 * @property int $id
 * @property string $idVisiteur
 * @property string $mois
 * @property string|null $libelle
 * @property string|null $date
 * @property float|null $montant
 *
 * @property Fichefrais $idVisiteur0
 */
class Lignefraishorsforfait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lignefraishorsforfait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVisiteur', 'mois'], 'required'],
            [['date'], 'safe'],
            [['montant'], 'number'],
            [['idVisiteur'], 'string', 'max' => 4],
            [['mois'], 'string', 'max' => 6],
            [['libelle'], 'string', 'max' => 100],
            [['idVisiteur', 'mois'], 'exist', 'skipOnError' => true, 'targetClass' => Fichefrais::className(), 'targetAttribute' => ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idVisiteur' => 'Id Visiteur',
            'mois' => 'Mois',
            'libelle' => 'Libelle',
            'date' => 'Date',
            'montant' => 'Montant',
        ];
    }

    /**
     * Gets query for [[IdVisiteur0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVisiteur0()
    {
        return $this->hasOne(Fichefrais::className(), ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']);
    }
}
