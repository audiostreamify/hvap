<?php

namespace Audiostreamify\Hvap\Mocks;

use getID3;

trait Cover
{
  /**
   * Get album art as base64 encoded data
   *
   * @return string|null
   */
  public function cover()
  {
    /**
     * Instantiate the getID3 class
     */
    $getID3 = ($this->id3 ?? $this->id3 = new getID3);

    /**
     * Analyze the file and get the file formaat from the info variable.
     * Then return the image as a base64 encoded string
     */
    $info  = $getID3->analyze($this->file);

    /**
     * If image cannot be found, return null
     */
    if (
      !isset($info['comments']['picture'][0]['data']) ||
      $info['comments']['picture'][0]['data'] == null
    )
      return null;

    $image = $getID3->GetFileFormat($info['comments']['picture'][0]['data']);

    return 'data:' . $image['mime_type'] . ';base64,' . base64_encode($info['comments']['picture'][0]['data']);
  }
}
