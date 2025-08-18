<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whychoose = new WhyChooseUs();
        $whychoose->title = 'Why Choose Us';
        $whychoose->subtitle = 'Why Choose Us';
        $whychoose->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text";
        $whychoose->button_text = 'Learn More';
        $whychoose->button_url = '#';
        $whychoose->display_to_home = '1';
        $whychoose->save();

    }
}
