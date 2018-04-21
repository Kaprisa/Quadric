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
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => $faker->text(5000),
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

        $lesson = Lesson::Create([
            'block_id' => $blocks[0]->id,
            'active' => true,
            'name' => 'Задача Коши',
            'resources' => json_encode(['http:://hello.ru']),
            'sort' => 1,
            'text' => $faker->text(5000),
            'video' => 'defs.mp4'
        ]);

        $answers = [
            [
                'text' => 'f(x, y) непрерывна в области D',
                'correct' => true
            ],
            [
                'text' => 'f(x, y) ограничена в области D',
                'correct' => false
            ],
            [
                'text' => 'f(x, y) монотонно возрастает в области D',
                'correct' => false
            ],
            [
                'text' => 'f(x, y) имеет частную производную по y, ограниченную в области D',
                'correct' => true
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Выберите условия теоремы существования и единственности решения задачи Коши для функции f(x,y), определенной в оюласти D',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 1,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);

        $answers = [
            [
                'text' => '0',
                'correct' => false
            ],
            [
                'text' => '1',
                'correct' => true
            ],
            [
                'text' => 'Число, равное степени f(x,y)',
                'correct' => false
            ],
            [
                'text' => 'Число, равное порядку уравнения',
                'correct' => false
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Сколько решений может иметь задача Коши если функция f(x,y) непрерывна и удовлетворяет условию Липшица?',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 2,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);

        $answers = [
            [
                'text' => 'Нахождение наименьшего радиусаокружности с центром в точке (x0, y0) и касающейся одной из интегральных кривых',
                'correct' => false
            ],
            [
                'text' => 'Нахождение изоклины, проходящей через заданную точку (x0, y0)',
                'correct' => false
            ],
            [
                'text' => 'Нахождение интегральной кривой, проходящей через заданную точку (x0, y0)',
                'correct' => true
            ]
        ];
        $lesson->questions()->create([
            'text' => 'Какая геометрическая интерпретация задачи Коши?',
            'type' => 'test',
            'answer' => json_encode($answers),
            'points' => 5,
            'sort' => 3,
            'active' => true,
            'lesson_id' => $lesson->id
        ]);
    }
}
