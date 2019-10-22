<?php

namespace App\Controller;


use App\Core\BaseController;
use App\Core\Request;
use App\Core\View;
use App\Model\CommentModel;
use App\Model\PostModel;
use App\Services\CommentFaker;
use App\Services\PostFaker;

class FakerController extends BaseController
{
    public function indexAction($prams = [], Request $request)
    {
        return View::render();
    }

    public function addPostAction($prams = [], Request $request)
    {
        $postFaker = new PostFaker();
        $postModel = new PostModel();
        $fakePosts = $postFaker->getPost(1);
        $postModel->add($fakePosts);
        return View::render([], 'index.html.twig');
    }

    public function addCommentAction($prams = [], Request $request)
    {
        $commentFaker = new CommentFaker();
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $fakeComments = $commentFaker->getComment(1, $postModel->getLastId());
        $commentModel->add($fakeComments);

        return View::render([], 'index.html.twig');
    }
}