Create DATABASE productos;

USE productos;

CREATE TABLE categorias (
  idCa INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50),
  descripcion TEXT
);

INSERT INTO categorias (nombre, descripcion) VALUES
('Electrónica', 'Productos electrónicos'),
('Ropa', 'Ropa y accesorios'),
('Hogar', 'Productos para el hogar');

CREATE TABLE productos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  idCa INT,
  nombre VARCHAR(100),
  descripcion TEXT,
  precio DECIMAL(10, 2),
  stock INT,
  eliminado BOOLEAN,
  FOREIGN KEY (idCa) REFERENCES categorias(idCa)
);

INSERT INTO productos (idCa, nombre, descripcion, precio, stock) VALUES
(1, 'Producto 1', 'Descripción del producto 1', 9.99, 100),
(1, 'Producto 2', 'Descripción del producto 2', 19.99, 50),
(3, 'Producto 3', 'Descripción del producto 3', 14.99, 75);

CREATE TABLE detalles_productos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  producto_id INT,
  color VARCHAR(50),
  peso DECIMAL(8, 2),
  dimensiones VARCHAR(100),
  accion VARCHAR(1),
  fecha timestamp,
  FOREIGN KEY (producto_id) REFERENCES productos(id)
);

INSERT INTO detalles_productos (producto_id, color, peso, dimensiones, accion) VALUES
(1, 'Rojo', 0.5, '10x10x5 cm', 'C'),
(1, 'Azul', 0.5, '10x10x5 cm', 'C'),
(2, 'Negro', 1.2, '15x15x8 cm', 'C'),
(3, 'Verde', 0.8, '12x12x6 cm', 'C');

CREATE TABLE proveedores (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100),
  direccion VARCHAR(200),
  telefono VARCHAR(20)
);

INSERT INTO proveedores (nombre, direccion, telefono) VALUES
('Proveedor A', 'Calle Principal 123', '+1234567890'),
('Proveedor B', 'Avenida Secundaria 456', '+9876543210');

CREATE TABLE clientes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100),
  direccion VARCHAR(200),
  telefono VARCHAR(20),
  email VARCHAR(100)
);

INSERT INTO clientes (nombre, direccion, telefono, email) VALUES
('Cliente A', 'Calle Principal 123', '+1234567890', 'clienteA@example.com'),
('Cliente B', 'Avenida Secundaria 456', '+9876543210', 'clienteB@example.com');

CREATE TABLE ventas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  producto_id INT,
  cliente_id INT,
  cantidad INT,
  fecha_venta DATE,
  FOREIGN KEY (producto_id) REFERENCES productos(id),
  FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

INSERT INTO ventas (producto_id, cliente_id, cantidad, fecha_venta) VALUES
(1, 1, 2, '2023-06-01'),
(2, 2, 1, '2023-06-02');