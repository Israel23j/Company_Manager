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
                                      price_without_iva FLOAT,
                                      PRIMARY KEY (code_product),
                                      CONSTRAINT fk_provider
                                      FOREIGN KEY (id_provider)
                                      REFERENCES providers(id_provider));

CREATE TABLE IF NOT EXISTS income (id_order SERIAL,
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
                                            REFERENCES income(id_order)
                                            ON DELETE CASCADE);

CREATE TABLE IF NOT EXISTS expenses (id_order SERIAL, 
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
                                            REFERENCES expenses(id_order)
                                            ON DELETE CASCADE);


CREATE FUNCTION insert_price() RETURNS TRIGGER AS $$
BEGIN
  
    NEW.price_without_iva = (SELECT price_without_IVA FROM products WHERE code_product = NEW.code_product) * NEW.quantity;

RETURN NEW;
END;
  
  
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_price_providers BEFORE INSERT ON details_expense FOR EACH ROW EXECUTE FUNCTION insert_price();
CREATE TRIGGER insert_price_clients BEFORE INSERT ON details_income FOR EACH ROW EXECUTE FUNCTION insert_price();

CREATE TABLE IF NOT EXISTS benefits ();

INSERT INTO providers ("name",cif,direction,phone,email,contact,schedule) VALUES ('IPM a Ricoh Company', 'A1325689', 'C/Eucalipto, 33', 918453479, 'ipm@ipm.es', 'Oscar Perez', '09:00-14:00'),
                                                                                 ('IBM', 'Q0128375', 'C/Colmena, 44', 918458298, 'ibm@ibm.es', 'Javier Gutierrez', '09:00-15:00'),
                                                                                 ('Arrow Electronics', 'L2458374', 'C/Rio Duero, 64', 918432094, 'arrow@arrow.es', 'Ramon Manjon', '09:00-14:00'),
                                                                                 ('FutureSpace', 'H1094782', 'C/Piso, 21', 918413645, 'future@future.es', 'Jose Ignacio', '09:00-14:00'),
                                                                                 ('HP', 'T1827654', 'C/Rio tajo 21', 918425467, 'hp@hp.es', 'Jose Delgado', '09:00-14:00');

INSERT INTO clients ("name",cif,direction,phone,email,contact,schedule) VALUES ('Deloitte', 'q0981563', 'C/Tormenta, 33', 918446531, 'deloitte@deloitte.es', 'Ana Maria', '09:00-14:00'),
                                                                               ('Renfe', 'Q0128375', 'C/Rio duero, 24', 918458298, 'renfe@renfe.es', 'Javier Gutierrez', '09:00-15:00'),
                                                                               ('Acciona', 'W1325679', 'C/Cuesta, 14', 918445690, 'Acciona@acciona.es', 'Ramon López', '09:00-14:00'),
                                                                               ('Irium', 'K9871564', 'C/Rio Duero, 4', 918479081, 'irium@irium.es', 'Julian Alvarez', '09:00-14:00'),
                                                                               ('Indra', 'F1928745', 'C/Extremadura, 34', 918408172, 'indra@indra.es', 'Claudia Garcia', '09:00-14:00');			    


			    

INSERT INTO products VALUES (123456, 1, 'PowerStore', 324.76),
                            (987654, 2, 'PowerMax', 394.32),
                            (135790, 3, 'DataDomain', 678.61),
                            (086421, 5, 'Backup-System', 678.36),
                            (246800, 4, 'Switch', 115.78);

INSERT INTO expenses(id_provider,"date") VALUES (1,'2020-05-23'),
                                                (2,'2020-01-23');

INSERT INTO details_expense (id_order, code_product, quantity) VALUES (1,123456,5),
                                                                      (1,135790,3),
                                                                      (1,246800,2),
                                                                      (2,987654,5),
                                                                      (2,123456,5);

INSERT INTO income(id_client,"date") VALUES (1,'2020-01-31'),
                                            (3,'2020-01-31'),
                                            (2,'2020-01-31');

INSERT INTO details_income VALUES (1,123456,3),
                                  (1,987654,1),
                                  (1,135790,3),
                                  (1,246800,1),
                                  (2,123456,2),
                                  (2,086421,1),
                                  (2,987654,2),
                                  (3,123456,10);

/*SELECT * FROM providers;
SELECT * FROM products;
SELECT * FROM details_expense;
SELECT * FROM expenses;
SELECT SUM(quantity) AS quantity,SUM(price_without_iva) AS total_price FROM details_expense WHERE id_order = 1;

SELECT income.id_order, details_income.code_product,products.name,details_income.quantity FROM income JOIN details_income ON income.id_order = details_income.id_order 
JOIN products ON details_income.code_product = products.code_product 
WHERE income.id_order = 1;

*/
