CREATE DATABASE produk_online;

USE produk_online;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

INSERT INTO admin(nama,username,password)
VALUES
(
'Administrator',
'admin',
'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);

CREATE TABLE kategori(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100)
);

INSERT INTO kategori(nama_kategori)
VALUES
('Elektronik'),
('Fashion'),
('Makanan'),
('Minuman');

CREATE TABLE produk(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(150),
    harga INT,
    stok INT,
    gambar VARCHAR(255),
    deskripsi TEXT,
    kategori_id INT,
    FOREIGN KEY(kategori_id)
    REFERENCES kategori(id)
);

INSERT INTO produk
(nama_produk,harga,stok,gambar,deskripsi,kategori_id)
VALUES
(
'Laptop ASUS',
8500000,
10,
'default.png',
'Laptop ASUS Core i5',
1
),
(
'Kaos Polos',
75000,
50,
'default.png',
'Kaos Cotton Combed',
2
);