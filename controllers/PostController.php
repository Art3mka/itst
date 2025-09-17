<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Post;

class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['my-posts', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionMyPosts()
    {
        $posts = Post::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        $model = new Post();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Пост успешно создан!');
                return $this->refresh();
            }
        }

        return $this->render('my-posts', [
            'posts' => $posts,
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (!$model->isAuthor()) {
            throw new NotFoundHttpException('У вас нет прав для редактирования этого поста.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Пост успешно обновлен!');
            return $this->redirect(['my-posts']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!$model->isAuthor()) {
            throw new NotFoundHttpException('У вас нет прав для удаления этого поста.');
        }

        if (Yii::$app->request->isPost) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Пост успешно удален!');
            return $this->redirect(['my-posts']);
        }

        return $this->render('delete', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Пост не найден.');
    }
}