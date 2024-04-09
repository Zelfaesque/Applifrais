<?php

namespace app\models;
use app\models\Fichefrais;


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
 * @property string|null $Justificatifs
 *
 * @property Fichefrais $idVisiteur0
 */
class Lignehf extends \yii\db\ActiveRecord
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
            [['montant'], 'number', 'min' => 0],
            [['idVisiteur'], 'string', 'max' => 4],
            [['mois'], 'string', 'max' => 6],
            [['libelle'], 'string', 'max' => 100],
            [['Justificatifs'], 'string', 'max' => 255],
            [['Justificatifs'], 'file','skipOnEmpty' => true, 'extensions' => ['pdf', 'doc', 'docx']],
            [['idVisiteur', 'mois'], 'exist', 'skipOnError' => true, 'targetClass' => Fichefrais::class, 'targetAttribute' => ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']],
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
            'Justificatifs' => 'Justificatifs',
        ];
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

    public function getVisiteur()
    {
        return $this->hasone(Visiteur::class, ['idVisiteur' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Vérification de l'id "Mois"
            $ficheFrais = Fichefrais::findOne(['mois' => $this->mois]);
            if (!$ficheFrais) {
                // ID "Mois" n'existe pas dans la table "Fiche Frais"
                $this->addError('Mois', 'Mois invalide.');
                return false;
            }

            return true;
        }
        return false;
    }


    public function getFicheFrais()
    {
        return $this->hasOne(Fichefrais::class, ['Mois' => 'Mois', 'IdVisiteur' => 'IdVisiteur']);
    }

    public $fichier;
}
