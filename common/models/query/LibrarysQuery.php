<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Library]].
 *
 * @see \common\models\Library
 */
class LibrarysQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Library[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Library|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function published()
    {
        return $this->andWhere(['status' => 1]);
    }

    public function id($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}
