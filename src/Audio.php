<?php

namespace Audiostreamify\Hvap;

use Audiostreamify\Hvap\Exceptions\FileNotFound;
use Audiostreamify\Hvap\Mocks\{Bpm, Extensions, Convert, Cover, ID3Tags};

class Audio
{
  use Bpm;
  use Cover;
  use Convert;
  use ID3Tags;
  use Extensions;

  /**
   * $file Path to audio file.
   *
   * @var string
   */
  protected $file;

  /**
   * $temp Location of "soundstretch" dump file.
   *
   * @var string
   */
  protected $temp;

  /**
   * __construct
   *
   * @param  string $file File path
   * @param  array|null $extensions Supported extensions
   * @return void
   */
  public function __construct(string $file, ?array $extensions = null)
  {
    /**
     * If the audio file does not exist, throw a FileNotFound exception
     * to prevent "soundstretch" from processing a file that does not
     * exist.
     *
     * Also generate unique temp file name.
     */
    if (!file_exists($file)) throw new FileNotFound($file);

    // Assign values.
    $this->file       = $file;
    $this->temp       = "/tmp/" . uniqid('hvap-', true);
    $this->extensions = $extensions ?? $this->extensions;
  }

  /**
   * Set source file
   *
   * @param  string $file File path
   * @return Audio $this
   */
  public function source(string $file) : Audio
  {
    /**
     * If the audio file does not exist, throw a FileNotFound exception
     * to prevent "soundstretch" from processing a file that does not
     * exist.
     */
    if (!file_exists($file)) throw new FileNotFound($file);

    // Assign value and return object.
    $this->file = $file;
    return $this;
  }

  /**
   * Set supported extensions
   *
   * @param  array $extensions Supported extensions
   * @return Audio $this
   */
  public function extensions(array $extensions) : Audio
  {
    // Assign value and return object.
    $this->extensions = $extensions;
    return $this;
  }
}
