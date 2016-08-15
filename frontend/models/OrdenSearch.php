<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Orden;

/**
 * OrdenSearch represents the model behind the search form about `frontend\models\Orden`.
 */
class OrdenSearch extends Orden
{
	public $fecha_desde;
	public $fecha_hasta;
	public $rango_fecha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['fecha', 'rango_fecha', 'fecha_desde', 'fecha_hasta', 'estado'], 'safe'],
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
        $query = Orden::find();

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
            'cliente_id' => $this->cliente_id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

		if (isset($this->rango_fecha) && !empty($this->rango_fecha)) {
			list($this->fecha_desde, $this->fecha_hasta) = explode(' - ', $this->rango_fecha);}

		$query->andFilterWhere(['>=', 'fecha', $this->fecha_desde]);

		$query->andFilterWhere(['<=', 'fecha', $this->fecha_hasta]);

        return $dataProvider;
    }
}
