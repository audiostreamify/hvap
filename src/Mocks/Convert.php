<?php

namespace Audiostreamify\Hvap\Mocks;

use Exception;

trait Convert
{
  /**
   * Convert file to a flac format using sox
   *
   * @param  string $file File destination
   * @param  bool $force Overwrite file
   * @return bool
   */
  public function toFlac(?string $file = null, bool $force = false) : bool
  {
    /**
     * If the source file is not a wav file, then throw a new exception.
     */
    if ($this->extension($this->file) !== 'wav')
      throw new Exception('File cannot be converted.');

    /**
     * If $file is null, then remove the extension of the source file and
     * assign the flac extension.
     *
     * if $file is not null but does not contain the flac extension, then
     * assign the flac extension.
     */
    if ($file == null) {
      $file = substr($this->file, 0, strrpos($this->file, '.')) . '.flac';
    } elseif (!ends_with($file, '.flac')) {
      $file .= '.flac';
    }

    /**
     * Throw a new exception if destination file already exists.
     */
    if ($force == false && file_exists($file))
      throw new Exception("\"{$file}\" already exists.");

    /**
     * Save the new file.
     */
    exec("sox {$this->file} $file");

    /**
     * Check if file exists
     */
    return file_exists($file);
  }
}