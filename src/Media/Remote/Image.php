<?php

namespace Garbetjie\WeChatClient\Media\Remote;

class Image extends Remote
{
    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getURL ()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return static
     */
    public function withURL ($url)
    {
        $new = clone $this;
        $new->url = $url;

        return $new;
    }
}
