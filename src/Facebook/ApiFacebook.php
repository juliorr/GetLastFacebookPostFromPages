<?php
namespace GetLastFacebookPostFromPages\Facebook;

/**
 * Dto for Api calls
 */
class ApiFacebookDto
{
    /** @var  string */
    private $page;

    /** @var int  */
    private $elementsRequested;

    /** @var int */
    private $appId;

    /** @var string */
    private $appSecret;

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getElementsRequested()
    {
        return $this->elementsRequested;
    }

    /**
     * @param int $elementsRequested
     */
    public function setElementsRequested($elementsRequested)
    {
        $this->elementsRequested = $elementsRequested;
    }

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param int $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
    }
}
