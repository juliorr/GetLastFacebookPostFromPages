<?php
namespace GetLastFacebookPostFromPages\FanPages;

use Facebook\FacebookRequest;
use GetLastFacebookPostFromPages\Facebook\ApiFacebookDto;

class GetPosts implements GetPostsInterface
{

    public function getPostsOldest(ApiFacebookDto $request)
    {
        $this->getFromFacebook($request);
    }

    private function getFromFacebook(ApiFacebookDto $request)
    {
        $facebookRequest = new FacebookRequest(
            $session,
            'GET',
            "/{$request->getPage()}/feed"
        );
        $response = $facebookRequest->execute();
        $graphObject = $response->getGraphObject();
        var_dump($graphObject);
    }
}