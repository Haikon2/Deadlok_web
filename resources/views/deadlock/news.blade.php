@extends('deadlock.layout')

@section('extra-styles')
<style>
    .news-container {
        min-height: 100vh;
        margin-top: 70px;
        padding: 40px 20px;
        background-color: #1a1a1a;
        color: #ffffff;
    }

    .news-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .news-header h1 {
        font-size: 3rem;
        color: #ff6600;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        margin-bottom: 10px;
    }

    .news-header p {
        font-size: 1.2rem;
        color: #cccccc;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .news-card {
        background-color: #2a2a2a;
        border: 2px solid #ff6600;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(255, 102, 0, 0.3);
    }

    .news-card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #ff6600 0%, #ff8c00 100%);
        font-size: 1.2rem;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.3);
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .news-card-body {
        padding: 25px;
    }

    .news-card h3 {
        color: #ff6600;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .news-date {
        color: #ff6600;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    .news-card p {
        color: #cccccc;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .news-card .read-more {
        color: #ff6600;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .news-card .read-more:hover {
        color: #e55a00;
    }

    @media (max-width: 768px) {
        .news-container {
            padding: 20px 15px;
            margin-top: 60px;
        }

        .news-header h1 {
            font-size: 2rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="news-container">
    <div class="news-header">
        <h1>Новости</h1>
        <p>Последние обновления и информация об игре</p>
    </div>

    <div class="news-grid">
        <div class="news-card">
            <div class="news-card-image">Обновление 04.06.26</div>
            <div class="news-card-body">
                <h3>Обновление (патч) в Deadlock от 04.06.26</h3>
                <div class="news-date">чт, 04-06-2026 - 21:34</div>
                <p>Valve изменили механику Урны в Deadlock. Разбираем новый режим захвата «Царь горы», обновленные награды, радиус точки и бонусы для команд.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Баланс героев</div>
            <div class="news-card-body">
                <h3>Обновление (патч) в Deadlock от 31.05.26</h3>
                <div class="news-date">Вск, 31-05-2026 - 23:55</div>
                <p>Apollo усилен (скорострельность +30%, лечение, урон Itani Lo Sahn ↑), Graves ослаблен (урон Jar of Dead и гулей), McGinnis дальность ↓, изменения Pocket, Silver, Victor, Yamato.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Обновление Урны 28.05</div>
            <div class="news-card-body">
                <h3>Обновление (патч) в Deadlock от 28.05.26</h3>
                <div class="news-date">чт, 28-05-2026 - 21:22</div>
                <p>Йоши услышал: Урну в Deadlock снова изменили. Продолжающиеся балансные коррективы в режиме захвата.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Механика Урны</div>
            <div class="news-card-body">
                <h3>Обновление (патч) в Deadlock от 26.05.26 - новые изменения Урны</h3>
                <div class="news-date">вт, 26-05-2026 - 09:09</div>
                <p>Valve выпустили дополнение к последнему обновлению в Deadlock, продолжая вносить изменения в механику урны.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Большое обновление</div>
            <div class="news-card-body">
                <h3>Обновление Deadlock от 22 мая 2026: все изменения</h3>
                <div class="news-date">сб, 23-05-2026 - 01:55</div>
                <p>Обновление Deadlock от 22 мая 2026: все изменения героев, предметов, Soul Urn, карты, NPC, HP, сопротивлений, Grit и режима Street Brawl.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Балансный патч</div>
            <div class="news-card-body">
                <h3>В Deadlock готовят новый патч: Yoshi сообщил о балансном обновлении</h3>
                <div class="news-date">ср, 20-05-2026 - 11:44</div>
                <p>Valve готовит очередной балансный патч для Deadlock. Разработчик Yoshi ответил игрокам про сроки обновления, контентный патч, иконку Diviner's Kevlar и свежие изменения на тестовом сервере.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Новые иконки</div>
            <div class="news-card-body">
                <h3>Минорное обновление Deadlock: новые иконки и исправления</h3>
                <div class="news-date">вт, 12-05-2026 - 10:09</div>
                <p>В Deadlock вышел небольшой патч: Valve обновила иконки Boundless Spirit и Diviner's Kevlar, добавила кнопку Steam-профиля рядом с Friend ID, но у части игроков появилась ошибка FATAL ERROR.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">R1Tourney Победа</div>
            <div class="news-card-body">
                <h3>Lowkey W выиграли R1Tourney Deadlock 01</h3>
                <div class="news-date">Вск, 10-05-2026 - 21:39</div>
                <p>10 мая завершился первый турнир R1Tourney Deadlock 01. Чемпионами стали Lowkey W — в гранд-финале они обыграли Abrahams и забрали главный приз турнира.</p>
                <a href="#" class="read-more">Киберспорт →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Плей-офф</div>
            <div class="news-card-body">
                <h3>Сегодня стартует плей-офф R1 Tourney</h3>
                <div class="news-date">сб, 09-05-2026 - 15:42</div>
                <p>В 15:00 нас ждет предфинальный игровой день турнира. Борьба за место в гранд-финале начинается!</p>
                <a href="#" class="read-more">Киберспорт →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Метаанализ</div>
            <div class="news-card-body">
                <h3>Пики, баны и винрейт героев на R1 Tourney</h3>
                <div class="news-date">чт, 07-05-2026 - 18:07</div>
                <p>Разбираем мету R1 Tourney по Deadlock: самых популярных героев по пикам, частые баны и персонажей с лучшим винрейтом после первых игровых дней.</p>
                <a href="#" class="read-more">Киберспорт →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Начало турнира</div>
            <div class="news-card-body">
                <h3>Старт первого игрового дня R1 Tourney Deadlock</h3>
                <div class="news-date">вт, 05-05-2026 - 13:01</div>
                <p>R1 Tourney Deadlock стартовал уже сегодня. Борьба за призовой фонд турнира начинается. Следите за турниром в реальном времени!</p>
                <a href="#" class="read-more">Киберспорт →</a>
            </div>
        </div>

        <div class="news-card">
            <div class="news-card-image">Trophy Collector</div>
            <div class="news-card-body">
                <h3>Разработчики выпустили патч 02.05.26: изменение Trophy Collector</h3>
                <div class="news-date">сб, 02-05-2026 - 04:23</div>
                <p>В Deadlock вышло небольшое обновление с изменениями Trophy Collector, затем Yoshi временно откатил патч, а позже изменение вернулось обратно.</p>
                <a href="#" class="read-more">Подробнее →</a>
            </div>
        </div>
    </div>
</div>
@endsection
