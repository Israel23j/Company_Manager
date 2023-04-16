from fastapi import FastAPI
import psycopg2

app = FastAPI()

def conn_database():

    try:

        conn = psycopg2.connect(host="database", database="test", user="postgres", password="password")
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM datos;")
        result = cursor.fetchone()

    except:
        
        result = "Error de conexion"

    return result

@app.get('/')
def message():
    #return {query_database('pruebas','postgres','password','localhost','5432')}
    return {"message":"Hola Isra"}
    #return conn_database()
    
@app.get('/products')
def message_2():
    #return f"Product: {product_id}"
    return conn_database()

@app.get('/products/{product_id}')
def message_2(product_id: int):
    return f"Product: {product_id}"
    #return conn_database()


@app.post('/products')
def look_product(product_id: int):
    return f"Producto: {product_id}"
    
