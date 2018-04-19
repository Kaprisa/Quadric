<?php

use App\Block;
use App\Category;
use App\Course;
use App\Lesson;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = ['Математика', 'Программирование', 'Экономика'];
        foreach ($categories as $c) {
            Category::create([
                'name' => $c
            ]);
        }
        $course = Course::Create([
            'name' => 'Дифференциальные уравнения',
            'description' => 'Очень важный курс для настоящих героев!',
            'image' => 'diff_eq.jpeg',
            'category_id' => 1,
            'active' => true,
            'user_id' => 1
        ]);

        $names = ['Уравнения первого порядка'];
        $blocks = [];

        foreach ($names as $k => $n) {
            $blocks[] = Block::Create([
                'course_id' => $course->id,
                'name' => $n,
                'active' => true,
                'sort' => $k
            ]);
        }

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Основные понятия и определения',
            'resourses' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text1' => $faker->text(5000),
            'text2' => $faker->text(1000),
            'video' => 'defs.mp4'
        ]);

        $answers = [
            [
                'text' => 'Соотношение, связывающее независимую переменную, неизвестную функцию и все ее производные до n-го порядка включительно.',
                'correct' => true
            ],
            [
                'text' => 'Соотношение, связывающее неизвестную переменную, независимую переменную и все ее производные до n-го порядка включительно.',
                'correct' => false
            ],
            [
                'text' => 'Дифференциальное уравнеие n-ой степени.',
                'correct' => false
            ],
            [
                'text' => 'Уравнение, содержащее n независимых переменных.',
                'correct' => false
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Что называется обыкновенным дифференциальным уравнением n –го порядка?',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 1,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);

        $answers = [
            [
                'text' => 'Дифференцирование',
                'correct' => false
            ],
            [
                'text' => 'Интегрирование',
                'correct' => true
            ],
            [
                'text' => 'Построение',
                'correct' => false
            ],
            [
                'text' => 'Отождествление',
                'correct' => false
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Как называется процесс решения дифференциального уравнения?',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 2,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);

        $answers = [
            [
                'text' => 'Колличество производных, входящих в уравнение',
                'correct' => false
            ],
            [
                'text' => 'Колличество независимых переменных, входящих в уравнение',
                'correct' => false
            ],
            [
                'text' => 'Наивысшая степень производной, входящей в уравнение',
                'correct' => false
            ],
            [
                'text' => 'Наивысший порядок производной, входящей в уравнение',
                'correct' => true
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Что называется порядком дифференциального уравнения?',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 3,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);


//        foreach ($categories as $c) {
//            $in_c = Category::create([
//                'name' => $c
//            ]);
//            for ($i = 0 ; $i < 5 ; $i ++) {
//                $course = Course::Create([
//                    'name' => $faker->name,
//                    'description' => $faker->text,
//                    'image' => $faker->imageUrl(640, 480, 'cats'),
//                    'category_id' => $in_c->id,
//                    'active' => true,
//                    'user_id' => 1
//                ]);
//                for ($k = 0 ; $k < 5 ; $k ++) {
//                    $block = Block::Create([
//                        'course_id' => $course->id,
//                        'name' => $faker->name,
//                        'active' => true,
//                        'sort' => $k
//                    ]);
//                    for ($j = 0 ; $j < 5 ; $j ++) {
//                        $lesson = Lesson::Create([
//                            'block_id' => $block->id,
//                            'active' => true,
//                            'name' => $faker->name,
//                            'resourses' => json_encode(['http:://hello.ru']),
//                            'sort' => $j,
//                            'text1' => $faker->text(5000),
//                            'text2' => $faker->text(1000),
//                            'video' => 'https://youtu.be/taicWTD3cEA'
//                        ]);
//
//                        for ($h = 0 ; $h < 10 ; $h ++) {
//                            $answers = [];
//                            for ($o = 0 ; $o < $faker->numberBetween(3, 7); $o ++) {
//                                $answers[] = [
//                                    'text' => $faker->text(70),
//                                    'correct' => $faker->boolean
//                                ];
//                            }
//                            $lesson->questions()->create([
//                                'text' => $faker->text,
//                                'type' => 'test',
//                                'answer' => json_encode($answers),
//                                'points' => $faker->numberBetween(0, 5),
//                                'sort' => $h,
//                                'active' => true,
//                                'lesson_id' => $lesson->id
//                            ]);
//                        }
//                    }
//                }
//
//            }
//        }
    }
}
