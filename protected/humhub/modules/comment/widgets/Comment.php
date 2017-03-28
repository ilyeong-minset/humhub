<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\comment\widgets;

use yii\helpers\Url;

/**
 * This widget is used to show a single comment.
 * It will used by the CommentsWidget and the CommentController to show comments.
 *
 * @package humhub.modules_core.comment
 */
class Comment extends \yii\base\Widget
{

    /**
     * @var \humhub\modules\comment\models\Comment the comment
     */
    public $comment = null;

    /**
     * @var boolean indicator that comment has just changed
     */
    public $justEdited = false;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $deleteUrl = Url::to(['/comment/comment/delete', 'contentModel' => $this->comment->object_model, 'contentId' => $this->comment->object_id, 'id' => $this->comment->id]);
        $editUrl = Url::to(['/comment/comment/edit', 'contentModel' => $this->comment->object_model, 'contentId' => $this->comment->object_id, 'id' => $this->comment->id]);
        $loadUrl = Url::to(['/comment/comment/load', 'contentModel' => $this->comment->object_model, 'contentId' => $this->comment->object_id, 'id' => $this->comment->id]);

        return $this->render('showComment', [
                    'comment' => $this->comment,
                    'user' => $this->comment->user,
                    'justEdited' => $this->justEdited,
                    'deleteUrl' => $deleteUrl,
                    'editUrl' => $editUrl,
                    'loadUrl' => $loadUrl,
                    'canWrite' => $this->comment->canWrite(),
                    'canDelete' => $this->comment->canDelete(),
        ]);
    }

}
