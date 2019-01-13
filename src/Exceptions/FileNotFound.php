<?php

namespace Audiostreamify\Hvap\Exceptions;

use Exception;

class FileNotFound extends Exception
{
  /**
   * $path File location of the audio file.
   *
   * @var string
   */
  protected $path;

  /**
   * __construct
   *
   * @param  string $path
   * @return void
   */
  public function __construct(string $path)
  {
    /**
     * Point to the file and line that called the audio class
     */
    $trace = isset(debug_backtrace()[2]) ? debug_backtrace()[2] : debug_backtrace();

    foreach ($trace as $key => $value) {
      $this->{$key} = $value;
    }

    $this->message = 'File "'. ($this->path = $path) .'" does not exist';
  }

  /**
   * Return the path of the audio file.
   *
   * @return string
   */
  public function getPath() : string
  {
    return $this->path;
  }
}