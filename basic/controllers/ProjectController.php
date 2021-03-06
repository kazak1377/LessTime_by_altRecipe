<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\db\Projects;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ProjectController extends Controller
{
    public function beforeAction($action) {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException("No way to go here without authorisation");
        } else {
            return true;
        }
    }

    public function actionIndex() {
        $projectId = \Yii::$app->request->get('id');
        $project = Projects::findOne($projectId);
        return $this->render('index', ['project' => $project]);
    }
}