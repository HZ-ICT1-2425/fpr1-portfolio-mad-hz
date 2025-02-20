<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'My Personal SWOT Analysis',
                'slug' => Str::slug('My Personal SWOT Analysis'),
                'image_path' => 'storage/uploads/swot.png',
                'body' => 'Looking at my SWOT analysis, I identified that my strengths are in planning,
                leadership, and problem-solving.
                Such strengths will help me tackle challenges during the HBO-ICT program.',
                'source_url' => null,
                'source_title' => null,
            ],
            [
                'title' => 'Why I Chose the HBO-ICT Program',
                'slug' => Str::slug('Why I Chose the HBO-ICT Program'),
                'image_path' => 'storage/uploads/study-choice.png',
                'body' => 'I chose the HBO-ICT program because it aligns with my passion.
                I am particularly interested in roles where security plays a big role,
                such as back-end development and penetration testing.',
                'source_url' => null,
                'source_title' => null,
            ],
            [
                'title' => 'My Programming Experience',
                'slug' => Str::slug('My Programming Experience'),
                'image_path' => 'storage/uploads/programming.png',
                'body' => 'I have been coding mainly in Laravel, a PHP framework that has
                become central to my development process.
                Alongside Laravel, I use PostgreSQL, MySQL, Nuxt.js, and Tailwind CSS to create efficient,
                responsive applications.',
                'source_url' => null,
                'source_title' => null,
            ],
            [
                'title' => 'ICT Field of Work',
                'slug' => Str::slug('ICT Field of Work'),
                'image_path' => 'storage/uploads/ict.png',
                'body' => 'The ICT field is continuously evolving, offering various career paths.
                The rise of cloud computing, AI,
                and cybersecurity has created a demand for skilled professionals.',
                'source_url' => null,
                'source_title' => null,
            ],
            [
                'title' => 'First Feedback',
                'slug' => Str::slug('First Feedback'),
                'image_path' => 'storage/uploads/feedback.png',
                'body' => 'After completing the SKC assignment, I received feedback about
                 my question on cybersecurity in the program.
                The response mentioned that only the basics would be covered and recommended
                self-study.',
                'source_url' => null,
                'source_title' => null,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // Post factory
        Post::factory(10)->create();
    }
}
