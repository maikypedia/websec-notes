import requests
import re

pwn = requests.session()

url = "https://websec.fr/level02/index.php"

getCookie = pwn.get(url)
print(getCookie.text)

