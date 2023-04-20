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

    return {"message":"Hola Isra"}
    
@app.get('/products')
def message_2():

    return conn_database()

@app.get('/products/{product_id}')
def message_2(product_id: int):
    return f"Product: {product_id}"
    


@app.post('/products')
def look_product(product_id: int):
    return f"Producto: {product_id}"
    
