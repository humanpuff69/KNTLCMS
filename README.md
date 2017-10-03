
KNTLCMS Content Management System . CMS untuk ketik url/nama di facebook<br>
Contohnya adalah seperti masukan namasitus.com/namakamu nanti akan muncul sesuatu<br>
KNTLCMS ini berlisensi opensource dan boleh dipakai gratis asalkan jangan hilangkan watermark / atribut KNTLCMS dan dilarang distribusi KNTLCMS untuk mendapatkan uang

## Syarat WebServer
* PHP 7.0 keatas (belum dites di php 5.6 kebawah tapi ini CMS di debug memakai PHP 7.1)
* VPS (pake hosting bisa tapi tidak maksimal dan tidak direkomendasi)
* MySQL
* nginx (pake apache bisa tapi tidak maksimal . lebih baik murtad ke nginx)

## Cara Install
* Clone seluruh repository KNTLCMS 
* chmod file config.php menjadi 766
* Pergi ke namasitus.com/install
* lakukan instalasi . pastikan detail database mysql benar
* KNTLCMS sukses terinstall
<b>
WARNING! setelah melakukan install . instalasi KNTLCMS anda hanya bia dipakai memakai namasitus.com/nama?namakamu bukan namasitus.com/namakamu . untuk fix masalah ini silahkan ikuti cara selanjutnya</b>

## Cara Agar bisa namasitus.com/namakamu
<b>WARNING! Hanya untuk VPS saja . dan hanya untuk webserver nginx saja . jika memakai apache mohon murtad ke nginx untuk mengaktifkan fitur ini . tidak work untuk hosting</b><br>
1. Buka Config Situs . biasanya ada di /etc/nginx/sites-enabled/namasitus.conf<br>
2. cari bagian location / { dan ganti menjadi seperti berikut <br>

>  location / {<br>
>   index index.php ;<br>
>   try_files $uri $uri/ /index.php?nama=$uri;<br>
>  }<br>

3. Save file dan restart nginx menggunakan command "systemctl nginx restart"<br>

## Demo / Contoh Karya hasil KNTLCMS
<a href src="http://setomulyadi.ml">setomulyadi.ml | Quotes Kak Seto</a>
