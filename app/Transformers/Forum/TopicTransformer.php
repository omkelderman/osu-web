<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Transformers\Forum;

use App\Models\Forum\Topic;
use App\Transformers\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    public function transform(Topic $topic)
    {
        return [
            'created_at' => json_time($topic->topic_time),
            'deleted_at' => json_time($topic->deleted_at),
            'first_post_id' => $topic->topic_first_post_id,
            'forum_id' => $topic->forum_id,
            'id' => $topic->getKey(),
            'is_locked' => $topic->isLocked(),
            'last_post_id' => $topic->topic_last_post_id,
            'post_count' => $topic->postCount(),
            'title' => $topic->topic_title,
            'type' => $topic->typeStr($topic->topic_type),
            'updated_at' => json_time($topic->topic_last_post_time),
            'user_id' => $topic->topic_poster,
        ];
    }
}
