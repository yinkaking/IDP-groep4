import socket
from urllib.parse import urlencode
from urllib.request import Request, urlopen
import time
import pickle

HOST = ''
PORT = 1337
url = 'http://localhost/public/status/update' # Set destination URL here
url2 = "http://localhost/public/toPython"

def requestData():
	request2 = Request(url2, urlencode({}).encode())
	json2 = urlopen(request2).read().decode()
	return json2

def sendData(toSend):
	request = Request(url, urlencode(post_fields).encode())
	json1 = urlopen(request).read().decode()
	return json1


s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(10)

conn, addr = s.accept()
print('Connection address:', addr)

msg = conn.recv(1024)
while len(msg) > 0:
	#request info on website
	doorInfo = requestData();
	conn.send(pickle.dumps(doorInfo, protocol=2));

	data = pickle.loads(msg)
	print("received: "+ str(data))

	post_fields = {'hoog': data['hoog'], 'laag': data['laag'], "status_deuren": data["status_deuren"]}
	sendData(post_fields)
	time.sleep(2)

print("quit")