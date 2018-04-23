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
            'text' => '**Дифференциальным уравнением** называется уравнение, связывающее независимую переменную х, искомую функцию y = y (x) и ее производные $y\'... y^{(n)}$, т.е. уравнения вида $F(x,y,y\',y\'\',...,y^{(n)}$)

Дифференциальное уравнение называется **обыкновенным**, если искомая функция y имеет вид y = y(x) (т.е функция одной независимой переменной)

**Порядком** дифференциального уравнения называется порядок наивысшей производной, входящей в уравнение

**Решением** дифференциального уравнения n-го порядка на интервале (a, b) называется функция $y=\gamma(x)$, определенная на (a, b) вместе со своими производными до n-го порядка включительно, и такая что ее подстановка в дифференциальное уравнение, превращает его в тождество по x на (a, b).

График решения дифференциального уравнения называется **интегральной кривой** этого уравнения.

### Формы задания

* Общий вид: $f(x,y,y\')=0$
* Нормальный вид: $y\'=f(x,y)$
* Дифференциальная форма: $M(x,y)dx+N(x,y)dy=0$
* Симметрическая форма: $\frac{dx}{X(x,y)}=\frac{dy}{Y(x,y)}$

### Виды записи решения

* Нормальная форма: $y=\gamma(x)$
* Неявная форма: $F(x,y)=0$
* Параметрическая форма: $\begin{cases}
   x=\beta(t)\\
   y=\alpha(t)
\end{cases}$, $x\in(a,b), t\in(\omega,\eta), a=\beta(\omega), b=\alpha(\eta)$
',
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
            'text' => 'Задачей Коши называют задачу нахождения решения решения $y=y(x)$ уравнения $y\'=f(x,y)$, удовлетворяющего начальному условию $y(x_0)=y_0$

Геометрически: ищем интегральную кривую, проходящую через заданную точку $M_0$ плоскости $xOy$ 

**Теорема существования и единственности решения задачи Коши.** Пусть дано дифференциальное уравнение $y\'=f(x,y)$, где функция f(x,y) определена в некоторой области D плоскости $xOy$, содержащей точку $(x_0,y_0)$. Если функция f(x,y) удовлетворяет условиям
* $f(x,y)$ есть непрерывная функция двух переменных x и y в области D
* $f(x,y)$ имеет частную производную $\frac{\partial{f}}{\partial{y}}$, ограниченную в области D

то найдется интервал $(x_0-h,x_0+h)$, на котором существует единственное решение $y=\gamma(x)$ данного уравнения, удовлетворяющее условию $y(x_0)=y_0$
',
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
