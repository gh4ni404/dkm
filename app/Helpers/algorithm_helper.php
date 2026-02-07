<?php

/**
 * Helper Functions untuk Test Algoritma
 * 
 * Berisi fungsi-fungsi algoritma yang diminta dalam technical test:
 * 1. Factorial (JavaScript/PHP)
 * 2. Century Calculator (JavaScript/PHP)
 * 3. Missing Statues (PHP)
 * 4. Adjacent Elements Product (PHP)
 */

if (!function_exists('factorial')) {
    /**
     * Menghitung factorial dari suatu angka
     * 
     * @param int $n
     * @return int
     * 
     * Contoh:
     * factorial(3) = 6 (3 x 2 x 1)
     * factorial(5) = 120 (5 x 4 x 3 x 2 x 1)
     */
    function factorial($n)
    {
        // Base case
        if ($n <= 1) {
            return 1;
        }
        
        // Recursive case
        return $n * factorial($n - 1);
    }
}

if (!function_exists('getCentury')) {
    /**
     * Menghitung abad dari suatu tahun
     * Abad pertama: tahun 1-100
     * Abad kedua: tahun 101-200
     * dst.
     * 
     * @param int $year
     * @return int
     * 
     * Contoh:
     * getCentury(1905) = 20
     * getCentury(1700) = 17
     * getCentury(2000) = 20
     * getCentury(2001) = 21
     */
    function getCentury($year)
    {
        // Gunakan ceil untuk pembulatan ke atas
        // Karena tahun 1-100 = abad 1, tahun 101-200 = abad 2
        return (int) ceil($year / 100);
    }
}

if (!function_exists('missingStatues')) {
    /**
     * Menghitung jumlah patung yang dibutuhkan untuk melengkapi urutan
     * 
     * @param array $statues
     * @return int
     * 
     * Contoh:
     * missingStatues([6, 2, 3, 8]) = 3
     * Urutan lengkap: 2, 3, 4, 5, 6, 7, 8
     * Yang hilang: 4, 5, 7 (total 3 patung)
     * 
     * missingStatues([0, 3, 5]) = 3
     * Urutan lengkap: 0, 1, 2, 3, 4, 5
     * Yang hilang: 1, 2, 4 (total 3 patung)
     */
    function missingStatues($statues)
    {
        // Jika array kosong atau hanya 1 elemen
        if (count($statues) <= 1) {
            return 0;
        }
        
        // Cari nilai minimum dan maksimum
        $min = min($statues);
        $max = max($statues);
        
        // Hitung total yang seharusnya ada
        $shouldHave = $max - $min + 1;
        
        // Hitung yang sudah ada
        $currentHave = count($statues);
        
        // Selisihnya adalah yang hilang
        return $shouldHave - $currentHave;
    }
}

if (!function_exists('adjacentElementsProduct')) {
    /**
     * Mencari hasil perkalian terbesar dari pasangan elemen yang berdekatan
     * 
     * @param array $inputArray
     * @return int
     * 
     * Contoh:
     * adjacentElementsProduct([3, 6, -2, -5, 7, 3]) = 21
     * Pasangan: (3,6)=18, (6,-2)=-12, (-2,-5)=10, (-5,7)=-35, (7,3)=21
     * Terbesar: 21
     * 
     * adjacentElementsProduct([5, 1, 2, 3, 1, 4]) = 6
     * Pasangan: (5,1)=5, (1,2)=2, (2,3)=6, (3,1)=3, (1,4)=4
     * Terbesar: 6
     * 
     * adjacentElementsProduct([-1, -2]) = 2
     * Pasangan: (-1,-2)=2
     * Terbesar: 2
     */
    function adjacentElementsProduct($inputArray)
    {
        // Inisialisasi dengan nilai terkecil
        $maxProduct = PHP_INT_MIN;
        
        // Loop untuk setiap pasangan yang berdekatan
        for ($i = 0; $i < count($inputArray) - 1; $i++) {
            $product = $inputArray[$i] * $inputArray[$i + 1];
            
            // Update maxProduct jika product lebih besar
            if ($product > $maxProduct) {
                $maxProduct = $product;
            }
        }
        
        return $maxProduct;
    }
}
