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
 * Sets the framereate output of the video in a simple way
 */
class BasicFrameRateFilter implements VideoFilterInterface
{
    private $start_fps;
    private $goal_fps;
    /** @var int */
    private $priority;

    public function __construct($start_fps, $goal_fps, $priority = 0)
    {
        $this->start_fps = $start_fps;
        $this->goal_fps = $goal_fps;
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
        $frame_rate_div = $this->start_fps / $this->goal_fps;
        return ['-vf', "\"setpts=${frame_rate_div}*PTS\"", '-r', $this->goal_fps];
    }
}
