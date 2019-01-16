#!/usr/local/bin/python
import sys

from core.HVAP import HVAP

# Get all arguments.
# And remove the first argument.
argument = sys.argv[1:];

if len(argument) == 0:
  print(HVAP().version())
  print(HVAP().displayHelp())
elif len(argument) == 1:
  if (argument[0] == '-h' or argument[0] == '--help'):
    print(HVAP().displayHelp())
  elif (argument[0] == '-v' or argument[0] == '--version'):
    print(HVAP().version())
  else:
    print(HVAP().version())
    print(HVAP().displayHelp())
elif len(argument) == 2 and argument[0] == 'tags':
  print(HVAP().tags(argument[1]))
else:
  print(HVAP().version())
  print(HVAP().displayHelp())

# exit
