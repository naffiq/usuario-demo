<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            ['author_id', 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\queries\PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\queries\PostsQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(\Da\User\Model\User::className(), ['id' => 'author_id']);
    }

    public function behaviors()
    {
        return [
            'blame' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => false,
            ]
        ];
    }
}
