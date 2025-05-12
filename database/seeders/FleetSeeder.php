<?php

namespace Database\Seeders;

use App\Models\Fleet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fleets = [
            // Light Jets
            [
                'name' => 'Cessna Citation CJ3',
                'description' => 'The Citation CJ3 offers exceptional performance and comfort in a light jet package. Perfect for short to medium-range flights.',
                'maximum_passenger' => 8,
                'miles' => 2000,
                'category' => 'light',
                'image' => 'fleets/citation-cj3.jpg'
            ],
            [
                'name' => 'Embraer Phenom 100',
                'description' => 'The Phenom 100 combines efficiency with comfort, featuring a spacious cabin and impressive range for a light jet.',
                'maximum_passenger' => 7,
                'miles' => 1178,
                'category' => 'light',
                'image' => 'fleets/phenom-100.jpg'
            ],
            [
                'name' => 'HondaJet HA-420',
                'description' => 'The HondaJet features innovative design and fuel efficiency, setting new standards in the light jet category.',
                'maximum_passenger' => 6,
                'miles' => 1389,
                'category' => 'light',
                'image' => 'fleets/hondajet.jpg'
            ],
            [
                'name' => 'Cirrus Vision SF50',
                'description' => 'The world\'s first single-engine personal jet, combining safety, efficiency, and luxury in a compact package.',
                'maximum_passenger' => 5,
                'miles' => 1000,
                'category' => 'light',
                'image' => 'fleets/vision-sf50.jpg'
            ],
            [
                'name' => 'Beechcraft Premier I',
                'description' => 'A high-performance light jet with a spacious cabin and impressive speed capabilities.',
                'maximum_passenger' => 6,
                'miles' => 1500,
                'category' => 'light',
                'image' => 'fleets/premier-i.jpg'
            ],

            // Mid-Size Jets
            [
                'name' => 'Cessna Citation X',
                'description' => 'The fastest civilian aircraft in the world, offering unmatched speed and luxury in the mid-size category.',
                'maximum_passenger' => 9,
                'miles' => 3500,
                'category' => 'mid',
                'image' => 'fleets/citation-x.jpg'
            ],
            [
                'name' => 'Hawker 800XP',
                'description' => 'A versatile mid-size jet known for its reliability and comfortable cabin experience.',
                'maximum_passenger' => 8,
                'miles' => 2800,
                'category' => 'mid',
                'image' => 'fleets/hawker-800xp.jpg'
            ],
            [
                'name' => 'Learjet 75',
                'description' => 'Combining speed, efficiency, and comfort in a proven mid-size jet platform.',
                'maximum_passenger' => 9,
                'miles' => 2200,
                'category' => 'mid',
                'image' => 'fleets/learjet-75.jpg'
            ],
            [
                'name' => 'Embraer Legacy 450',
                'description' => 'A modern mid-size jet featuring advanced technology and exceptional cabin comfort.',
                'maximum_passenger' => 9,
                'miles' => 2900,
                'category' => 'mid',
                'image' => 'fleets/legacy-450.jpg'
            ],
            [
                'name' => 'Gulfstream G150',
                'description' => 'A high-performance mid-size jet offering excellent range and speed capabilities.',
                'maximum_passenger' => 8,
                'miles' => 3000,
                'category' => 'mid',
                'image' => 'fleets/g150.jpg'
            ],

            // Super Mid-Size Jets
            [
                'name' => 'Cessna Citation X+',
                'description' => 'The successor to the Citation X, maintaining its position as the fastest civilian aircraft with enhanced features.',
                'maximum_passenger' => 12,
                'miles' => 3600,
                'category' => 'super',
                'image' => 'fleets/citation-x-plus.jpg'
            ],
            [
                'name' => 'Gulfstream G280',
                'description' => 'A super mid-size jet offering exceptional range and cabin comfort.',
                'maximum_passenger' => 10,
                'miles' => 3600,
                'category' => 'super',
                'image' => 'fleets/g280.jpg'
            ],
            [
                'name' => 'Bombardier Challenger 350',
                'description' => 'A versatile super mid-size jet with impressive range and cabin amenities.',
                'maximum_passenger' => 10,
                'miles' => 3200,
                'category' => 'super',
                'image' => 'fleets/challenger-350.jpg'
            ],
            [
                'name' => 'Embraer Legacy 500',
                'description' => 'A modern super mid-size jet featuring advanced avionics and luxurious cabin.',
                'maximum_passenger' => 12,
                'miles' => 3000,
                'category' => 'super',
                'image' => 'fleets/legacy-500.jpg'
            ],
            [
                'name' => 'Dassault Falcon 2000S',
                'description' => 'A high-performance super mid-size jet with exceptional range and comfort.',
                'maximum_passenger' => 10,
                'miles' => 3400,
                'category' => 'super',
                'image' => 'fleets/falcon-2000s.jpg'
            ],

            // Heavy Jets
            [
                'name' => 'Gulfstream G550',
                'description' => 'A long-range heavy jet offering exceptional comfort and performance.',
                'maximum_passenger' => 16,
                'miles' => 6700,
                'category' => 'heavy',
                'image' => 'fleets/g550.jpg'
            ],
            [
                'name' => 'Bombardier Global 6000',
                'description' => 'A ultra-long-range heavy jet with luxurious cabin and impressive performance.',
                'maximum_passenger' => 14,
                'miles' => 6000,
                'category' => 'heavy',
                'image' => 'fleets/global-6000.jpg'
            ],
            [
                'name' => 'Dassault Falcon 7X',
                'description' => 'A versatile heavy jet known for its range and cabin comfort.',
                'maximum_passenger' => 16,
                'miles' => 5950,
                'category' => 'heavy',
                'image' => 'fleets/falcon-7x.jpg'
            ],
            [
                'name' => 'Embraer Lineage 1000E',
                'description' => 'A spacious heavy jet offering exceptional cabin comfort and range.',
                'maximum_passenger' => 16,
                'miles' => 4500,
                'category' => 'heavy',
                'image' => 'fleets/lineage-1000e.jpg'
            ],
            [
                'name' => 'Bombardier Challenger 650',
                'description' => 'A high-performance heavy jet with impressive range and cabin amenities.',
                'maximum_passenger' => 14,
                'miles' => 4000,
                'category' => 'heavy',
                'image' => 'fleets/challenger-650.jpg'
            ],

            // Long Range Jets
            [
                'name' => 'Gulfstream G650ER',
                'description' => 'The flagship ultra-long-range jet offering unmatched performance and luxury.',
                'maximum_passenger' => 19,
                'miles' => 7500,
                'category' => 'long_range',
                'image' => 'fleets/g650er.jpg'
            ],
            [
                'name' => 'Bombardier Global 7500',
                'description' => 'The largest and longest-range business jet in the world.',
                'maximum_passenger' => 19,
                'miles' => 7700,
                'category' => 'long_range',
                'image' => 'fleets/global-7500.jpg'
            ],
            [
                'name' => 'Dassault Falcon 8X',
                'description' => 'A ultra-long-range jet with exceptional cabin comfort and performance.',
                'maximum_passenger' => 19,
                'miles' => 6450,
                'category' => 'long_range',
                'image' => 'fleets/falcon-8x.jpg'
            ],
            [
                'name' => 'Gulfstream G700',
                'description' => 'The newest and most advanced ultra-long-range jet in the Gulfstream fleet.',
                'maximum_passenger' => 19,
                'miles' => 7500,
                'category' => 'long_range',
                'image' => 'fleets/g700.jpg'
            ],
            [
                'name' => 'Bombardier Global 8000',
                'description' => 'The next generation of ultra-long-range business jets.',
                'maximum_passenger' => 19,
                'miles' => 8000,
                'category' => 'long_range',
                'image' => 'fleets/global-8000.jpg'
            ],

            // Commercial Jets
            [
                'name' => 'Boeing 737 BBJ',
                'description' => 'A VIP-configured commercial jet offering exceptional range and cabin space.',
                'maximum_passenger' => 50,
                'miles' => 6000,
                'category' => 'commercial',
                'image' => 'fleets/737-bbj.jpg'
            ],
            [
                'name' => 'Airbus ACJ320',
                'description' => 'A VIP-configured commercial jet with luxurious cabin and impressive range.',
                'maximum_passenger' => 50,
                'miles' => 6000,
                'category' => 'commercial',
                'image' => 'fleets/acj320.jpg'
            ],
            [
                'name' => 'Boeing 787 BBJ',
                'description' => 'A ultra-long-range VIP-configured commercial jet with exceptional comfort.',
                'maximum_passenger' => 40,
                'miles' => 9500,
                'category' => 'commercial',
                'image' => 'fleets/787-bbj.jpg'
            ],
            [
                'name' => 'Airbus ACJ350',
                'description' => 'A modern VIP-configured commercial jet with impressive range and cabin space.',
                'maximum_passenger' => 45,
                'miles' => 9000,
                'category' => 'commercial',
                'image' => 'fleets/acj350.jpg'
            ],
            [
                'name' => 'Boeing 777 BBJ',
                'description' => 'A large VIP-configured commercial jet offering exceptional range and luxury.',
                'maximum_passenger' => 50,
                'miles' => 10000,
                'category' => 'commercial',
                'image' => 'fleets/777-bbj.jpg'
            ],

            // Turboprop Aircraft
            [
                'name' => 'Pilatus PC-12 NGX',
                'description' => 'A versatile single-engine turboprop known for its efficiency and reliability.',
                'maximum_passenger' => 9,
                'miles' => 1800,
                'category' => 'turboprop',
                'image' => 'fleets/pc12-ngx.jpg'
            ],
            [
                'name' => 'Beechcraft King Air 350i',
                'description' => 'A twin-engine turboprop offering excellent performance and cabin comfort.',
                'maximum_passenger' => 9,
                'miles' => 1800,
                'category' => 'turboprop',
                'image' => 'fleets/king-air-350i.jpg'
            ],
            [
                'name' => 'Daher TBM 940',
                'description' => 'A high-performance single-engine turboprop with impressive speed and range.',
                'maximum_passenger' => 6,
                'miles' => 1735,
                'category' => 'turboprop',
                'image' => 'fleets/tbm-940.jpg'
            ],
            [
                'name' => 'Piaggio P.180 Avanti',
                'description' => 'A unique twin-engine turboprop known for its speed and efficiency.',
                'maximum_passenger' => 9,
                'miles' => 1500,
                'category' => 'turboprop',
                'image' => 'fleets/p180-avanti.jpg'
            ],
            [
                'name' => 'Cessna Caravan',
                'description' => 'A versatile single-engine turboprop perfect for short-haul operations.',
                'maximum_passenger' => 9,
                'miles' => 1000,
                'category' => 'turboprop',
                'image' => 'fleets/caravan.jpg'
            ],
        ];

        foreach ($fleets as $fleet) {
            Fleet::create($fleet);
        }
    }
}
