<?php

namespace App\Http\Controllers;

class FoodController extends Controller
{
    public function index()
    {
        $dataMenu = [
            // === MAKANAN ===
            ['nama' => 'Ayam Bakar + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Geprek + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Geprek + Mie', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Geprek + Nasi + Mie', 'harga' => 20000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Geprek + Jengkol + Nasi', 'harga' => 20000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Penyet + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Penyet Pecak + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Ayam Balado + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Pecel Ayam + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Empal Daging + Nasi', 'harga' => 20000, 'kategori' => 'makanan'],
            ['nama' => 'Iga Bakar + Nasi', 'harga' => 25000, 'kategori' => 'makanan'],
            ['nama' => 'Nila Pecak + Nasi', 'harga' => 20000, 'kategori' => 'makanan'],
            ['nama' => 'Cumi Asin Balado + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Pecel Lele + Nasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Chicken Katsu + Nasi', 'harga' => 18000, 'kategori' => 'makanan'],
            ['nama' => 'Beef Katsu + Nasi', 'harga' => 18000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Ati Ampela', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Suir Ayam', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Cikur', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Bakso', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Sosis', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Terasi', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Teri', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Nasi Goreng Komplit', 'harga' => 17000, 'kategori' => 'makanan'],
            ['nama' => 'Kwetiau Komplit', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Mie Tek-Tek', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Makaroni Basah Telor', 'harga' => 12000, 'kategori' => 'makanan'],
            ['nama' => 'Makaroni Basah Komplit', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Sop Iga Sapi', 'harga' => 20000, 'kategori' => 'makanan'],
            ['nama' => 'Sop Ayam', 'harga' => 15000, 'kategori' => 'makanan'],
            ['nama' => 'Jengkol Balado', 'harga' => 10000, 'kategori' => 'makanan'],
            ['nama' => 'Udang Crispy', 'harga' => 13000, 'kategori' => 'makanan'],

            // === CEMILAN ===
            ['nama' => 'Ceker Mercon', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Bakso Mercon', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Seblak Komplit', 'harga' => 15000, 'kategori' => 'cemilan'],
            ['nama' => 'Seblak Ceker', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Seblak Tulang', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Seblak Bakso', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Seblak Sosis', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Pisang Goreng', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Pisang Crispy Keju/Cklt', 'harga' => 13000, 'kategori' => 'cemilan'],
            ['nama' => 'Sosis Solo Ayam 5pcs', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Sosis Solo Ayam 10pcs', 'harga' => 20000, 'kategori' => 'cemilan'],
            ['nama' => 'Risol Roguet 5pcs', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Risol Roguet 10pcs', 'harga' => 20000, 'kategori' => 'cemilan'],
            ['nama' => 'Bakso Tahu 5pcs', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Bakso Tahu 10pcs', 'harga' => 20000, 'kategori' => 'cemilan'],
            ['nama' => 'Bakso Goreng', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Bakso Bakar', 'harga' => 10000, 'kategori' => 'cemilan'],
            ['nama' => 'Tahu/Tempe', 'harga' => 5000, 'kategori' => 'cemilan'],
            ['nama' => 'Pisang Bakar Keju/Cklt/Campur', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Pisang Bakar Full Keju', 'harga' => 14000, 'kategori' => 'cemilan'],
            ['nama' => 'Roti Bakar Keju/Cklt/Campur', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Roti Pisang Bakar Keju/Cklt', 'harga' => 12000, 'kategori' => 'cemilan'],
            ['nama' => 'Roti Bakar Full Keju', 'harga' => 14000, 'kategori' => 'cemilan'],

            // === MINUMAN ===
            ['nama' => 'Wedang Jahe', 'harga' => 10000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Mangga', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Alpukat', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Jeruk', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Strawberry', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Melon', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Jus Jambu', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Choco Drink', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Cappuchino', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Tiramisu', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Lemon Tea', 'harga' => 8000, 'kategori' => 'minuman'],
            ['nama' => 'Le Mineral 1500ml', 'harga' => 9000, 'kategori' => 'minuman'],
        ];

        return view('daftar_menu', compact('dataMenu'));
    }
}

?>