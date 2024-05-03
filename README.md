# Kelompok03

Cara mengakses file tersebut :
1. download file zip yang diinginkan. 
2. file tersebut diextract ke tempat yang diinginkan. kemudian pindahkan file tersebut ke dalam  drive C:\xampp\htdocs
3. aktifkan xampp module apache dan MySql
4. buka browser dan ketik http://localhost/phpmyadmin/
5. setelah itu create database dan masukkan nama file sql yang ada. kemudian import file sql yang ada ke dalam phpmyadmin.
6. setelah file berhasil diimport maka dapat menjalankan file yang ada dengan memasukkan url localhost/nama folder yang ada/nama file yang ingin dirun. contoh seperti localhost/uts/index.php.
7. file utama untuk menjalankan web tersebut adalah index.php

Terdapat beberapa Modul Crud seperti :
1. Bahan
2. Produk
3. Produksi
4. Pekerja
5. Laporan

Requirement :
PHP v5.6.12 Native, Bootstrap v3.3.7, DataTables 1.10.12, mysqlnd 8 2.12, apache/2.4.58, phpmyadmin 5.2.1

Cara menggunakan webiste :
1. Login kedalam website tersebut
2. Input username dan password
3. Setelah masuk kedalam homepage terdapat 5 fitur utama
   - Bahan
     Didalam fitur bahan kita bisa melakukan :
     * Create : dapat menambahkan kode bahan, nama bahan , jenis bahan
     * Delete : dapat menghapus kode bahan, nama bahan , jenis bahan
     * Edit
     * Update : dapat mengubah kode bahan, nama bahan , jenis bahan
       
   - Produk
     Didalam fitur bahan kita bisa melakukan :
     * Create: dapat menambahkan kode produk, nama produk , unit, kode bahan
     * Delete: dapat menghapus kode produk, nama produk , unit, kode bahan
     * Edit
     * Update: dapat mengubah kode produk, nama produk , unit, kode bahan
       
   - Produksi
     Didalam fitur bahan kita bisa melakukan :
     * Create : dapat menambahkan kode produksi, tanggal , kode produk , kode pekerja, jumlah, harga
     * Delete : dapat menghapus kode produksi, tanggal , kode produk , kode pekerja, jumlah, harga
     * Edit
     * Update : dapat mengubah kode produksi, tanggal , kode produk , kode pekerja, jumlah, harga
       
   - Pekerja
     Didalam fitur bahan kita bisa melakukan :
     * Create : dapat menambahkan kode pekerja, nama tim , jumlah pekerja
     * Delete : dapat menghapus kode pekerja, nama tim , jumlah pekerja
     * Edit
     * Update : dapat mengubah kode pekerja, nama tim , jumlah pekerja
       
   - Laporan
     Didalam fitur bahan kita bisa melakukan :
     * Read : dapat melihat hasil laporan meliputi nama produk, jenis bahan, nama bahan, tanggal, harga
       
4. Jika sudah selesai menggunakan website tersebut makan dapat melakukan Logout.
