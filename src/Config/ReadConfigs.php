<?php
namespace GetLastFacebookPostFromPages\Config;

use SplFileObject;

class ReadConfigs implements ReadConfigsInterface
{
    /** @var SplFileObject */
    private $file;
    /**
     * ReadConfigs constructor.
     * @param SplFileObject $file
     */
    public function __construct(SplFileObject $file)
    {
        $this->setFile($file);
    }

    /**
     * @inheritdoc
     */
    public function getConfig($name)
    {
        $file = $this->getFile();
        $content = $file->fread($file->getSize());
        $json = json_decode($content, true);

        if (key_exists($name, $json)) {
            return $json[$name];
        }

        return '';
    }

    /**
     * @return SplFileObject
     */
    private function getFile()
    {
        return $this->file;
    }

    /**
     * @param SplFileObject $file
     */
    private function setFile($file)
    {
        $this->file = $file;
    }

}
