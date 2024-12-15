<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::create([
            'name' => 'Template 1',
            'thumbnail' => '/templates/thumbnails/template1.png',
            'file_path' => '/templates/html/template1.html',
        ]);

        Template::create([
            'name' => 'Template 2',
            'thumbnail' => '/templates/thumbnails/template2.png',
            'file_path' => '/templates/html/template2.html',
        ]);

        Template::create([
            'name' => 'Template 3',
            'thumbnail' => '/templates/thumbnails/template3.png',
            'file_path' => '/templates/html/template3.html',
        ]);
    }
}
