<?php

namespace Audiostreamify\Hvap;

class Processor
{
  /**
   * Pass a audio file to a new Audio class instance
   *
   * @param  string $file File path
   * @param  array|null $extensions Supported extensions
   * @return Audio
   */
  public static function audio(string $file, ?array $extensions = null) : Audio
  {
    return new Audio($file, $extensions);
  }
}