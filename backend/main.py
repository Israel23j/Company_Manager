from fastapi import FastAPI,Depends,HTTPException
from connection import get_db
from connection.db_connect import *

app = FastAPI()
app.title = "Company Manager API"

@app.get('/')
def message(db=Depends(get_db)):
    
    data = db.read_all("providers")
    
    items = {}

    for row in data:

        providers = {}
        providers['name'] = row[1]
        providers['cif'] = row[2]
        providers['direction'] = row[3]
        providers['phone'] = row[4]
        providers['email'] = row[5]
        providers['contact'] = row[6]
        providers['schedule'] = row[7]
        items[row[0]] = providers
    
    return items

    
@app.get('/products', tags=["Products"])
def message_2(
      db=Depends(get_db)
):

    data = db.read_all("products")

    items = {}

    for row in data:
        
        products = {}
        products['ID_provider'] = row[1]
        products['name'] = row[2]
        products['price_without_iva'] = row[3]
        items[row[0]] = products
        
    return items

@app.get('/products/{code_product}', tags=["Products"])
def message_2(code_product: int,  db=Depends(get_db)):
    
    data = db.read_one("products","code_product",code_product)
    
    product = {}
    item = {}
    
    item['Provider'] = data[1]
    item['Name'] = data[2]
    item['Price'] = data[3] 
    product[data[0]] = item

    return product

@app.get('/providers', tags=["Providers"])
def get_providers(  db=Depends(get_db)):
    
    data = db.read_all("providers")

    items = {}

    for row in data:

        providers = {}
        providers['Code_product'] = row[0]
        providers['ID_provider'] = row[1]
        providers['name'] = row[2]
        providers['price_without_iva'] = row[3]
        items[row[0]] = providers
        
    return items

@app.get('/providers/{id_provider}', tags=["Providers"])
def get_only_provider(id_provider:int,  db=Depends(get_db)):
    
    data = db.read_one("providers","id_provider",id_provider)
    item = {}
    provider = {}
    provider["name"] = data[1]
    provider["cif"] = data[2]
    provider["direction"] = data[3]
    provider["phone"] = data[4]
    provider["email"] = data[5]
    provider["contact"] = data[6]
    provider["schedule"] = data[7]
    item[data[0]] = provider

    return item

@app.get('/clients', tags=["Clients"])
def get_clients(  db=Depends(get_db)):
    
    data = db.read_all("clients")

    items = {}

    for row in data:

        clients = {}
        clients["name"] = row[1]
        clients["cif"] = row[2]
        clients["direction"] = row[3]
        clients["phone"] = row[4]
        clients["email"] = row[5]
        clients["contact"] = row[6]
        clients["schedule"] = row[7]
        items[row[0]] = clients
        
    return items

@app.get('/clients/{id_client}', tags=["Clients"])
def get_only_client(id_client:int, db=Depends(get_db)):
    
    data = db.read_one("clients","id_client",id_client)
    item = {}
    client = {}
    client["name"] = data[1]
    client["cif"] = data[2]
    client["direction"] = data[3]
    client["phone"] = data[4]
    client["email"] = data[5]
    client["contact"] = data[6]
    client["schedule"] = data[7]
    item[data[0]] = client

    return item

@app.get('/expenses', tags=["Expenses"])
def get_all_expense(  db=Depends(get_db)):
    
    data = db.read_all("expenses")

    items = {}

    for row in data:

        expenses = {}
        expenses['id_provider'] = row[1]
        expenses['date'] = row[2]
        items[row[0]] = expenses
        
    return items

@app.get('/expenses/details/{id_order}', tags=["Expenses"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_all_condition("details_expense","id_order",id_order)
    
    expenses = {}
    details_group = []
    
    
    for row in data:
        details = {}
        details["code_product"] = row[1]
        details["quantity"] = row[2]
        details["price_without_iva"] = row[3]
        details_group.append(details)
    expenses[data[0][0]] = details_group
    
    return expenses

@app.get('/expenses/{id_order}', tags=["Expenses"])
def get_only_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_one("expenses","id_order",id_order)
    item = {}
    expense = {}
    expense["ID_client"] = data[1]
    expense["date"] = data[2]
    item[data[0]] = expense

    return item

@app.get('/income', tags=["Income"])
def list_expense(  db=Depends(get_db)):
    
    data = db.read_all("income")
    
    items = {}

    for row in data:

        income = {}
        income['quantity'] = row[1]
        income['date'] = row[2]
        items[row[0]] = income
        
    return items

@app.get('/income/details/{id_order}', tags=["Income"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_all_condition("details_income","id_order",id_order)
    
    income = {}
    details_group = []
    
    
    for row in data:
        details = {}
        details["code_product"] = row[1]
        details["quantity"] = row[2]
        details["price_without_iva"] = row[3]
        details_group.append(details)
    income[data[0][0]] = details_group
    
    return income

@app.get('/income/{id_order}', tags=["Income"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_one("income","id_order",id_order)
    item = {}
    order = {}
    order["ID_client"] = data[1]
    order["date"] = data[2]
    item[data[0]] = order
    
    return item




########## INSERT ##########

@app.post('/companies/insert', tags=["Providers","Clients"])
def insert_companie(
    tb_name:str, name:str,cif:str, direction:str, phone:int, email:str, contact:str, schedule:str,  db=Depends(get_db)
):
    db.write_customers(tb_name,name,cif,direction,phone,email,contact,schedule)
    
    return {"message":"Insertado correctamente"}

@app.post('/products/insert', tags=["Products"])
def insert_product(
    code_product:int, id_provider:int, name:str, price:float, db=Depends(get_db)
):
    db.write_products(code_product,id_provider,name,price)
    
    return {"message":"Insertado correctamente"}

@app.post('/orders/new_order', tags=["Orders"])
def insert_new_order(
    tb_name:str, id_rol:int, date:str, db=Depends(get_db) 
):
    db.new_order(tb_name, id_rol, date)
    
    return {"message":"Insertado correctamente"}

@app.post('/orders/details_orders/add_row', tags=["Orders"])
def add_details_order(
    tb_name:str, id_order:int, code_product:int, quantity:int, db=Depends(get_db)
):
    db.details_order(tb_name,id_order,code_product,quantity)
    
    return {"message":"Insertado correctamente"}
            

    