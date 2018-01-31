import socket

# cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='waterkering')

# cursor = cnx.cursor()

query = ("SELECT onderhoud, created_at FROM waterkerings ORDER BY id DESC LIMIT 10")

# cursor.execute(query)

# for (onderhoud, created_at) in cursor:
#     print("{}, {} ".format(onderhoud, created_at))

# cursor.close()

# cnx.close()


import pypyodbc as pyodbc # you could alias it to existing pyodbc code (not every code is compatible)
db_host = '127.0.0.1'
db_name = 'waterkering'
db_user = 'root'
db_password = ''
connection_string = 'Driver={SQL Server};Server=' + db_host + ';Database=' + db_name + ';UID=' + db_user + ';PWD=' + db_password + ';'
db = pyodbc.connect(connection_string)
cursor = db.cursor()

cursor.execute(query)

cursor.close()
db.close()

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