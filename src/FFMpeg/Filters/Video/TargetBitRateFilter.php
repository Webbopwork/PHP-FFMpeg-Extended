<?php

/*
 * This file is part of PHP-FFmpeg-Extended.
 *
 * (c) Alchemy <dev.team@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FFMpeg\Filters\Video;

use FFMpeg\Format\VideoInterface;
use FFMpeg\Media\Video;

/**
 * Sets a target bitrate, is used in combination with other factors.
 */
class TargetBitRateFilter implements VideoFilterInterface
{
    /** @var string */
    private $bitrate;
    /** @var int */
    private $priority;

    public function __construct($bitrate, $priority = 0)
    {
        $this->bitrate = $bitrate;
        $this->priority = $priority;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(Video $video, VideoInterface $format)
    {
        return ['-b:v', $this->bitrate];
    }
}
