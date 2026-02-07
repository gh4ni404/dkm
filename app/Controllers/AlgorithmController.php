<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AlgorithmController extends BaseController
{
    public function __construct()
    {
        helper('algorithm');
    }
    
    /**
     * Test Factorial Function
     * GET /algorithm/factorial/{n}
     */
    public function testFactorial($n = 3)
    {
        $result = factorial($n);
        
        return $this->response->setJSON([
            'status' => 'success',
            'function' => 'factorial',
            'input' => $n,
            'output' => $result,
            'formula' => "$n! = $result"
        ]);
    }
    
    /**
     * Test Century Function
     * GET /algorithm/century/{year}
     */
    public function testCentury($year = 1905)
    {
        $result = getCentury($year);
        
        return $this->response->setJSON([
            'status' => 'success',
            'function' => 'getCentury',
            'input' => $year,
            'output' => $result,
            'description' => "Tahun $year berada di abad ke-$result"
        ]);
    }
    
    /**
     * Test Missing Statues Function
     * POST /algorithm/missing-statues
     * Body: {"statues": [6, 2, 3, 8]}
     */
    public function testMissingStatues()
    {
        $input = $this->request->getJSON(true);
        $statues = $input['statues'] ?? [6, 2, 3, 8];
        
        $result = missingStatues($statues);
        
        return $this->response->setJSON([
            'status' => 'success',
            'function' => 'missingStatues',
            'input' => $statues,
            'output' => $result,
            'description' => "Diperlukan $result patung untuk melengkapi urutan"
        ]);
    }
    
    /**
     * Test Adjacent Elements Product Function
     * POST /algorithm/adjacent-product
     * Body: {"array": [3, 6, -2, -5, 7, 3]}
     */
    public function testAdjacentProduct()
    {
        $input = $this->request->getJSON(true);
        $array = $input['array'] ?? [3, 6, -2, -5, 7, 3];
        
        $result = adjacentElementsProduct($array);
        
        return $this->response->setJSON([
            'status' => 'success',
            'function' => 'adjacentElementsProduct',
            'input' => $array,
            'output' => $result,
            'description' => "Hasil perkalian terbesar dari pasangan elemen berdekatan: $result"
        ]);
    }
    
    /**
     * Test All Algorithms
     * GET /algorithm/test-all
     */
    public function testAll()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Test semua fungsi algoritma',
            'results' => [
                'factorial' => [
                    'factorial(3)' => factorial(3),
                    'factorial(5)' => factorial(5),
                ],
                'century' => [
                    'getCentury(1905)' => getCentury(1905),
                    'getCentury(1700)' => getCentury(1700),
                    'getCentury(2000)' => getCentury(2000),
                ],
                'missing_statues' => [
                    'missingStatues([6,2,3,8])' => missingStatues([6, 2, 3, 8]),
                    'missingStatues([0,3,5])' => missingStatues([0, 3, 5]),
                ],
                'adjacent_product' => [
                    'adjacentElementsProduct([3,6,-2,-5,7,3])' => adjacentElementsProduct([3, 6, -2, -5, 7, 3]),
                    'adjacentElementsProduct([5,1,2,3,1,4])' => adjacentElementsProduct([5, 1, 2, 3, 1, 4]),
                    'adjacentElementsProduct([-1,-2])' => adjacentElementsProduct([-1, -2]),
                ]
            ]
        ]);
    }
}
