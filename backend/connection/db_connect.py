import psycopg2

class Connection_database():

    

    def __init__(self):

        try:
            self.conn = psycopg2.connect(host="database", database="test", user="postgres", password="password")
        except:
            print("Error de conexión")

    def read_all(self,tb_name):

        cur = self.conn.cursor()
        cur.execute("""
                    SELECT * FROM %s
                    """ % (tb_name))
        result = cur.fetchall()
        
        return result
    
    def read_one(self, tb_name, column_name, id):
        
        cur = self.conn.cursor()
        cur.execute("""
                    SELECT * FROM %s WHERE %s = %d
                    """ % (tb_name,column_name,id))  
        
        return cur.fetchone()
        
    def write_customers(self, tb_name, data):
        
        cur = self.conn.cursor()
        cur.execute("""
                        INSERT INTO %s VALUES (%s)
                    """ % (tb_name,data))
        self.conn.commit()
        
    def write_products(self, data):
        
        cur = self.conn.cursor()
        cur.execute("""
                    INSERT INTO products VALUES %s
                    """ % (data))
        self.conn.commit()
        
        
                 

    def __def__(self):

        self.conn.close()


            