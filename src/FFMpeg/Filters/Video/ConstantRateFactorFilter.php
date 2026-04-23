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
 * Sets the constant range factor for consistent quality.
 */
class ConstantRateFactorFilter implements VideoFilterInterface
{
    /** @var string */
    private $crf;
    /** @var int */
    private $priority;

    public function __construct($crf, $priority = 0)
    {
        $this->crf = $crf;
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
        return ['-crf', $this->bitrate];
    }
}
