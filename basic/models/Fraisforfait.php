<?php

namespace app\models;
use app\models\Lignefraisforfait;

use Yii;

/**
 * This is the model class for table "fraisforfait".
 *
 * @property string $id
 * @property string|null $libelle
 * @property float|null $montant
 *
 * @property Fichefrais[] $idVisiteurs
 * @property Lignefraisforfait[] $lignefraisforfaits
 */
class Fraisforfait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fraisforfait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['montant'], 'number'],
            [['id'], 'string', 'max' => 3],
            [['libelle'], 'string', 'max' => 20],
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
            'libelle' => 'Libelle',
            'montant' => 'Montant',
        ];
    }

    /**
     * Gets query for [[IdVisiteurs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVisiteurs()
    {
        return $this->hasMany(Fichefrais::class, ['idVisiteur' => 'idVisiteur', 'mois' => 'mois'])->viaTable('lignefraisforfait', ['idFraisForfait' => 'id']);
    }

    /**
     * Gets query for [[Lignefraisforfaits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLignefraisforfaits()
    {
        return $this->hasMany(Lignefraisforfait::class, ['idFraisForfait' => 'id']);
    }
}
