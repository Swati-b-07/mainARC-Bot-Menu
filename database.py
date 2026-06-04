class Database:
    def __init__(self):
        self.connected = False

    def connect(self):
        self.connected = True
        print("Database connected")

    def disconnect(self):
        self.connected = False
        print("Database disconnected")
