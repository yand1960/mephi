import time
import random 

while True:
    data = random.randint(0,10000)
    print ("tick")
    with (open ("D:\\Apache\\htdocs\\data.html","w")) as f:
        f.write(str(data))
    time.sleep(3)
    