<?php

namespace Audiostreamify\Hvap\Mocks;

trait Extensions
{
  /**
   * $extension FIle extension.
   *
   * @var string
   */
  protected $extension;

  /**
   * $supported A list of supported extensions.
   *
   * @var array
   */
  protected $supported = [
    'wav',
    'ogg',
    'flac',
  ];

  /**
   * Get file extension
   *
   * @return string
   */
  public function extension() : string
  {
    /**
     * Returns the file extension using PATHINFO
     */
    return $this->extension ?? $this->extension = pathinfo($this->file, PATHINFO_EXTENSION);
  }

  /**
   * Check if file is wav.
   *
   * @return bool
   */
  public function isWav() : bool
  {
    /**
     * Use the extension method to check if the audio is a wav file
     */
    return $this->extension() == 'wav';
  }

  /**
   * Check if file is mp3.
   *
   * @return bool
   */
  public function isMp3() : bool
  {
    /**
     * Use the extension method to check if the audio is a mp3 file
     */
    return $this->extension() == 'mp3';
  }

  /**
   * Check if file is ogg.
   *
   * @return bool
   */
  public function isOgg() : bool
  {
    /**
     * Use the extension method to check if the audio is a ogg file
     */
    return $this->extension() == 'ogg';
  }

  /**
   * Check if file is flac.
   *
   * @return bool
   */
  public function isFlac() : bool
  {
    /**
     * Use the extension method to check if the audio is a flac file
     */
    return $this->extension() == 'flac';
  }

  /**
   * Check if file is supported.
   *
   * @return bool
   */
  public function isSupported() : bool
  {
    /**
     * Compare the file extension with the supported extensions
     */
    return in_array($this->extension(), $this->supported);
  }
}