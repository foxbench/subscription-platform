<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $websites = [
            'TechNews.com',
            'FashionTrends.com',
            'HealthyLife.com',
            'TravelLife.com',
            'FoodLovers.com',
            'Sports.com',
            'Gaming.com',
            'Music.com',
            'Movies.com',
            'TVShows.com',
            'Books.com',
            'Cars.com',
            'RealEstate.com',
            'HomeDecor.com',
            'Gardening.com',
        ];

        foreach ($websites as $websiteName) {
            Website::create(['name' => $websiteName]);
        }
    }
}
