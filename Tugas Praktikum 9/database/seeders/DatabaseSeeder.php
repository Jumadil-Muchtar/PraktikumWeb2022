<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Permission;
use App\Models\PermissionSeller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kategori
        $kategori = ['Kayu','Bioteknologi','Hewan','Industri Kimia','Minyak Bumi','Tanaman'];
        foreach ($kategori as $k){
            Category::create([
                'name' => $k,
                'status' => 'Tersedia'
            ]);
        }

        // Permission
        Permission::factory()
            ->count(20)
            ->create();
        
        // Seller dan Product
        Seller::factory()
            ->count(10)
            ->has(Product::factory()->count(5))
            ->create(); 

        // PermissionSeller
        PermissionSeller::factory()
            ->count(30)
            ->create(); 
    }
}