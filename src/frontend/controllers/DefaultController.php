<?php

namespace johnnymcweed\person\frontend\controllers;

use johnnymcweed\person\models\Person;
use yii\data\ActiveDataProvider;

class DefaultController extends \luya\web\Controller
{
    // TODO: Access control

    public function actionPeople()
    {
        // render your file
        $provider = new ActiveDataProvider([
            'query' => Person::find()->andWhere(['is_deleted' => false]),
        ]);

        return $this->render('people', [
            'provider' => $provider
        ]);
    }

    /**
     * Single Event
     *
     * @param $id
     * @param $title
     * @return string|\yii\web\Response
     */
    public function actionPerson($id)
    {
        $model = Person::findOne(['id' => $id, 'is_deleted' => false]);

        if (!$model) {
            return $this->goHome();
        }

        return $this->render('person', [
            'model' => $model,
        ]);
    }
}