<?php

namespace Garbetjie\WeChatClient\Messaging\Type;

interface MessageTypeInterface
{
    /**
     * Returns the message type, as used in the WeChat API.
     *
     * @return string
     */
    public function getType ();
}