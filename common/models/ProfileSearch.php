<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'grupo', 'entidad', 'empresa', 'pais_id', 'provincia_id', 'partido_id', 'localidad_id'], 'integer'],
            [['apellido', 'nombre', 'perfil', 'calle', 'numero', 'piso', 'depto', 'coordenadas', 'telefono', 'celular'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Profile::find();

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
            'id' => $this->id,
            'grupo' => $this->grupo,
            'entidad' => $this->entidad,
            'empresa' => $this->empresa,
            'pais_id' => $this->pais_id,
            'provincia_id' => $this->provincia_id,
            'partido_id' => $this->partido_id,
            'localidad_id' => $this->localidad_id,
        ]);

        $query->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'perfil', $this->perfil])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'piso', $this->piso])
            ->andFilterWhere(['like', 'depto', $this->depto])
            ->andFilterWhere(['like', 'coordenadas', $this->coordenadas])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'celular', $this->celular]);

        return $dataProvider;
    }
}
