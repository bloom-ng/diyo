<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Luxury Travel Guide: Top Destinations for 2024',
            'Private Jet Travel: The Ultimate Guide',
            'Exclusive Resorts: Where to Stay in the Maldives',
            'Fine Dining at 30,000 Feet: Private Jet Cuisine',
            'Sustainable Luxury Travel: How to Travel Responsibly',
            'The Art of Packing for Luxury Travel',
            'Private Island Getaways: A Complete Guide',
            'Luxury Train Journeys Around the World',
            'VIP Airport Services: Making Travel Seamless',
            'Luxury Yacht Charter: A Beginner\'s Guide',
            'The Best Private Villas in Bali',
            'Luxury Safari Experiences in Africa',
            'Private Jet Memberships: Which One is Right for You?',
            'The Most Exclusive Golf Resorts Worldwide',
            'Luxury Wellness Retreats: A Guide to the Best',
            'Private Jet Etiquette: Do\'s and Don\'ts',
            'The Ultimate Guide to Luxury Ski Resorts',
            'Private Jet vs First Class: Which is Better?',
            'Luxury Travel Photography: Tips and Tricks',
            'The Best Private Beach Resorts in the World',
            'Luxury Travel with Kids: A Complete Guide',
            'Private Jet Maintenance: What You Need to Know',
            'The Most Exclusive Wine Tours in Europe',
            'Luxury Travel Insurance: What to Look For',
            'Private Jet Charter: How to Get the Best Deals',
            'The Best Luxury Hotels in Paris',
            'Luxury Travel Tech: Must-Have Gadgets',
            'Private Jet Safety: Everything You Need to Know',
            'The Most Exclusive Shopping Destinations',
            'Luxury Travel Planning: A Step-by-Step Guide',
            'Private Jet Interior Design: Latest Trends',
            'The Best Luxury Cruises in the World',
            'Luxury Travel Rewards Programs: A Comparison',
            'Private Jet Catering: How to Plan the Perfect Menu',
            'The Most Exclusive Golf Courses Worldwide',
            'Luxury Travel Apps: Our Top Picks',
            'Private Jet Ownership: Is It Right for You?',
            'The Best Luxury Spas in the World',
            'Luxury Travel with Pets: A Complete Guide',
            'Private Jet Charter: Questions to Ask',
            'The Most Exclusive Beach Clubs Worldwide',
            'Luxury Travel Photography: Best Locations',
            'Private Jet Maintenance: Common Issues',
            'The Best Luxury Train Journeys in Europe',
            'Luxury Travel Insurance: What to Consider',
            'Private Jet Memberships: A Detailed Guide',
            'The Most Exclusive Ski Resorts Worldwide',
            'Luxury Travel Planning: Expert Tips',
            'Private Jet Safety: Latest Updates',
            'The Best Luxury Hotels in Dubai'
        ];

        foreach ($titles as $title) {
            Blog::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $this->generateContent($title),
                'featured_image' => null,
                'is_published' => true,
            ]);
        }
    }

    private function generateContent(string $title): string
    {
        $paragraphs = [
            "In the world of luxury travel, every detail matters. From the moment you step onto your private jet to the second you arrive at your exclusive destination, the experience should be nothing short of extraordinary.",
            "The key to a perfect luxury travel experience lies in careful planning and attention to detail. Whether you're planning a private island getaway or a luxury safari, every aspect of your journey should be meticulously arranged.",
            "Luxury travel isn't just about the destination; it's about the journey. The way you travel, the service you receive, and the memories you create all contribute to the ultimate luxury experience.",
            "When it comes to luxury travel, personalization is everything. Your preferences, needs, and desires should be at the forefront of every decision, ensuring a truly bespoke experience.",
            "The world of luxury travel is constantly evolving, with new destinations, experiences, and services emerging regularly. Staying informed about the latest trends and developments is crucial for any luxury traveler."
        ];

        $content = '';
        for ($i = 0; $i < 5; $i++) {
            $content .= "<p>" . $paragraphs[array_rand($paragraphs)] . "</p>\n\n";
        }

        return $content;
    }
}
