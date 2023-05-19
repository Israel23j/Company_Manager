CREATE TABLE IF NOT EXISTS providers (id_provider SERIAL,
                                      "name" VARCHAR(35), 
                                      cif VARCHAR(9),
                                      direction VARCHAR(50),
                                      phone INT,
                                      email VARCHAR(30),
                                      contact VARCHAR(25),
                                      schedule VARCHAR(15),
                                      PRIMARY KEY (id_provider));


CREATE TABLE IF NOT EXISTS clients (id_client SERIAL,
                                    "name" VARCHAR(35),
                                    cif VARCHAR(9),
                                    direction VARCHAR(50),
                                    phone INT,
                                    email VARCHAR(30),
                                    contact VARCHAR(25),
                                    schedule VARCHAR(15),
                                    PRIMARY KEY (id_client));

CREATE TABLE  IF NOT EXISTS products (code_product INT,
		                              id_provider INT,
                                      "name" VARCHAR(50),
                                      price_without_IVA FLOAT,
                                      PRIMARY KEY (code_product),
                                      CONSTRAINT fk_provider
                                      FOREIGN KEY (id_provider)
                                      REFERENCES providers(id_provider));

CREATE TABLE IF NOT EXISTS income (id_order INT,
                                   id_client INT, 
                                   "date" DATE, 
                                   PRIMARY KEY(id_order),
                                   CONSTRAINT fk_order_client
                                   FOREIGN KEY(id_client)
                                   REFERENCES clients(id_client));

CREATE TABLE  IF NOT EXISTS details_income (id_order INT,
                                            code_product INT,
                                            quantity INT,                                
                                            price_without_iva FLOAT,  
                                            CONSTRAINT fk_product                                
                                            FOREIGN KEY (code_product)                                
                                            REFERENCES products(code_product)
                                            ON UPDATE CASCADE ON DELETE CASCADE,
                                            CONSTRAINT fk_order                             
                                            FOREIGN KEY (id_order)                                
                                            REFERENCES income(id_order));

CREATE TABLE IF NOT EXISTS expenses (id_order INT, 
                                     id_provider INT,
                                     "date" DATE,
                                     PRIMARY KEY(id_order),
                                     CONSTRAINT fk_order_provider
                                     FOREIGN KEY(id_provider)
                                     REFERENCES providers(id_provider));

CREATE TABLE  IF NOT EXISTS details_expense (id_order INT,
                                            code_product INT,                               
                                            quantity INT,
                                            price_without_iva FLOAT,
                                            CONSTRAINT fk_order_pro
                                            FOREIGN KEY (code_product)                                
                                            REFERENCES products(code_product)                                
                                            ON UPDATE CASCADE ON DELETE CASCADE,
                                            CONSTRAINT fk_order_expense                             
                                            FOREIGN KEY (id_order)                                
                                            REFERENCES expenses(id_order));


CREATE FUNCTION insert_price() RETURNS TRIGGER AS $$
BEGIN
  
    NEW.price_without_iva = (SELECT price_without_IVA FROM products WHERE code_product = NEW.code_product) * NEW.quantity;

RETURN NEW;
END;
  
  
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_price_providers BEFORE INSERT ON details_expense FOR EACH ROW EXECUTE FUNCTION insert_price();

CREATE TABLE IF NOT EXISTS benefits ();

INSERT INTO providers ("name",cif,direction,phone,email,contact,schedule) VALUES ('IPM a Ricoh Company', 'A1325689', 'C/Eucalipto, 33', 918453479, 'ipm@ipm.es', 'Oscar Perez', '09:00-14:00'),
                                                                                 ('IBM', 'Q0128375', 'C/Colmena, 44', 918458298, 'ibm@ibm.es', 'Javier Gutierrez', '09:00-15:00'),
                                                                                 ('Arrow Electronics', 'L2458374', 'C/Rio Duero, 44', 918432094, 'arrow@arrow.es', 'Ramon Manjon', '09:00-14:00');

INSERT INTO clients ("name",cif,direction,phone,email,contact,schedule) VALUES ('KPMG', 'A1325689', 'C/Eucalipto, 33', 918453479, 'ipm@ipm.es', 'Oscar Perez', '09:00-14:00'),
                                                                               ('METRO', 'Q0128375', 'C/Colmena, 44', 918458298, 'ibm@ibm.es', 'Javier Gutierrez', '09:00-15:00'),
                                                                               ('Presidencia', 'L2458374', 'C/Rio Duero, 44', 918432094, 'arrow@arrow.es', 'Ramon Manjon', '09:00-14:00');			    


			    

INSERT INTO products VALUES (123456, 1, 'PowerStore', 324.76),
                            (987654, 2, 'PowerMax', 394.32),
                            (135790, 3, 'DataDomain', 678.61);

INSERT INTO details_expense (id_order, code_product, quantity) VALUES (1,123456,5),
                                                                      (1,123456,3),
                                                                      (2,987654,1),
                                                                      (2,123456,5);

INSERT INTO income VALUES (1,1,'2020-01-31'),
                          (2,3,'2020-01-31'),
                          (3,2,'2020-01-31');

INSERT INTO details_income VALUES (1,123456,10,134.56),
                                  (1,098765,3,214.56),
                                  (1,135790,4,321.56),
                                  (2,123456,10,134.56),
                                  (1,987654,6,876.56),
                                  (3,123456,10,134.56);

/*SELECT * FROM providers;
SELECT * FROM products;
SELECT * FROM details_expense;
SELECT * FROM expenses;
SELECT SUM(quantity) AS quantity,SUM(price_without_iva) AS total_price FROM details_expense WHERE id_order = 1;

SELECT income.id_order, details_income.code_product,products.name,details_income.quantity FROM income JOIN details_income ON income.id_order = details_income.id_order 
JOIN products ON details_income.code_product = products.code_product 
WHERE income.id_order = 1;

*/
