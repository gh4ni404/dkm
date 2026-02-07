/**
 * JavaScript/jQuery Algorithm Functions
 * Untuk Test Algoritma bagian JavaScript
 */

/**
 * Menghitung factorial dari suatu angka
 * @param {number} n 
 * @returns {number}
 * 
 * Contoh:
 * factorial(3) = 6
 * factorial(5) = 120
 */
function factorial(n) {
    // Base case
    if (n <= 1) {
        return 1;
    }
    
    // Recursive case
    return n * factorial(n - 1);
}

/**
 * Menghitung abad dari suatu tahun
 * @param {number} year 
 * @returns {number}
 * 
 * Contoh:
 * getCentury(1905) = 20
 * getCentury(1700) = 17
 */
function getCentury(year) {
    // Gunakan Math.ceil untuk pembulatan ke atas
    return Math.ceil(year / 100);
}

// Test functions
console.log('=== JavaScript Algorithm Test ===');
console.log('factorial(3):', factorial(3)); // Output: 6
console.log('factorial(5):', factorial(5)); // Output: 120
console.log('getCentury(1905):', getCentury(1905)); // Output: 20
console.log('getCentury(1700):', getCentury(1700)); // Output: 17
console.log('getCentury(2000):', getCentury(2000)); // Output: 20

// jQuery ready function (optional)
$(document).ready(function() {
    console.log('Algorithm functions loaded!');
    
    // Example: Display results in HTML
    $('#factorial-result').text('factorial(3) = ' + factorial(3));
    $('#century-result').text('getCentury(1905) = ' + getCentury(1905));
});
