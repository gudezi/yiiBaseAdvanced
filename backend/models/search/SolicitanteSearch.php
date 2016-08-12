<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Solicitante;

/**
 * SolicitanteSearch represents the model behind the search form about `backend\models\Solicitante`.
 */
class SolicitanteSearch extends Solicitante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'estado_civil_id', 'sexo_id'], 'integer'],
            [['nombre', 'apellido', 'numero_identificacion', 'fecha_nacimiento', 'nacionalidad', 'email', 'telefono_movil'], 'safe'],
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
        $query = Solicitante::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'estado_civil_id' => $this->estado_civil_id,
            'sexo_id' => $this->sexo_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'numero_identificacion', $this->numero_identificacion])
            ->andFilterWhere(['like', 'nacionalidad', $this->nacionalidad])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefono_movil', $this->telefono_movil]);

        return $dataProvider;
    }
}
