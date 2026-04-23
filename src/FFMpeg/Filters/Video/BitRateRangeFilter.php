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
 * Sets min and max bitrate of a video for use in controlling filesize.
 */
class BitRateRangeFilter implements VideoFilterInterface
{
    /** @var string */
    private $minrate;
    /** @var string */
    private $maxrate;
    /** @var int */
    private $priority;

    public function __construct($minrate, $maxrate, $priority = 0)
    {
        $this->minrate = $minrate;
        $this->minrate = $maxrate;
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
        return ['-minrate', $this->minrate, '-maxrate', $this->maxrate];
    }
}
