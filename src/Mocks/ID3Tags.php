<?php

namespace Audiostreamify\Hvap\Mocks;

use getID3;

trait ID3Tags
{
  /**
   * $id3
   *
   * @var getID3
   */
  protected $id3;

  /**
   * Analyze audio information
   *
   * @return array|null
   */
  public function analyze() : ?array
  {
    /**
     * Assign a new instance of the id3 class if it has not
     * been assigned yet, then analyze the audio file.
     */
    return ($this->id3 ?? $this->id3 = new getID3)
              ->analyze($this->file);
  }
}