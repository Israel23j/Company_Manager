from fastapi import FastAPI
from sqlalchemy import create_engine

app = FastAPI()

def query_database(db_name,db_user,db_pass,db_host,db_port):
    
    try:
        db_string = f"postgres://{db_user}:{db_pass}@{db_host}:{db_port}/{db_name}"
        db = create_engine(db_string)
        db.execute('SELECT nombre FROM datos;')
        return (db.fetchone())
        #return ("Conexion correcta")

    except:
        return ("Error de conexion")
    



@app.get('/')
def message():
    return {query_database('pruebas','postgres','password','localhost','5432')}

    
    

@app.get('/product/{product_id}')
def message_2(product_id: int):
    return f"Product: {product_id}"


@app.post('/products')
def look_product(product_id: int):
    return f"Producto: {product_id}"
