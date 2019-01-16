import json

from os import path
from mutagen import File
from core.Console import Color

class HVAP:
  def __init__(self):
    self

  def version(self):
    """
    Get HVAP version

    @param self: Intance.
    @return: the HVAP version.
    """
    basepath = path.dirname(__file__)
    composer = path.abspath(path.join(basepath, "..", "..", "composer.json"))

    with open(composer) as f:
      data = json.load(f)
      return 'Hyper Virtual Audio Processor ' + Color.OKGREEN + data['version'] + Color.ENDC

  def displayHelp(self):
    """
    Get HVAP help
    """
    return """
{0}Usage: {1}
  command [options] [arguments]
{0}
Options:
  -h, --help{1}     Display this help message
{0}  -V, --version{1}  Display this application version
{0}
Available commands:
  tags{1} [audio]                Get audio tags
""".format(Color.OKGREEN, Color.ENDC)

  def tags(self, audio):
    """
    Get audio tags

    @param self: Intance
    @param audio: Audio file
    @return: Audio tags
    """
    file = File(audio)
    return file.tags
