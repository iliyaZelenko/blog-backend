<?php

return [
    'scope' => 1,
    'tree' => [
        [
            'name' => 'JS',
            'description' => 'Мультипарадигменный язык программирования. Поддерживает объектно-ориентированный, императивный и функциональный стили. Является реализацией языка ECMAScript. ',
            '_children' => [
                [
                    'name' => 'Frameworks',
                    'description' => 'JS frameworks',
                    '_children' => [
                        [
                            'name' => 'Vue',
                            'description' => '',
                            '_children' => [
                                [
                                    'name' => 'Packages',
                                    'description' => 'Пакеты',
                                    '_children' => [
                                        [
                                            'name' => 'Vuex',
                                            'description' => 'Паттерн управления состоянием',
                                        ],
                                        [
                                            'name' => 'Vuetify',
                                            'description' => 'Material Component Framework'
                                        ],
                                        [
                                            'name' => 'Vue Router',
                                            'description' => 'Official router for Vue.js'
                                        ],
                                    ]
                                ],
                            ]
                        ],
                        [
                            'name' => 'React',
                            'description' => ''
                        ],
                        [
                            'name' => 'Node.js',
                            'description' => ''
                        ],
                        [
                            'name' => 'AngularJS',
                            'description' => ''
                        ]
                    ]
                ],
                [
                    'name' => 'Packages',
                    'description' => '',
                    '_children' => [
                        [
                            'name' => 'Lodash',
                            'description' => ''
                        ]
                    ]
                ],
                [
                    'name' => 'Browser API',
                    'description' => 'DOM и его API'
                ],
                [
                    'name' => 'TypeScript',
                    'description' => 'TypeScript от Microsoft'
                ],
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
                        [
                            'name' => 'Chai',
                            'description' => 'Chai is the most popular assertion library.'
                        ],
                        [
                            'name' => 'Mocha',
                            'description' => 'Simple, flexible, fun javascript test framework for node.js & the browser.'
                        ],
                        [
                            'name' => 'Nightwatch',
                            'description' => 'Nightwatch has its own implementation of the selenium WebDriver. And provides its own testing framework with a test server, assertions, and tools.'
                        ],
                        [
                            'name' => 'Cypress',
                            'description' => 'Fast, easy and reliable testing for anything that runs in a browser.'
                        ]
                    ]
                ],
            ]
        ],
        [
            'name' => 'PHP',
            'description' => 'Скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов',
            '_children' => [
                [
                    'name' => 'Frameworks',
                    'description' => 'PHP frameworks',
                    '_children' => [
                        [
                            'name' => 'Laravel',
                            'description' => '',
                            '_children' => [
                                [
                                    'name' => 'Eloquent',
                                    'description' => ''
                                ],
                                [
                                    'name' => 'Трюки',
                                    'description' => ''
                                ],
                                [
                                    'name' => 'helpers',
                                    'description' => ''
                                ]
                            ]
                        ],
                        [
                            'name' => 'Symfony',
                            'description' => ''
                        ]
                    ]
                ],
                [
                    'name' => 'Packages',
                    'description' => '',
//                    '_children' => [
//                        [
//                            'name' => 'Vuetify',
//                            'description' => ''
//                        ]
//                    ]
                ],
            ]
        ],
        [
            'name' => 'Инструменты',
            'description' => 'Инструменты для разработки веб-приложений',
            '_children' => [
                [
                    'name' => 'Webpack',
                    'description' => ''
                ],
                [
                    'name' => 'Git',
                    'description' => ''
                ],
                [
                    'name' => 'Docker',
                    'description' => ''
                ],
                [
                    'name' => 'Bash',
                    'description' => 'Console'
                ],
                [
                    'name' => 'PhpStorm',
                    'description' => ''
                ]
            ]
        ]
    ]
];
