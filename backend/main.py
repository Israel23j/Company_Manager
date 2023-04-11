from fastapi import FastAPI
from sqlalchemy import create_engine

app = FastAPI()

def query_database():
    db_name = 'pruebas'
    db_user = 'postgres'
    db_pass= 'password'
    db_host = 'beautiful_rosalind'
    db_port = '5432'
    res = 0

    try:
        db_string = f'postgres://{db_user}:{db_pass}@{db_host}:{db_port}/{db_name}'
        db = create_engine(db_string)
        db.execute('SELECT nombre FROM datos;')
        result = db.fetchone()
        res = result
    except:
        res = ("Error")

    return res

@app.get('/')
def message():
    query_database()
    
    

@app.get('/product/{product_id}')
def message_2(product_id: int):
    return f"Product: {product_id}"


@app.post('/products')
def look_product(product_id: int):
    return f"Producto: {product_id}"
