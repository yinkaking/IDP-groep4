import socket

# import mysql.connector

# cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='waterkering')

# cursor = cnx.cursor()

# query = ("SELECT onderhoud, created_at FROM waterkerings ORDER BY id DESC LIMIT 10")

# cursor.execute(query)

# for (onderhoud, created_at) in cursor:
#     print("{}, {} ".format(onderhoud, created_at))

# cursor.close()

# cnx.close()


from urllib.parse import urlencode
from urllib.request import Request, urlopen
import time

while True:
	
	url = 'http://localhost/public/status/update' # Set destination URL here
	url2 = "http://localhost/public/toPython"
	post_fields = {'hoog': 0, 'laag': 1}     # Set POST fields here

	request = Request(url, urlencode(post_fields).encode())
	request2 = Request(url2, urlencode(post_fields).encode())

	json1 = urlopen(request).read().decode()
	json2 = urlopen(request2).read().decode()
	print("url_1"+json1)
	print("url_2"+json2)
	time.sleep(5)


# HOST = ''
# PORT = 1337

# s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# s.bind((HOST, PORT))
# s.listen(10)
# conn, addr = s.accept()

# print('Connection address:', addr)

# msg = conn.recv(1024)
# while msg != '':
# 	print("message from: " + str(addr) +" - "+str(msg))
	
# 	# conn.send(b"dingen");

