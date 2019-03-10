<?php

//dump(config_path('data.keepInMind'));
//dump(is_file(config_path('data/keepInMind/records.php')));
//dump(require config_path('data/keepInMind/records.php'));
//function getPostsRecords($path) {
//    $categories = require config_path('data/keepInMind/records.php');
//    $pathImplode = explode('.', $path);
//    $result = $categories;
//
//    foreach ($pathImplode as $part)
//        $result = &$result[$part];
//
//    return $result['items'];
//}
function getPostsRecords($path) {
    $categories = require config_path('data/posts/records.php');
    $pathImplode = explode('.', $path);
    $result = $categories;

    foreach ($pathImplode as $part)
        $result = &$result[$part];

    return $result['items'];
}

return [
//    'scope' => 2,
    'tree' => [
        [
            'name' => 'Программирование',
            'description' => 'Разработка ПО через языки программирования.',
            '_children' => [
            [
                'name' => 'Общая теория',
                'description' => 'Скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов',
                '_children' => [
                    [
                        'name' => 'Парадигмы программирования',
                        'description' => 'совокупность идей и понятий, определяющих стиль написания компьютерных программ (подход к программированию). Это способ концептуализации, определяющий организацию вычислений и структурирование работы, выполняемой компьютером.',
                        '_posts' => getPostsRecords('Общая теория.Парадигмы программирования'),
                        '_children' => [
                            [
                                'name' => 'Объектно-ориентированное программирование',
                                'description' => 'Методология программирования, основанная на представлении программы в виде совокупности объектов, каждый из которых является экземпляром определённого класса, а классы образуют иерархию наследования',
                                '_posts' => getPostsRecords('Общая теория.Парадигмы программирования.Объектно-ориентированное программирование'),
                                '_children' => [
                                    [
                                        'name' => 'Прототипное программирование',
                                        'description' => 'Стиль объектно-ориентированного программирования, при котором отсутствует понятие класса, а наследование производится путём клонирования существующего экземпляра объекта — прототипа.',
                                    ],
                                    [
                                        'name' => 'Класс-ориентированное программирование',
                                        'description' => 'программирование, сфокусированное на данных, причём данные и поведение неразрывно связаны между собой. Вместе данные и поведение представляют собой класс. Соответственно в языках, основанных на понятии «класс», все объекты разделены на два основных типа — классы и экземпляры.',
                                        '_posts' => getPostsRecords('Общая теория.Парадигмы программирования.Объектно-ориентированное программирование.Класс-ориентированное программирование'),
                                    ],
                                ]
                            ]
                        ]
                    ]
                ],
            ],
            [
                'name' => 'JS',
                'description' => 'Мультипарадигменный язык программирования. Поддерживает объектно-ориентированный, императивный и функциональный стили. Является реализацией языка ECMAScript. ',
                '_posts' => getPostsRecords('JS'),
                '_children' => [
    //                [
    //                    'name' => 'Frameworks',
    //                    'description' => 'JS frameworks',
    //                    '_children' => [
    //                        [
    //                            'name' => 'Vue',
    //                            'description' => '',
    //                            '_children' => [
    //                                [
    //                                    'name' => 'Packages',
    //                                    'description' => 'Пакеты',
    //                                    '_children' => [
    //                                        [
    //                                            'name' => 'Vuex',
    //                                            'description' => 'Паттерн управления состоянием',
    //                                        ],
    //                                        [
    //                                            'name' => 'Vuetify',
    //                                            'description' => 'Material Component Framework'
    //                                        ],
    //                                        [
    //                                            'name' => 'Vue Router',
    //                                            'description' => 'Official router for Vue.js'
    //                                        ],
    //                                    ]
    //                                ],
    //                            ]
    //                        ],
    //                        [
    //                            'name' => 'React',
    //                            'description' => ''
    //                        ],
    //                        [
    //                            'name' => 'Node.js',
    //                            'description' => ''
    //                        ],
    //                        [
    //                            'name' => 'AngularJS',
    //                            'description' => ''
    //                        ]
    //                    ]
    //                ],
    //                [
    //                    'name' => 'Packages',
    //                    'description' => '',
    //                    '_children' => [
    //                        [
    //                            'name' => 'Lodash',
    //                            'description' => ''
    //                        ]
    //                    ]
    //                ],
    //                [
    //                    'name' => 'Browser API',
    //                    'description' => 'DOM и его API'
    //                ],
    //                [
    //                    'name' => 'TypeScript',
    //                    'description' => 'TypeScript от Microsoft'
    //                ],
                    [
                        'name' => 'Трюки',
                        'description' => 'Tricks'
                    ],
                    [
                        'name' => 'Сложные моменты',
                        'description' => 'Самое тяжелое в JS'
                    ],
                    [
                        'name' => 'Тестирование',
                        'description' => '',
                        '_children' => [
                            [
                                'name' => 'Jest',
                                'description' => 'Testing framework by Facebook.'
                            ],
                            [
                                'name' => 'Karma',
                                'description' => 'Karma lets you run tests in browser and browser like environments including jsdom.'
                            ],
    //                        [
    //                            'name' => 'Chai',
    //                            'description' => 'Chai is the most popular assertion library.'
    //                        ],
    //                        [
    //                            'name' => 'Mocha',
    //                            'description' => 'Simple, flexible, fun javascript test framework for node.js & the browser.'
    //                        ],
    //                        [
    //                            'name' => 'Nightwatch',
    //                            'description' => 'Nightwatch has its own implementation of the selenium WebDriver. And provides its own testing framework with a test server, assertions, and tools.'
    //                        ],
    //                        [
    //                            'name' => 'Cypress',
    //                            'description' => 'Fast, easy and reliable testing for anything that runs in a browser.'
    //                        ]
                        ]
                    ],
                    [
                        'name' => 'Разное',
                        'description' => 'Всякая всячина',
                        '_posts' => getPostsRecords('JS.Разное')
                    ],
                ]
            ],
            [
                'name' => 'PHP',
                'description' => 'Скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов',
                '_children' => [
                    [
                        'name' => 'ООП',
                        'description' => 'Объектно-ориентированное программирование',
                        '_posts' => getPostsRecords('PHP.ООП'),
                    ],
                ]
    //                [
    //                    'name' => 'Frameworks',
    //                    'description' => 'Frameworks',
    //                    '_children' => [
    //                        [
    //                            'name' => 'Laravel',
    //                            'description' => '',
    //                            '_children' => [
    //                                [
    //                                    'name' => 'Eloquent',
    //                                    'description' => ''
    //                                ],
    //                                [
    //                                    'name' => 'Трюки',
    //                                    'description' => ''
    //                                ],
    //                                [
    //                                    'name' => 'helpers',
    //                                    'description' => ''
    //                                ]
    //                            ]
    //                        ],
    //                        [
    //                            'name' => 'Symfony',
    //                            'description' => ''
    //                        ]
    //                    ]
    //                ],
    //                [
    //                    'name' => 'Packages',
    //                    'description' => 'Composer packages',
    //                ],
    //            ]
    //        ],
    //        [
    //            'name' => 'Инструменты',
    //            'description' => 'Инструменты для разработки веб-приложений',
    //            '_children' => [
    //                [
    //                    'name' => 'Webpack',
    //                    'description' => ''
    //                ],
    //                [
    //                    'name' => 'Git',
    //                    'description' => ''
    //                ],
    //                [
    //                    'name' => 'Docker',
    //                    'description' => ''
    //                ],
    //                [
    //                    'name' => 'Bash',
    //                    'description' => 'Console'
    //                ],
    //                [
    //                    'name' => 'PhpStorm',
    //                    'description' => ''
    //                ]
    //            ]
                ]
            ]
        ]
    ]
];
