<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'description' => '
                    `[] + 1 + 2`
                ',
                'answers' => json_encode([
                    [
                        'text' => '`[1, 2]`'
                    ],
                    [
                        'text' => '`12`'
                    ],
                    [
                        'text' => '`4`'
                    ],
                    [
                        'text' => '`[]12`'
                    ]
                ]),
                'correct_answers' => json_encode([0]),
                'answer_info' => '
                    У массива вызывается метод toString который в строке перечисляет элементы через запятую, элементов нет, будет пустая строка, дальше числа конкатенируются.
                ',
                'category_id' => 1,
                'lvl' => 1
            ],
            [
                'description' => '
                    Верно ли что `NaN == NaN` и `NaN === NaN`?
                ',
                'answers' => json_encode([
                    [
                        'text' => 'Да'
                    ],
                    [
                        'text' => 'Нет'
                    ]
                ]),
                'correct_answers' => json_encode([1]),
                'answer_info' => '
                    Это единственный случай когда что-то не равно самому себе.
                ',
                'category_id' => 1,
                'lvl' => 1
            ],
            [
                'description' => "
                    Валидный ли код `'Я - Вася'.split` - ``?
                ",
                'answers' => json_encode([
                    [
                        'text' => 'Будет ошибка'
                    ],
                    [
                        'text' => 'Это сработает'
                    ],
                    [
                        'text' => 'Будет предупреждение'
                    ]
                ]),
                'correct_answers' => json_encode([1]),
                'answer_info' => "
                    Это работает благодаря возможностям шаблонных строк в JS, split играет роль ф-ии обрабатывающей строку ` - `, первым аргуметом split получает массив строк которые разбиваются через \${выражение}, но в строке ` - ` не таких конструкций поэтому в первый аргумент попадет массив [' - '], массив приводится к строке и преобразуется к ' - ' с чем уже вполне может работать split.
                ",
                'category_id' => 2,
                'lvl' => 2
            ],
            [
                'description' => "
                    Как можно вернуть знак числа([signum](https://en.wikipedia.org/wiki/Sign_function))? То есть если < 0 то -1, > 0 будет 1, а 0 это 0
                ",
                'answers' => json_encode([
                    [
                        'text' => 'Math.sign(x)'
                    ],
                    [
                        'text' => '(x > 0) - (x < 0)'
                    ],
                    [
                        'text' => 'x && x / Math.abs(x)'
                    ]
                ]),
                'correct_answers' => json_encode([0, 1, 2]),
                'answer_info' => "
                    Все ответы правильные. Самый простой способ - Math.sign(x), был добавлен в ES2015.
                ",
                'category_id' => 3,
                'lvl' => 3
            ],
            [
                'description' => "
                    1 + 1
                ",
                'answers' => json_encode([
                    [
                        'text' => '1'
                    ],
                    [
                        'text' => '2'
                    ],
                    [
                        'text' => '3'
                    ]
                ]),
                'correct_answers' => json_encode([2]),
                'answer_info' => "
                    Бла-бла
                ",
                'category_id' => 4,
                'lvl' => 2
            ]
        ]);
    }
}

