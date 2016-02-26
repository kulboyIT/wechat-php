<?php

namespace Garbetjie\WeChatClient\QR;

interface CodeInterface
{
    /**
     * Returns the ticket value for the QR code.
     *
     * @return string
     */
    public function ticket ();

    /**
     * Gives the URL at which the QR code can be viewed.
     *
     * @return string
     */
    public function url ();
}