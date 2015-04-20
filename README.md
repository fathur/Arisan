# Arisan


Aplikasi untuk mengocok hasil arisan

## Cara instalasi

Buka terminal atau command prompt.

Pindah ke direktori web aplikasi root, kemudian eksekusi kode berikut untuk menyalin kode dari github.

```
$ git clone https://github.com/fathur/Arisan.git
```

Jika tidak mempunyai git bisa download langsung zipnya.

Selanjutnya setting database, buka file `app/config/database.php` dan isikan sesuai dengan nama database Anda.

Eksekusi kode berikut melalui terminal:

```
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

Keterangan:

`composer install` untuk mengunduh dependency library yang diperlukan. `php artisan migrate` untuk membuat struktur database. `php artisan db:seed` untuk insert data yang diperlukan.

Aplikasi berada di folder `public`, jika ingin mengaksesnya dengan ditambahkan `/public` pada url. Atau dengan setting virtual host web server dan diarahkan ke folder 'public'.

Jika telah berhasil, silahkan login:

- email: admin@admin.com
- password: admin

## Fitur

1. User Management
2. Manajemen anggota
3. Manajemen nomor undian
4. Pencarian (Search)
5. Import dari Excel


Catatan:

Untuk file excel yang diimport harus memiliki struktur kolom persis sebagai berikut:

					A 				B 			C
			-----------------------------------------
	1		| Nomor undian 	| Nama anggota 	| Nama 	|
			-----------------------------------------
	2		|				|				|		|
	3		|				|				|		|
	4		|				|				|		|
			-----------------------------------------
