<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         \App\Models\StaticPage::factory()->create([
             'urlname' => 'Contact',
             'view' => 'simple',
             'title' => 'Контакты',
             'content'=> file_get_contents(__DIR__. '/Новая папка/Contact.html'),
         ]);

         \App\Models\StaticPage::factory()->create([
            'urlname' => 'i1',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd1.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i2',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd2.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i3',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd3.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i4',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd4.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i5',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd5.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i6',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd6.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i7',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd7.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i8',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd8.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i9',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd9.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i10',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd10.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i11',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd11.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'i12',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/izd12.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'Registr',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/Registr.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'Catalog',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/Catalog.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'lk',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/lk.html'),
        ]);

        \App\Models\StaticPage::factory()->create([
            'urlname' => 'main',
            'view' => 'simple',
            'title' => 'Контакты',
            'content'=> file_get_contents(__DIR__. '/Новая папка/main1.html'),
        ]);
    }
}
