<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lignefraisforfait".
 *
 * @property string $idVisiteur
 * @property string $mois
 * @property string $idFraisForfait
 * @property int|null $quantite
 * @property string|null $Date
 *
 * @property Fraisforfait $idFraisForfait0
 * @property Fichefrais $idVisiteur0
 */
class Lignefraisforfait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lignefraisforfait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVisiteur', 'mois', 'idFraisForfait'], 'required'],
            [['quantite'], 'integer', 'min' => 0],
            [['Date'], 'safe'],
            [['idVisiteur'], 'string', 'max' => 4],
            [['mois'], 'string', 'max' => 6],
            [['idFraisForfait'], 'string', 'max' => 3],
            [['idVisiteur', 'mois', 'idFraisForfait'], 'unique', 'targetAttribute' => ['idVisiteur', 'mois', 'idFraisForfait']],
            [['idVisiteur', 'mois'], 'exist', 'skipOnError' => true, 'targetClass' => Fichefrais::class, 'targetAttribute' => ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']],
            [['idFraisForfait'], 'exist', 'skipOnError' => true, 'targetClass' => Fraisforfait::class, 'targetAttribute' => ['idFraisForfait' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVisiteur' => 'Id Visiteur',
            'mois' => 'Mois',
            'idFraisForfait' => 'Id Frais Forfait',
            'quantite' => 'Quantite',
            'Date' => 'Date',
        ];
    }

    /**
     * Gets query for [[IdFraisForfait0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdFraisForfait0()
    {
        return $this->hasOne(Fraisforfait::class, ['id' => 'idFraisForfait']);
    }

    /**
     * Gets query for [[IdVisiteur0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVisiteur0()
    {
        return $this->hasOne(Fichefrais::class, ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']);
    }
}
