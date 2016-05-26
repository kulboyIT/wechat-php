<?php

namespace Garbetjie\WeChatClient\Responder\Input;

use SimpleXMLElement;

class Image extends AbstractInput
{
    /**
     * @var string
     */
    private $mediaID;

    /**
     * @var string
     */
    private $url;

    /**
     * ImageMediaType constructor.
     *
     * @param SimpleXMLElement $xml
     */
    public function __construct (SimpleXMLElement $xml)
    {
        $this->mediaID = (string)$xml->MediaId;
        $this->url = (string)$xml->PicUrl;
    }

    /**
     * ImageMediaType's media ID.
     *
     * @return string
     */
    public function mediaID ()
    {
        return $this->mediaID;
    }

    /**
     * URL from which the image can be downloaded.
     *
     * @return string
     */
    public function url ()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function emits ()
    {
        return 'image';
    }
}
