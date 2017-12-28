<?php

namespace Yunpian\Sdk\Model;

/**
 *
 * @author dzh
 * @since 1.0.2
 */
class VideoFrame {
    public $index = 1;
    public $playTimes = 1; // 播放次数
    public $attachments; // FrameDatas' array

    function index($index = null, $rr = false) {
        if (isset($index) || $rr) {
            $this->index = $index;
            return $this;
        }
        return $this->index;
    }

    function playTimes($playTimes = null, $rr = false) {
        if (isset($playTimes) || $rr) {
            $this->playTimes = $playTimes;
            return $this;
        }
        return $this->playTimes;
    }

    function attachments($attachments = null, $rr = false) {
        if (isset($attachments) || $rr) {
            $this->attachments = $attachments;
            return $this;
        }
        return $this->attachments;
    }
}