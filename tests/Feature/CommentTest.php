<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Comment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    public function testCreateComment()
    {
        $comment = new Comment();
        $comment->email = "alsyam@gmail.com";
        $comment->title = "Title";
        $comment->comment = "Comment";
        $comment->save();

        self::assertNotNull($comment->id);
    }

    public function testAttributesValues()
    {
        $comment = new Comment();
        $comment->email = "alsyam@gmail.com";
        $comment->save();

        self::assertNotNull($comment->id);
        self::assertNotNull($comment->title);
        self::assertNotNull($comment->comment);
    }
}
