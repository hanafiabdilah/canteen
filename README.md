![alt text](https://github.com/hanafiabdilah/canteen/blob/master/public/assets/img/readme/product_list.png?raw=true)
![alt text](https://github.com/hanafiabdilah/canteen/blob/master/public/assets/img/readme/balance_box.png?raw=true)

## Description

The kantin Digital is a digital-based canteen system.

## How to Run ?

-   Clone this project
-   Rename or copy ".env.example" file to ".env"
-   Run "composer install"
-   Create database on MySQL
-   Change the contents of DB_DATABASE with the name of the database you just created
-   Run "php artisan migrate"
-   Run "php artisan serve"

## Feature

-   Products List

    Halaman ini adalah halaman yang menampilkan semua produk, baik produk yang belum terjual dan produk yang sudah terjual. Halaman ini dapat di akses oleh semua siswa, baik yang sudah login ataupun belum. Hanya saja siswa yang belum login hanya dapat melihat produk. Sedangkan siswa yang sudah login dapat membeli produk siswa lain.
    Disini juga terdapat fitur Sort By yang terdiri dari Latest, Ascending, Descending yang artinya :

    -   Latest adalah default atau produk di urutkan berdasarkan pembuatan terakhir
    -   Ascending akan diurutkan berdasarkan nama yang dimulai huruf A-Z
    -   Descending akan diurutkan berdasarkan nama yang dimulai huru Z-A

    Fitur Sort By ini tidak akan mempengaruhi produk yang sudah terjual, produk yang sudah terjual akan selalu ada diurutan terakhir, di urutkan berdasarkan penjualan terbaru

-   Login

    Login ini untuk autentikasi siswa, jika siswa sudah memiliki akun dapat login disini dan setelah login berhasil akan diarahkan ke halaman produk. Siswa yang sudah login juga dapat menambahkan produk, menarik saldo, melihat balance box, melihat my produk, melihat daftar pembelian, melihat daftar penjualan dan tentunya melihat profilenya sendiri

-   Register

    Siswa yang tidak memiliki akun dapat melakukan pendaftaran dengan bebas di halaman ini, cukup mengisi nama, email dan juga password. Secara otomatis akan dibuatkan User ID yang nantinya digunakan untuk login

-   Balance Box

    Dihalaman ini terdapt informasi mengenai seluruh saldo kantin. Ada informasi mengenai jumlah keseluruhan saldo, saldo saat ini, dan juga saldo yang sudah ditarik oleh siswa. Dihalaman ini terdapat dua table, yang pertama table mengenai informasi saldo yang dimiliki oleh setiap siswa dan table yang kedua adalah table history penarikan saldo seluruh siswa. Tentu saja halaman ini hanya dapat diakses oleh siswa yang sudah login

-   Add Product

    Siswa yang sudah login dapat menjual produknya sendiri dan dapat membuatnya dihalaman ini

-   My Product

    Siswa yang sudah membuat produk dapat melihat produknya dihalaman ini

-   My Profile

    Dihalaman ini siswa dapat melihat data diri dan data saldonya sendiri. Data diri adalah data yang siswa daftarkan ketika mendaftar, dan ada User ID yang digenerate secara otomatis.

-   Withdraw

    Penarikan saldo bisa dilakukan oleh siswa yang tentu saja memiliki saldo minimal Rp. 1000. Saldo ini didapatkan jika ada siswa lain yang membeli produknya

-   Purchase

    Halaman ini adalah halaman history pembelian siswa, ketika siswa membeli produk maka akan ditampilkan ditable yang ada dihalaman ini

-   Sale

    Halaman ini adalah halaman history penjualan siswa, ketika ada siswa lain yang membeli produk maka akan ditampilkan ditable yang ada dihalaman ini

## License

-   Developed using Laravel version 8 (https://laravel.com/docs/8.x)
-   Using the "SOFT UI" template from (https://www.creative-tim.com)
