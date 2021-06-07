<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cara Pemasangan Hingga Menjalankan

--------------------------------------------------------------
1.Buka Github Desktop
- Link Downlaod Kalo Blum Install
- https://desktop.github.com/ Sesuai Processornya

2.Pilih Menu/Bar File Di Bagian Atas

3.Pilih Clone Repository
- Pilih URL
- Masukin Url Ini https://github.com/waladahlmzaqi/Laravel_Siakad.git
- Jangan Lupa Buat Tempat Penyimpanan Di C:\xampp\htdocs\github\clone Gunanya Buat Nyimpen File Clone Dari Github
- Abis Itu Oke Dan Tunggu Sampe Selesai

4.Buka VS.Code
- Pilih File Di Bagian Bar Atas
- Open Folder, Open Folder Yang Udah Di Clone Tadi

5.Copy .env.example Dan Rename Menjadi .env
- Buka .env Yang Udah Di Rename
- Buat Database Baru Di Localhost Bebas Namanya
- Cari Line Di .env Yang Bernama DB_DATABASE=namadatabase -> Ubah Nama Databasenya Yang Udah Dibuat Tadi Sesuai Di Mysql.

6.Buka Terminal Di VS.Code
- Cari Terminal Di Bagian Atas Bar
- Pilih New Terminal
- Pertama Ketikkan composer install & composer update
- Lalu Ketikkan Perintah php artisan key:generate
- Setelah Itu Ketikan Perintah php artisan migrate --seed
- Selanjutnya php artisan serve
- Dan Selesai Terimakasih

## Catatan

1.Jangan Asal Push/Update Karena Nanti Keubah Semua Line Yang Diubah. SIPP
