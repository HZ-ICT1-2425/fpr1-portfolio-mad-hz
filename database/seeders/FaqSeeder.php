<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How can you print a document from your laptop at HZ?',
                'answer' => 'You could login on the my net pay from there, you select a printer, upload your documents and then print.',
                'source_url' => 'https://hz.mynetpay.nl/',
                'source_title' => 'My Net Pay',
            ],
            [
                'question' => 'How can you scan a document and send it to your laptop at HZ?',
                'answer' => 'You scan your documents on one of the printers at the HZ, then you enter your email address to receive it.',
                'source_url' => '',
                'source_title' => '',
            ],
            [
                'question' => 'How can I buy something (like when I sign up for the IT introduction event) on the HZ web shop?',
                'answer' => 'On the webshop, you can register for events or buy materials. Add them to the cart, pay, and wait for a confirmation.',
                'source_url' => 'https://webshop.hz.nl/',
                'source_title' => 'HZ Webshop',
            ],
            [
                'question' => 'How can you book a project space?',
                'answer' => 'You could easily reserve a place through the self-service portal on the HZ website.',
                'source_url' => 'https://portal.hz.nl/',
                'source_title' => 'HZ Portal',
            ],
            [
                'question' => 'What are the instructions if you want to park your car at the HZ parking lot?',
                'answer' => 'Parking at HZ is limited. Students and staff can use the Kousteensedijk car park, which is an 8-minute walk from the HZ. Show your entry card at the JRCZ service desk for an exit card.',
                'source_url' => '',
                'source_title' => '',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // Faq Factory
        Faq::factory(10)->create();
    }
}
