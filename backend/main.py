from fastapi import FastAPI
from connection.db_connect import *

app = FastAPI()
app.title = "Company Manager API"
conn = Connection_database()



@app.get('/')
def message():
    
    data = conn.read_all("providers")
    
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
def message_2():

    data = conn.read_all("products")

    items = {}

    for row in data:

        products = {}
        products['Code_product'] = row[0]
        products['ID_provider'] = row[1]
        products['name'] = row[2]
        products['price_without_iva'] = row[3]
        items[row[0]] = products
        
    return items


@app.get('/products/{code_product}', tags=["Products"])
def message_2(code_product: int):
    

    data = conn.read_one("products","code_product",code_product)
    
    product = {}
    item = {}
    
    item['Provider'] = data[1]
    item['Name'] = data[2]
    item['Price'] = data[3] 
    product[code_product] = item

    return product

@app.get('/providers', tags=["Providers"])
def get_providers():
    
    data = conn.read_all("providers")

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
def get_only_provider(id_provider:int):
    
    data = conn.read_one("providers","id_provider",id_provider)
    item = {}
    provider = {}
    provider["name"] = data[1]
    provider["cif"] = data[2]
    provider["direction"] = data[3]
    provider["phone"] = data[4]
    provider["email"] = data[5]
    provider["contact"] = data[6]
    provider["schedule"] = data[7]
    item[id_provider] = provider

    return item

@app.get('/clients', tags=["clients"])
def get_clients():
    
    data = conn.read_all("clients")

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

@app.get('/clients/{id_client}', tags=["clients"])
def get_only_client(id_client:int):
    
    data = conn.read_one("clients","id_client",id_client)
    item = {}
    client = {}
    client["name"] = data[1]
    client["cif"] = data[2]
    client["direction"] = data[3]
    client["phone"] = data[4]
    client["email"] = data[5]
    client["contact"] = data[6]
    client["schedule"] = data[7]
    item[id_client] = client

    return item

@app.get('/expenses', tags=["Expenses"])
def get_all_expense():
    
    data = conn.read_all("expenses")

    items = []

    for row in data:

        expenses = {}
        expenses['Code_product'] = row[0]
        expenses['ID_provider'] = row[1]
        expenses['name'] = row[2]
        expenses['price_without_iva'] = row[3]
        items.append(expenses)
        
    return items

@app.get('/expenses/{id_order}', tags=["Expenses"])
def get_only_expense(id_order:int):
    
    data = conn.read_one("expenses","id_order",id_order)
    item = {}
    expense = {}
    expense["ID_client"] = data[1]
    expense["date"] = data[2]
    item[data[0]] = expense

    return item

@app.get('/income', tags=["Income"])
def list_expense():
    
    data = conn.read_all("income")
    
    items = {}

    for row in data:

        income = {}
        income['ID_client'] = row[1]
        income['quantity'] = row[2]
        income['date'] = row[3]
        income['price_without_iva'] = row[4]
        items[row[0]] = income
        
    return items

@app.get('/income/{id_order}', tags=["Income"])
def list_id_expense(id_order:int):

    data = conn.read_one("income","id_order",id_order)
    item = {}
    order = {}
    order["ID_client"] = data[1]
    order["date"] = data[2]
    item[data[0]] = order

    return item


########## INSERT ##########

@app.post('/products/insert', tags=["Products"])
def look_product():
    conn.write_customers("clients(name,cif,direction,phone,email,contact,schedule)","'romero company','96745673A','d',132476890,'a@a','pepe','09:00-18:00'")
    

@app.post('/products/insert')
def insert_product():
    conn.write_products()