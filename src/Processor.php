<?php

namespace Audiostreamify\Hvap;

class Processor
{
  /**
   * $audio
   *
   * @var Audio
   */
  protected static $audio;

  /**
   * Pass a audio file to a new Audio class instance
   *
   * @param  string $file File path
   * @param  array|null $extensions Supported extensions
   * @return Audio
   */
  public static function audio(string $file, ?array $extensions = null) : Audio
  {
    /**
     * Return the Audio class if it has already been instantiated
     */
    if (Processor::$audio) {
      return Processor::$audio->source($file)->extensions($extensions ?? []);
    }

    /**
     * Instantiate the Audio class and assign it to the audio property
     */
    return Processor::$audio = new Audio($file, $extensions);
  }
}
