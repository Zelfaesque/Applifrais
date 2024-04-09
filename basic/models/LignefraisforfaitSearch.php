<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lignefraisforfait;
use yii\db\Expression;

/**
 * LignefraisforfaitSearch represents the model behind the search form of `app\models\Lignefraisforfait`.
 */
class LignefraisforfaitSearch extends Lignefraisforfait
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVisiteur', 'mois', 'idFraisForfait', 'Date'], 'safe'],
            [['quantite'], 'integer'],
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
        $query = Lignefraisforfait::find();

        // add conditions that should always apply here

        $threeMonthsAgo = new Expression('DATE_SUB(NOW(), INTERVAL 1 MONTH)');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
            ->andWhere(['>=', 'Date', $threeMonthsAgo]),
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'quantite' => $this->quantite,
            'Date' => $this->Date,
        ]);

        $query->andFilterWhere(['like', 'idVisiteur', $this->idVisiteur])
            ->andFilterWhere(['like', 'mois', $this->mois])
            ->andFilterWhere(['like', 'idFraisForfait', $this->idFraisForfait]);

        return $dataProvider;
    }
}
