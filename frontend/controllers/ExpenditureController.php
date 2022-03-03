<?php

namespace frontend\controllers;

use common\models\Expenditure;
use common\models\Search\ExpenditureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpenditureController implements the CRUD actions for Expenditure model.
 */
class ExpenditureController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Expenditure models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExpenditureSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expenditure model.
     * @param int $exp_id Exp ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($exp_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($exp_id),
        ]);
    }

    /**
     * Creates a new Expenditure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Expenditure();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'exp_id' => $model->exp_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Expenditure model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $exp_id Exp ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($exp_id)
    {
        $model = $this->findModel($exp_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'exp_id' => $model->exp_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Expenditure model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $exp_id Exp ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($exp_id)
    {
        $this->findModel($exp_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Expenditure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $exp_id Exp ID
     * @return Expenditure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($exp_id)
    {
        if (($model = Expenditure::findOne(['exp_id' => $exp_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
