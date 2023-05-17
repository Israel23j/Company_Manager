from .db_connect import Connection_database

def get_db():
    connection = Connection_database()
    try:
        yield connection
    finally:
        connection.conn.close()
