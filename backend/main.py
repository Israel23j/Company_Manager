from typing import Annotated
from fastapi import FastAPI,Depends,HTTPException,Form
from connection import get_db
from connection.db_connect import *

app = FastAPI()
app.title = "Company Manager API"

@app.get('/')
def message(db=Depends(get_db)):
    
    return {"message":"Bienvenido"}
    
@app.get('/products', tags=["Products"])
def message_2(
      db=Depends(get_db)
):

    data = db.read_all_join(
        "products.code_product, providers.name, products.name, products.price_without_iva" ,
        "products",
        "providers",
        "products.id_provider",
        "providers.id_provider"
        )

    items = []
    
    for row in data:
        
        products = {}
        products['code_product'] = row[0]
        products['provider'] = row[1]
        products['name'] = row[2]
        products['price_without_iva'] = row[3]
        items.append(products)
        
    return items

@app.get('/products/{code_product}', tags=["Products"])
def message_2(code_product: int,  db=Depends(get_db)):
    
    data = db.read_one("products","code_product",code_product)
    
    product = []
    item = {}
    
    item['code_product'] = data[0]
    item['provider'] = data[1]
    item['name'] = data[2]
    item['price_without_iva'] = data[3] 
    product.append(item)

    return product

@app.get('/providers', tags=["Providers"])
def get_providers(  db=Depends(get_db)):
    
    data = db.read_all("providers")

    items = []

    for row in data:

        provider = {}
        provider['id_provider'] = row[0]
        provider["name"] = row[1]
        provider["cif"] = row[2]
        provider["direction"] = row[3]
        provider["phone"] = row[4]
        provider["email"] = row[5]
        provider["contact"] = row[6]
        provider["schedule"] = row[7]
        items.append(provider)
        
    return items

@app.get('/providers/{id_provider}', tags=["Providers"])
def get_only_provider(id_provider:int,  db=Depends(get_db)):
    
    data = db.read_one("providers","id_provider",id_provider)
    
    item = []
    provider = {}
    
    provider['id_provider'] = data[0]
    provider["name"] = data[1]
    provider["cif"] = data[2]
    provider["direction"] = data[3]
    provider["phone"] = data[4]
    provider["email"] = data[5]
    provider["contact"] = data[6]
    provider["schedule"] = data[7]
    item.append(provider)

    return item

@app.get('/clients', tags=["Clients"])
def get_clients(  db=Depends(get_db)):
    
    data = db.read_all("clients")

    items = []

    for row in data:

        clients = {}
        clients['id_client'] = row[0]
        clients["name"] = row[1]
        clients["cif"] = row[2]
        clients["direction"] = row[3]
        clients["phone"] = row[4]
        clients["email"] = row[5]
        clients["contact"] = row[6]
        clients["schedule"] = row[7]
        items.append(clients)
        
    return items

@app.get('/clients/{id_client}', tags=["Clients"])
def get_only_client(id_client:int, db=Depends(get_db)):
    
    data = db.read_one("clients","id_client",id_client)
    
    item = []
    client = {}
    
    client['id_provider'] = data[0]
    client["name"] = data[1]
    client["cif"] = data[2]
    client["direction"] = data[3]
    client["phone"] = data[4]
    client["email"] = data[5]
    client["contact"] = data[6]
    client["schedule"] = data[7]
    item.append(client)

    return item

@app.get('/expenses', tags=["Expenses"])
def get_all_expense(  db=Depends(get_db)):
    
    data = db.read_all_join(
                            "expenses.id_order, providers.name, expenses.date" ,
                            "expenses",
                            "providers",
                            "expenses.id_provider",
                            "providers.id_provider"
                            )

    items = []

    for row in data:

        expenses = {}
        expenses['id_order'] = row[0]
        expenses['provider'] = row[1]
        expenses['date'] = row[2]
        items.append(expenses)
    return items

@app.get('/expenses/details/{id_order}', tags=["Expenses"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_all_condition("details_expense","id_order",id_order)
    price = db.total_price("details_expense",id_order)
    
    details_expense = []
    total_price = {}
    
    for row in data:
        details = {}
        details['id_order'] = row[0]
        details["code_product"] = row[1]
        details["quantity"] = row[2]
        details["price_without_iva"] = row[3]
        details_expense.append(details)
    total_price["total_price"] = (price[0]*1.21)
    details_expense.append(total_price)
    
    return details_expense

@app.get('/expenses/{id_order}', tags=["Expenses"])
def get_only_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_one_join("expenses.id_order, providers.name, expenses.date",
                            "expenses",
                            "providers",
                            "expenses.id_provider",
                            "providers.id_provider",
                            "expenses.id_order",
                            id_order
                            )
    
    item = []
    expense = {}
    
    expense['id_order'] = data[0]
    expense['provider'] = data[1]
    expense['date'] = data[2]
    item.append(expense)

    return item

@app.get('/income', tags=["Income"])
def list_expense(  db=Depends(get_db)):
    
    data = db.read_all_join(
                            "income.id_order, clients.name, income.date" ,
                            "income",
                            "clients",
                            "income.id_client",
                            "clients.id_client"
                            )
    
    items = []

    for row in data:

        income = {}
        income['id_order'] = row[0]
        income['client'] = row[1]
        income['date'] = row[2]
        items.append(income)
        
    return items

@app.get('/income/details/{id_order}', tags=["Income"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_all_condition("details_income","id_order",id_order)
    price = db.total_price("details_income",id_order)
    
    details_income = []
    total_price = {}
    
    for row in data:
        details = {}
        details['id_order'] = row[0]
        details["code_product"] = row[1]
        details["quantity"] = row[2]
        details["price_without_iva"] = row[3]
        details_income.append(details)
    total_price["total_price"] = (price[0]*1.21)
    details_income.append(total_price)
    
    return details_income

@app.get('/income/{id_order}', tags=["Income"])
def list_id_expense(id_order:int,  db=Depends(get_db)):
    
    data = db.read_one_join("income.id_order, clients.name, income.date",
                            "income",
                            "clients",
                            "income.id_client",
                            "clients.id_client",
                            "income.id_order",
                            id_order
                            )
    
    item = []
    order = {}
    
    order['id_order'] = data[0]
    order["client"] = data[1]
    order["date"] = data[2]
    item.append(order)
    
    return item




########## INSERT ##########

@app.post('/companies/insert', tags=["Providers","Clients"])
def insert_companie(
    tb_name: Annotated[str, Form()], name: Annotated[str, Form()],cif: Annotated[str, Form()], direction: Annotated[str, Form()], phone:Annotated[int, Form()], email: Annotated[str, Form()], contact: Annotated[str, Form()], schedule: Annotated[str, Form()],  db=Depends(get_db)
):
    db.write_customers(tb_name,name,cif,direction,phone,email,contact,schedule)
    
    return {"message":"Insertado correctamente"}

@app.post('/products/insert', tags=["Products"])
def insert_product(
    code_product: Annotated[int, Form()], id_provider: Annotated[int, Form()], name:Annotated[str, Form()], price:Annotated[float, Form()], db=Depends(get_db)
):
    db.write_products(code_product,id_provider,name,price)
    
    return {"message":"Insertado correctamente"}

@app.post('/orders/new_order', tags=["Orders"])
def insert_new_order(
    id_provider: Annotated[int, Form()], date: Annotated[str, Form()], db=Depends(get_db) 
):
    db.new_order(id_provider, date)
    
    return {"message":"Insertado correctamente"}

@app.post('/orders/details_orders/add_row', tags=["Orders"])
def add_details_order(
    id_order: Annotated[int, Form()], code_product: Annotated[int, Form()], quantity: Annotated[int, Form()], db=Depends(get_db)
):
    db.details_order(id_order,code_product,quantity)
    
    return {"message":"Insertado correctamente"}
            

    