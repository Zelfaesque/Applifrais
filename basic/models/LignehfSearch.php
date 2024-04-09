<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lignehf;
use yii\db\Expression;

/**
 * LignehfSearch represents the model behind the search form of `app\models\Lignehf`.
 */
class LignehfSearch extends Lignehf
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['idVisiteur', 'mois', 'libelle', 'date','Justificatifs'], 'safe'],
            [['montant'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lignehf::find();

        // add conditions that should always apply here

        $threeMonthsAgo = new Expression('DATE_SUB(NOW(), INTERVAL 1 MONTH)');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
            ->andWhere(['>=', 'date', $threeMonthsAgo]),
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'montant' => $this->montant,
        ]);

        $query->andFilterWhere(['like', 'idVisiteur', $this->idVisiteur])
            ->andFilterWhere(['like', 'mois', $this->mois])
            ->andFilterWhere(['like', 'libelle', $this->libelle]);

        return $dataProvider;
    }
}
