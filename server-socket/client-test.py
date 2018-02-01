import socket
import sys
import pickle
import time

# Create a TCP/IP socket
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Connect the socket to the port where the server is listening
server_address = ('localhost', 1337)
print(sys.stderr, 'connecting to %s port %s' % server_address)
sock.connect(server_address)

while True:
    # Send data
    message = {"hoog":0, "laag":1, "status_deuren":"open"}
    print('sending "%s"' % message)
    sock.sendall(pickle.dumps(message))
    print("sent")
    data = sock.recv(1024)
    
    print(pickle.loads(data))
    time.sleep(2)
