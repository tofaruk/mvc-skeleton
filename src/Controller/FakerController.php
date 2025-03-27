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
    public function indexAction( Request $request, $prams = [])
    {
        return View::render();
    }

    public function addPostAction(Request $request, $prams = [])
    {
        $postFaker = new PostFaker();
        $postModel = new PostModel();
        $fakePosts = $postFaker->getPost(1);
        $postModel->add($fakePosts);
        return View::render([], 'index.html.twig');
    }

    public function addCommentAction(Request $request, $prams = [])
    {
        $commentFaker = new CommentFaker();
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $fakeComments = $commentFaker->getComment(1, $postModel->getLastId());
        $commentModel->add($fakeComments);

        return View::render([], 'index.html.twig');
    }
}