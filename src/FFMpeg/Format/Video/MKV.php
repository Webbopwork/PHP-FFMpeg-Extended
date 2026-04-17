<?php

namespace FFMpeg\Format\Video;

/**
 * The MKV video format.
 */
class MKV extends DefaultVideo
{
    public function __construct($audioCodec = 'libopus', $videoCodec = 'libaom-av1')
    {
        $this
            ->setAudioCodec($audioCodec)
            ->setVideoCodec($videoCodec);
    }

    /**
     * {@inheritDoc}
     */
    public function supportBFrames()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getExtraParams()
    {
        return ['-f', 'mkv'];
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableAudioCodecs()
    {
        return ['copy', 'libvorbis', 'libopus'];
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableVideoCodecs()
    {
        return ['libvpx', 'libvpx-vp9', 'libaom-av1'];
    }
}