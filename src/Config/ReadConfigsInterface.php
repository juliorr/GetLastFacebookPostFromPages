<?php
namespace GetLastFacebookPostFromPages\Config;

interface ReadConfigsInterface
{
    /**
     * Return the value of one config
     * @param string $name
     * @return mixed
     */
    public function getConfig($name);
}
