<?php

namespace Garbetjie\WeChatClient\Messaging;

use Garbetjie\WeChatClient\Messaging\Type\AbstractMediaMessageType;
use Garbetjie\WeChatClient\Messaging\Type\MusicMessageType;
use Garbetjie\WeChatClient\Messaging\Type\TextMessageType;
use Garbetjie\WeChatClient\Messaging\Type\MessageTypeInterface;

class BroadcastMessageFormatter
{
    /**
     * @param MessageTypeInterface $type
     *
     * @return array
     */
    public function format (MessageTypeInterface $type)
    {
        $json = ['msgtype' => $type->getType()];

        $method = 'format' . ucfirst($type->getType());
        if (method_exists($this, $method)) {
            $json[$type->getType()] = $this->$method($type);
        } elseif ($type instanceof AbstractMediaMessageType) {
            $json[$type->getType()] = ['media_id' => $type->getID()];
        }

        return $json;
    }

    /**
     * @param TextMessageType $message
     *
     * @return array
     */
    private function formatText (TextMessageType $message)
    {
        return ['content' => $message->getContent()];
    }

    /**
     * @param MusicMessageType $message
     *
     * @return array
     */
    private function formatMusic (MusicMessageType $message)
    {
        $out = [];
        $out['musicurl'] = $message->getUrl();
        $out['hqmusicurl'] = $message->getHighQualityUrl();
        $out['thumb_media_id'] = $message->getThumbnailID();

        if ($message->getTitle() !== null) {
            $out['title'] = $message->getTitle();
        }

        if ($message->getDescription() !== null) {
            $out['description'] = $message->getDescription();
        }

        return $out;
    }
}