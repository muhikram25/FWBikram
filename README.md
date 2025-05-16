## <p align="center" style="margin-top: 0;">SISTEM PENCARIAN KOSTAN BAGI MAHASISWA</p>

<p align="center">
  <img src="/public/LogoUnsulbar.png" width="300" alt="LogoUnsulbar" />
</p>

### <p align="center">MUH. IKRAM</p>

### <p align="center">D0222538</p></br>

### <p align="center">FRAMEWORK WEB BASED</p>

### <p align="center">2025</p>

---

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role          | Akses                                                                                     |
|---------------|--------------------------------------------------------------------------------------------|
| **Admin**     | Melihat semua data pengguna, menyetujui kosan yang ditambahkan pemilik, menghapus/menyembunyikan kosan |
| **Pemilik Kos** | Menambahkan kosan, mengedit/menghapus kosan milik sendiri, melihat statistik pencarian kosan mereka |
| **Mahasiswa** | Mencari kosan, melihat detail kosan, menghubungi pemilik kos, memberikan rating/review (opsional) |

---

## 🗃️ Struktur Database

### 1. Tabel `users`

| Field          | Tipe Data        | Keterangan                                  |
|----------------|------------------|---------------------------------------------|
| id             | bigint (PK)      | ID unik                                     |
| name           | varchar          | Nama lengkap user                           |
| email          | varchar (unique) | Alamat email                                |
| password       | varchar          | Password terenkripsi                        |
| phone          | varchar          | Nomor telepon (opsional)                    |
| bio            | text             | Deskripsi profil (opsional)                 |
| photo          | varchar          | Foto profil (opsional)                      |
| role           | enum             | admin, agent, user (default: user)          |
| remember_token | varchar          | Token untuk remember me                     |
| created_at     | timestamp        | Tanggal dibuat                              |
| updated_at     | timestamp        | Tanggal update                              |

### 2. Tabel `properties`

| Field          | Tipe Data   | Keterangan                                  |
|----------------|-------------|---------------------------------------------|
| id             | bigint (PK) | ID properti                                 |
| user_id        | bigint (FK) | Relasi ke `users` (pemilik kos)             |
| title          | varchar     | Judul properti                              |
| description    | text        | Deskripsi lengkap                           |
| address        | varchar     | Alamat lengkap                              |
| city           | varchar     | Kota lokasi                                 |
| state          | varchar     | Provinsi lokasi                             |
| zip_code       | varchar     | Kode pos                                    |
| price          | decimal     | Harga kosan                                 |
| bedrooms       | integer     | Jumlah kamar tidur                          |
| bathrooms      | integer     | Jumlah kamar mandi                          |
| sqft           | integer     | Luas bangunan                               |
| year_built     | integer     | Tahun dibangun (opsional)                   |
| property_type  | varchar     | Jenis properti (kos campur, putra, putri)   |
| featured       | boolean     | Status featured                             |
| created_at     | timestamp   | Tanggal dibuat                              |
| updated_at     | timestamp   | Tanggal update                              |

### 3. Tabel `property_images`

| Field        | Tipe Data   | Keterangan                              |
|--------------|-------------|-----------------------------------------|
| id           | bigint (PK) | ID gambar                               |
| property_id  | bigint (FK) | Relasi ke `properties`                  |
| image_path   | varchar     | Path/link gambar                        |
| is_featured  | boolean     | Status gambar utama                     |
| created_at   | timestamp   | Tanggal dibuat                          |
| updated_at   | timestamp   | Tanggal update                          |
### 4. Tabel `cities`

| Field           | Tipe Data   | Keterangan                          |
|-----------------|-------------|-------------------------------------|
| id              | bigint (PK) | ID kota                             |
| name            | varchar     | Nama kota                           |
| image           | varchar     | Gambar kota (opsional)              |
| properties_count| integer     | Jumlah properti yang tersedia       |
| created_at      | timestamp   | Tanggal dibuat                      |
| updated_at      | timestamp   | Tanggal update                      |

### 5. Tabel `testimonials`

| Field           | Tipe Data   | Keterangan                            |
|-----------------|-------------|----------------------------------------|
| id              | bigint (PK) | ID testimoni                          |
| client_name     | varchar     | Nama pemberi testimoni                |
| client_position | varchar     | Posisi atau status (misal: Mahasiswa) |
| content         | text        | Isi testimoni                         |
| client_image    | varchar     | Foto pemberi testimoni (opsional)     |
| rating          | integer     | Rating (1-5)                          |
| created_at      | timestamp   | Tanggal dibuat                        |
| updated_at      | timestamp   | Tanggal update                        |

### 6. Tabel `contacts`

| Field        | Tipe Data   | Keterangan                     |
|--------------|-------------|--------------------------------|
| id           | bigint (PK) | ID kontak                      |
| name         | varchar     | Nama pengirim                  |
| email        | varchar     | Email pengirim                 |
| subject      | varchar     | Subjek pesan                   |
| message      | text        | Isi pesan                      |
| is_read      | boolean     | Status sudah dibaca/belum      |
| created_at   | timestamp   | Tanggal dibuat                 |
| updated_at   | timestamp   | Tanggal update                 |

---

## 🔗 Relasi Antar Tabel

| Tabel Asal   | Tabel Tujuan     | Relasi      | Penjelasan                                             |
|--------------|------------------|-------------|--------------------------------------------------------|
| users        | properties        | one-to-many | Satu pemilik bisa menambahkan banyak properti          |
| properties   | property_images   | one-to-many | Satu kosan bisa memiliki banyak gambar                 |
| cities       | properties        | one-to-many | Satu kota bisa memiliki banyak properti                |
| users        | testimonials      | one-to-many | Satu user bisa memberikan banyak testimoni             |
| users        | contacts          | one-to-many | Satu user bisa mengirim banyak pesan                   |
