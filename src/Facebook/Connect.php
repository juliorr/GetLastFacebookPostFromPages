<?php
namespace GetLastFacebookPostFromPages\Facebook;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Facebook;
use GetLastFacebookPostFromPages\Config\ReadConfigs;

class Connect
{
    /** @var Facebook */
    private $facebook;

    /** @var String */
    private $accessToken;

    public function __construct(ReadConfigs $readConfigs)
    {
        $fb = new Facebook([
            'app_id' => $readConfigs->getConfig('app_id'),
            'app_secret' => $readConfigs->getConfig('app-secret'),
            'default_graph_version' => 'v2.5',
        ]);
        $this->getAccessToken();
        $this->setFacebook($fb);
    }

    /**
     * @return String
     */
    private function getAccessToken()
    {
        if (!empty($this->accessToken)) {
            return $this->accessToken;
        }

        $fb = $this->getFacebook();
        $helper = $fb->getCanvasHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            $accessToken = null;
            exit;
        }

        $fb->setDefaultAccessToken($accessToken);
        $this->setAccessToken($accessToken);
    }

    /**
     * @return Facebook
     */
    private function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param Facebook $facebook
     */
    private function setFacebook(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @param String $accessToken
     */
    private function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}