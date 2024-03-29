<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $title
 *
 * @property Task[] $tasks
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['status_id' => 'id']);
    }

    public static function getStatusList()
    {
        return static::find()->select(['title'])->where(['not', ['title' => 'Проверено']])->indexBy('id')->column();  
    }

    public static function getResponseStatusList()
    {
        return static::find()->select(['title'])->where(['not', ['title' => 'Не выполнено']])->andWhere(['not', ['title' => 'Задача для группы']])->indexBy('id')->column();  
    }

}
