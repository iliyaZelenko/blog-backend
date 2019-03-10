<?php

use Illuminate\Database\Seeder;
use App\Models\Scope;

class ScopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseUrl = '/self-development/';

        $data = [
            [
                'name' => 'Тестирование',
                'description' => 'Тесты по разным знаниям',
                'icon' => 'list_alt',
                'url' => $baseUrl . 'tests',
                'img' => 'https://media.cnnchile.com/2018/09/examenes-ucam.jpg'
            ],
            [
                'name' => 'Запомнить',
                'description' => 'Информация которую важно повторять',
                'icon' => null,
                'url' => $baseUrl . 'keep-in-mind',
                'img' => 'http://laprimeraplana.com.mx/wp-content/uploads/2012/04/Cerebro-Humano.jpg' // https://www.healthcareitnews.com/sites/default/files/1_checklist.jpg
            ],
            [
                'name' => 'Цитаты',
                'description' => 'Великие мысли великих и не великих людей(знакомых)',
                'icon' => 'format_quote',
                'url' => $baseUrl . 'citations',
                'img' => 'https://i.imgur.com/9WYEeNq.jpg'
            ],
            [
                'name' => 'Контроль времени',
                'description' => 'Четкие планы и история действий для суток',
                'icon' => 'history',
                'url' => $baseUrl . 'time-control',
                'img' => 'https://cdn1.img.sputnik.az/images/41050/87/410508732.jpg'
            ],
            [
                'name' => 'Архив информации',
                'description' => 'Накопленная полезная информация к которой можно обратиться когда надо',
                'icon' => 'archive',
                'url' => $baseUrl . 'archive-information',
                'img' => 'http://www.hist.msu.ru/about/contacts/archive/archive.jpg'
            ],
            [
                'name' => 'Тренажеры',
                'description' => 'Развитие умений благодаря разным упражнениям',
                'icon' => 'trending_up',
                'url' => $baseUrl . 'training',
                'img' => 'https://schoolsweek.co.uk/wp-content/uploads/2018/01/Up-arrow-graph-feat.jpg'
            ]
        ];

        if (Scope::count() >= count($data)) return;

        foreach ($data as $scope) {
            $scope['name_slug'] = str_slug($scope['name']);

            Scope::create($scope);
        }
    }
}

