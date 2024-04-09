<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visiteur;

/**
 * VisiteurSearch represents the model behind the search form of `app\models\Visiteur`.
 */
class VisiteurSearch extends Visiteur
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nom', 'prenom', 'login', 'mdp', 'adresse', 'cp', 'ville', 'dateEmbauche'], 'safe'],
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
        $query = Visiteur::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'dateEmbauche' => $this->dateEmbauche,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'prenom', $this->prenom])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'mdp', $this->mdp])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'ville', $this->ville]);

        return $dataProvider;
    }
}
