# 🏥 Hospital Paperless System - Technical Test DKM

Sistem manajemen rumah sakit sederhana yang mendemonstrasikan pemahaman:
- ✅ Database Design & Relasi
- ✅ CRUD Operations
- ✅ Complex JOIN Queries
- ✅ REST API dengan Filter
- ✅ Algoritma (PHP & JavaScript)

---

## 🚀 Quick Start

### 1. Buat Database
```sql
CREATE DATABASE dev_paperless_hospital;
```

### 2. Setup & Run
```bash
# Jalankan migration
php spark migrate

# Isi sample data
php spark db:seed HospitalSeeder

# Jalankan server
php spark serve
```

### 3. Test API
```
http://localhost:8080/api/pasien-data
http://localhost:8080/algorithm/test-all
```

---

## 📋 Fitur Lengkap

### 1. Database (5 Tabel dengan Relasi)
- `pasien` - Data pasien
- `poli` - Data poli klinik
- `dokter` - Data dokter dengan relasi ke poli
- `registrasi_pasien` - Pendaftaran pasien
- `periksa_pasien` - Hasil pemeriksaan

### 2. REST API

**Query JOIN dengan Filter:**
```
GET /api/pasien-data
GET /api/pasien-data?tanggal_awal=2024-01-06&tanggal_akhir=2024-01-07
GET /api/pasien-data?nama_pasien=iwan
GET /api/pasien-data?nama_dokter=angga
```

**Jumlah Pasien per Dokter:**
```
GET /api/pasien-per-dokter
GET /api/pasien-per-dokter?tanggal_awal=2024-01-06
```

**CRUD Pasien:**
```
GET    /pasien          - List all
GET    /pasien/{id}     - Detail
POST   /pasien          - Create
PUT    /pasien/{id}     - Update
DELETE /pasien/{id}     - Delete
```

### 3. Test Algoritma
```
GET  /algorithm/test-all
GET  /algorithm/factorial/5
GET  /algorithm/century/1905
POST /algorithm/missing-statues
POST /algorithm/adjacent-product
```

---

## 📁 Struktur File

```
hospital-system/
├── app/
│   ├── Controllers/
│   │   ├── PasienController.php              # CRUD
│   │   ├── AlgorithmController.php           # Algoritma
│   │   └── Api/HospitalApiController.php     # JOIN Query
│   ├── Models/                                # 5 Models
│   │   ├── PasienModel.php
│   │   ├── PoliModel.php
│   │   ├── DokterModel.php
│   │   ├── RegistrasiPasienModel.php
│   │   └── PeriksaPasienModel.php
│   ├── Database/
│   │   ├── Migrations/                        # 5 Migrations
│   │   └── Seeds/HospitalSeeder.php          # Sample Data
│   └── Helpers/algorithm_helper.php          # Algoritma PHP
├── public/assets/js/algorithm.js             # Algoritma JS
├── .env                                       # Database Config
├── LANGKAH_SETUP.md                          # Setup Guide
├── SETUP_GUIDE.md                            # Documentation
├── PENJELASAN_TEKNIS.md                      # Technical Explanation
├── README_DEMO.md                            # Demo Guide
├── POSTMAN_COLLECTION.json                   # 20+ Requests
└── QUERY_MANUAL.sql                          # Manual SQL Queries
```
---

## 📊 Sample Data

### Pasien: 5 records
- 001 - Iwan Setiawan
- 002 - Siti Nurhaliza
- 003 - Budi Santoso
- 004 - Dewi Lestari
- 005 - Ahmad Dahlan

### Poli: 4 records
- Poli Gigi
- Poli Umum
- Poli Anak
- Poli Mata

### Dokter: 4 records
- D001 - Dr. Angga Pratama (Poli Gigi)
- D002 - Dr. Sarah Wijaya (Poli Umum)
- D003 - Dr. Bambang Susilo (Poli Anak)
- D004 - Dr. Maya Sari (Poli Mata)
---

## ✨ Dibuat dengan

- **CodeIgniter 4** - PHP Framework
- **MySQL** - Database
- **RESTful API** - Architecture
- **MVC Pattern** - Design Pattern
---

## 📄 License

This is a technical test project for DKM (Digital Kreasi Muslim) interview.

Created with ❤️ for demonstrating junior developer skills.
