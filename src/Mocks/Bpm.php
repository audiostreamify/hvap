<?php

namespace Audiostreamify\Hvap\Mocks;

trait Bpm
{
  /**
   * Get bpm of audio file using soundstretch
   *
   * @return string
   */
  public function bpm() : string
  {
    /**
     * Execute the "soundstretch" program to get the bpm of the audio file
     *
     * Store the output in a temp file, then open the temp file into the
     * getBpm function and return the Detected BPM rate.
     */
    exec("soundstretch {$this->file} -bpm 1>> {$this->temp} 2>&1");
    return str_replace(PHP_EOL, '', $this->getBpm(file($this->temp)));
  }

  /**
   * Read the line that has the bpm and replace the text before the bpm
   * with an empty string
   *
   * @param  array $lines
   * @return string
   */
  private function getBpm($lines) : string
  {
    // Delete the temp file.
    unlink($this->temp);

    // Return "0", if "Detected BPM rate" is not found.
    if (!str_contains(implode(' ', $lines), 'Detected BPM rate ')) return '0';

    /**
     * Search for the line that contains the "Detected BPM rate" string
     * If the line is found, replace the search with an empty string
     * then return the value that follows after (bpm).
     */
    foreach($lines as $line) {
      if (str_contains($line, 'Detected BPM rate'))
        return str_replace("Detected BPM rate ", '', $line);

      /**
       * We should probably use "$lines[9]" instead of using a loop...
       */
    }

    // Return "0", if the search was an epic fail
    return '0';
  }
}
