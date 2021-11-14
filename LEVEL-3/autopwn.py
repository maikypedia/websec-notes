# -*- coding: utf-8 -*-
import hashlib

sha1 = lambda x:hashlib.sha1(str(x)).hexdigest()

i = 200000
while True:
    if sha1(i).startswith("7c00"):
        print(i)
        break
    i += 1