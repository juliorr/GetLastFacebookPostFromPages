<?php
namespace GetLastFacebookPostFromPages\FanPages;

use GetLastFacebookPostFromPages\Facebook\ApiFacebookDto;

/**
 * Getting the post from one  fan page from facebook
 */
interface GetPostsInterface
{
    /**
     * @param ApiFacebookDto $request
     * @return array
     */
    public function getPostsOldest(ApiFacebookDto $request);
}