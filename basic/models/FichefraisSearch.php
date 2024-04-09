<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fichefrais;

/**
 * FichefraisSearch represents the model behind the search form of `app\models\Fichefrais`.
 */
class FichefraisSearch extends Fichefrais
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVisiteur', 'mois', 'dateModif', 'idEtat'], 'safe'],
            [['nbJustificatifs'], 'integer'],
            [['montantValide'], 'number'],
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
        $query = Fichefrais::find()->joinWith('fraisforfait');

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
            'nbJustificatifs' => $this->nbJustificatifs,
            'montantValide' => $this->montantValide,
            'dateModif' => $this->dateModif,
        ]);

        $query->andFilterWhere(['like', 'idVisiteur', $this->idVisiteur])
            ->andFilterWhere(['like', 'mois', $this->mois])
            ->andFilterWhere(['like', 'idEtat', $this->idEtat]);

        return $dataProvider;
    }

}
