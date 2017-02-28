import os
import sys
import subprocess



args = ("./darknet", "detect", "cfg/yolo.cfg", "yolo.weights", sys.argv[1])

popen = subprocess.Popen(args, stdout=subprocess.PIPE)
popen.wait()
output = popen.stdout.read()
print output






