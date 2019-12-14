<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainControlelr extends AbstractController
{
    /**
     * @Route(path="/", methods={"GET"})
    **/

    public function index():Response
    {
        return $this->render('landing/index.php.twig', ['package' => $this->getPack(), 'dt' => date('Y')]);
    }

    /**
     * @Route(path="/", methods={"POST"}, name="formHandler")
     * @param Request $request
     * @return Response
     */
    public function formAction(Request $request):Response
    {
        $ret = $request->request->all();
        return $this->json($this->sendEmail($ret));
    }

    private function sendEmail($data)
    {
        if (isset($data['name'])) {
            if (!empty($data['name'])){
                $name = strip_tags($data['name']);
            }
        }
        if (isset($data['email'])) {
            if (!empty($data['email'])){
                $email = strip_tags($data['email']);
            }
        }
        if (isset($data['phone'])) {
            if (!empty($data['phone'])){
                $phone = strip_tags($data['phone']);
            }
        }
        if (isset($data['question'])) {
            if (!empty($data['question'])){
                $question = strip_tags($data['question']);
            }
        }

        $to = "info@digitalbazaar.ru";

//        $to = 'horodishtyanu@gmail.com';
        $sendfrom = "noreply@digitalbazaar.ru";
        $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
        $headers .= "Content-Transfer-Encoding: 8bit \r\n";
        $subject = "Форма обратной связи с сайта.";
        $message = "<b>Имя:</b> $name <br>
                      <b>Email:</b> $email <br>
                      <b>Телефон:</b> $phone <br>
                      <b>Тема обращения:</b> $question";

        $send = mail($to, $subject, $message, $headers, '-fnoreply@digitalbazaar.ru');
        return $send;
    }


    private function getPack(){
        $packages = array(
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_games.svg',
                'PACKAGE_TITLE'     => 'Игры',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Игры для PC</li>
                <li>Игры для консолей/приставок</li>
                <li>Мобильные игры</li>
                <li>Игровая валюта и подписки</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_soft.svg',
                'PACKAGE_TITLE'     => 'Программное<br/>обеспечение',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Операционные системы</li>
                <li>Офисные приложения</li>
                <li>Антивирусы</li>
                <li>Видеоредакторы</li>
                <li>Словари и переводчики</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_media.svg',
                'PACKAGE_TITLE'     => 'Мультимедиа',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Онлайн кинотеатры</li>
                <li>Онлайн музыка</li>
                <li>Электронные книги</li>
                <li>Аудиокниги</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_education.svg',
                'PACKAGE_TITLE'     => 'Обучение',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Изучение иностранных языков</li>
                <li>Обучение вождению</li> 
                <li>Спортивные курсы</li> 
                <li>Курсы университетов</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_gift_cards.svg',
                'PACKAGE_TITLE'     => 'Подарочные<br/>карты',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Магазины бытовой техники</li>
                <li>Доставки продуктов питания из магазинов</li>
                <li>Салоны красоты</li>
                <li>Путешествия</li>
                <li>Рестораны и кафе</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_service.svg',
                'PACKAGE_TITLE'     => 'Сервисы',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Персональная ИТ служба</li>
                <li>Доставка продуктов с рецептами</li>
                <li>Службы Такси</li>
                <li>Каршеринг</li> 
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_insurance.svg',
                'PACKAGE_TITLE'     => 'Страховки',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>Страхование экрана мобильного устройства</li>
                <li>Защита покупки</li>
                <li>Страхование для путешественников</li>
                <li>Страхование имущества и здоровья</li>
                <li>Мигрантский ДМС</li>
            </ul>
        ',
            ),
            array(
                'PACKAGE_IMAGE'     => 'landing/build/img/package_health.svg',
                'PACKAGE_TITLE'     => 'Здоровье',
                'PACKAGE_TEXT'      => '
            <ul>
                <li>
                Телемедицина:
                <ul> 
                    <li>Терапевт</li>
                    <li>Педиатр</li>
                    <li>Диетолог</li>
                    <li>Косметолог</li>
                </ul>
                </li>
            </ul>
        ',
            ),
        );
        return $packages;
    }
}