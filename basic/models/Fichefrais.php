<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fichefrais".
 *
 * @property string $idVisiteur
 * @property string $mois
 * @property int|null $nbJustificatifs
 * @property float|null $montantValide
 * @property string|null $dateModif
 * @property string|null $idEtat
 *
 * @property Etat $idEtat0
 * @property Fraisforfait[] $idFraisForfaits
 * @property Visiteur $idVisiteur0
 * @property Lignefraisforfait[] $lignefraisforfaits
 * @property Lignefraishorsforfait[] $lignefraishorsforfaits
 */
class Fichefrais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichefrais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVisiteur', 'mois'], 'required'],
            [['nbJustificatifs'], 'integer'],
            [['montantValide'], 'number'],
            [['dateModif'], 'safe'],
            [['idVisiteur'], 'string', 'max' => 4],
            [['mois'], 'string', 'max' => 6],
            [['idEtat'], 'string', 'max' => 2],
            [['idVisiteur', 'mois'], 'unique', 'targetAttribute' => ['idVisiteur', 'mois']],
            [['idEtat'], 'exist', 'skipOnError' => true, 'targetClass' => Etat::class, 'targetAttribute' => ['idEtat' => 'id']],
            [['idVisiteur'], 'exist', 'skipOnError' => true, 'targetClass' => Visiteur::class, 'targetAttribute' => ['idVisiteur' => 'id']],
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
            'nbJustificatifs' => 'Nb Justificatifs',
            'montantValide' => 'Montant Valide',
            'dateModif' => 'Date Modif',
            'idEtat' => 'Id Etat',
        ];
    }

    /**
     * Gets query for [[IdEtat0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEtat0()
    {
        return $this->hasOne(Etat::class, ['id' => 'idEtat']);
    }

    /**
     * Gets query for [[IdFraisForfaits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdFraisForfaits()
    {
        return $this->hasMany(Fraisforfait::class, ['id' => 'idFraisForfait'])->viaTable('lignefraisforfait', ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']);
    }

    /**
     * Gets query for [[IdVisiteur0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVisiteur0()
    {
        return $this->hasOne(Visiteur::class, ['id' => 'idVisiteur']);
    }

    /**
     * Gets query for [[Lignefraisforfaits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLignefraisforfaits()
    {
        return $this->hasMany(Lignefraisforfait::class, ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']);
    }

    /**
     * Gets query for [[Lignefraishorsforfaits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLignefraishorsforfaits()
    {
        return $this->hasMany(Lignefraishorsforfait::class, ['idVisiteur' => 'idVisiteur', 'mois' => 'mois']);
    }

    public function createFicheFrais()
{
    // Récupérer l'ID de l'utilisateur connecté
    $userId = Yii::$app->user->getId();
    
    // Récupérer le mois actuel au format 'YYYYMM'
    $currentMonth = date('m');
    
    // Vérifier si la combinaison "mois" et "idEtat" existe déjà dans la table
    $existingFicheFrais = Fichefrais::find()
        ->where(['idVisiteur' => $userId, 'mois' => $currentMonth, 'idEtat' => 'CR'])
        ->exists();
    
    if (!$existingFicheFrais) {
        // La combinaison "mois" et "idEtat" n'existe pas, créer une nouvelle entrée
        $ficheFrais = new Fichefrais();
        $ficheFrais->idVisiteur = $userId;
        $ficheFrais->mois = $currentMonth;
        $ficheFrais->idEtat = 'CR';
        
        if ($ficheFrais->save()) {
            // La fiche de frais a été créée avec succès
            return true;
        } else {
            // Erreur lors de la sauvegarde de la fiche de frais
            return false;
        }
    }
    
    // La combinaison "mois" et "idEtat" existe déjà, rien à faire
    return true;
}

}
