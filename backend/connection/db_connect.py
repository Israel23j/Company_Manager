import psycopg2

class Connection_database():

    def __init__(self):

        try:
            self.conn = psycopg2.connect(host="database", database="test", user="postgres", password="password")
        except:
            print("Error de conexión")

    def read_all(self,tb_name):

        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT * FROM {tb_name}"""
        )
        result = cur.fetchall()
        
        return result

    def read_all_join(self,fields:str, tb_name_origin:str, tb_name_destiny:str, fk_origin:str, fk_destiny:str):

        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT {fields} FROM {tb_name_origin} JOIN {tb_name_destiny} ON {fk_origin} = {fk_destiny}"""
        )
        result = cur.fetchall()
    
        return result

    def read_all_condition(self, tb_name, column_name, id):
    
        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT * FROM {tb_name} WHERE {column_name} = {id}"""
        )
        data = cur.fetchall()
        
        return data
    
    def read_one(self, tb_name, column_name, id):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT * FROM {tb_name} WHERE {column_name} = {id}"""
        )
        data = cur.fetchone()
        
        return data
    
    def read_one_join(self, fields:str, tb_name_origin:str, tb_name_destiny:str, fk_origin:str, fk_destiny:str, column_name:str, id_order:int):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT {fields} FROM {tb_name_origin} JOIN {tb_name_destiny} ON {fk_origin} = {fk_destiny} WHERE {column_name} = {id_order}"""
        )
        result = cur.fetchone()
    
        return result
        
    
    
    def total_price(self, tb_name:str, id_order:int):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""SELECT SUM(price_without_iva) FROM {tb_name} WHERE id_order = {id_order}"""
        )
        
        data = cur.fetchone()
        
        return data
    
    
        
    def write_customers(self, tb_name, name:str, cif:str, direction:str, phone:int, email:str, contact:str, schedule:str):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""INSERT INTO {tb_name}(name,cif,direction,phone,email,contact,schedule) VALUES ('{name}','{cif}','{direction}',{phone},'{email}','{contact}','{schedule}')""" 
        )
        self.conn.commit()
        
    def write_products(self,  code_product:int, id_provider:int, name:str, price:float):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""INSERT INTO products VALUES ({code_product},{id_provider},'{name}',{price})"""
        )
        self.conn.commit()
        
    def new_order(self, id_provider:int, date:str ):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""INSERT INTO expenses(id_provider,date) VALUES ({id_provider},'{date}')"""
        )
        self.conn.commit()
        
    def details_order(self, id_order:int, code_product:int, quantity:int):
        
        cur = self.conn.cursor()
        cur.execute(
            f"""INSERT INTO details_expense VALUES ({id_order},{code_product},{quantity})"""
        )
        self.conn.commit()

    def __def__(self):

        self.conn.close()


            