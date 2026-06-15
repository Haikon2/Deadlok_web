@extends('deadlock.layout')

@section('extra-styles')
<style>
    .info-page {
        margin-top: 70px;
        background-color: #1a1a1a;
        color: #ffffff;
        min-height: 100vh;
    }

    .category-nav {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 30px 20px;
        background-color: rgba(0, 0, 0, 0.7);
        position: sticky;
        top: 70px;
        z-index: 500;
        flex-wrap: wrap;
    }

    .category-btn {
        color: #ffffff;
        text-decoration: none;
        padding: 12px 24px;
        background-color: #444444;
        border: 2px solid #ff6600;
        border-radius: 4px;
        transition: all 0.3s;
        cursor: pointer;
        font-weight: 600;
        font-size: 16px;
    }

    .category-btn:hover {
        background-color: #ff6600;
        transform: translateY(-2px);
    }

    .category-btn.active {
        background-color: #ff6600;
        box-shadow: 0 0 15px rgba(255, 102, 0, 0.5);
    }

    .content-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .content-section h2 {
        font-size: 2.5rem;
        color: #ff6600;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 0 0 10px rgba(255, 102, 0, 0.3);
    }

    .content-section h3 {
        font-size: 1.5rem;
        color: #ff6600;
        margin-top: 25px;
        margin-bottom: 15px;
    }

    .content-section p {
        font-size: 1rem;
        line-height: 1.8;
        color: #e0e0e0;
        margin-bottom: 20px;
        text-align: justify;
    }

    .content-section ul {
        margin-left: 40px;
        margin-bottom: 20px;
    }

    .content-section li {
        font-size: 1rem;
        line-height: 1.8;
        color: #e0e0e0;
        margin-bottom: 10px;
    }

    .section-image {
        width: 100%;
        max-width: 800px;
        height: auto;
        margin: 20px auto;
        display: block;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(255, 102, 0, 0.3);
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 8px;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .view-content {
        margin-top: 30px;
    }

    .predmety-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
        justify-content: center;
    }

    .tab-btn {
        padding: 10px 18px;
        border: 2px solid #ff6600;
        background-color: #444444;
        color: #ffffff;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
        text-decoration: none;
    }

    .tab-btn.active,
    .tab-btn:hover {
        background-color: #ff6600;
        color: #1a1a1a;
    }

    .predmety-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .price-section {
        margin-bottom: 40px;
    }

    .price-label {
        font-size: 1.2rem;
        color: #ff6600;
        margin-bottom: 15px;
        font-weight: 700;
        text-shadow: 0 0 5px rgba(255, 102, 0, 0.3);
        padding-left: 10px;
        border-left: 3px solid #ff6600;
    }

    .predmety-card {
        background-color: #252525;
        border: 1px solid #333333;
        border-radius: 12px;
        overflow: hidden;
        color: #ffffff;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .predmety-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
        border-color: #ff6600;
    }

    .predmety-card-img {
        width: 100%;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(255,102,0,0.15), rgba(255,102,0,0.05));
        border-bottom: 1px solid rgba(255,255,255,0.08);
        overflow: hidden;
    }

    .predmety-card-image {
        width: auto;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .predmety-card-icon {
        font-size: 2.5rem;
        color: #ff6600;
    }

    .predmety-card-body {
        padding: 10px;
    }

    .predmety-card-title {
        font-size: 0.85rem;
        margin-bottom: 8px;
        font-weight: 600;
        line-height: 1.2;
        min-height: 30px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .predmety-card-price {
        color: #ff6600;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .predmety-description {
        max-width: 1200px;
        margin: 0 auto 20px;
        padding: 18px 20px;
        background-color: rgba(255, 102, 0, 0.08);
        border: 1px solid rgba(255, 102, 0, 0.15);
        border-radius: 10px;
        color: #f5f5f5;
        font-size: 1rem;
        line-height: 1.7;
    }

    .hidden {
        display: none;
    }

    @media (max-width: 768px) {
        .info-page {
            margin-top: 60px;
        }


        .content-section h2 {
            font-size: 1.8rem;
        }

        .content-section h3 {
            font-size: 1.3rem;
        }

        .category-nav {
            flex-direction: column;
            gap: 10px;
            padding: 15px;
            top: 60px;
        }

        .category-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<div class="info-page">
    <nav class="category-nav">
        @foreach ($categories as $category)
            <a href="{{ route('deadlock.info', ['category' => $category]) }}" 
               class="category-btn @if($currentCategory === $category) active @endif">
                {{ ucfirst($category) }}
            </a>
        @endforeach
    </nav>

    @if ($currentCategory === 'heroes')
    <section class="content-section">
        <h2>Герои</h2>
        <img src="{{ asset('images/heroes.jpg') }}" alt="Герои" class="section-image">
        <div class="video-wrapper">
            <iframe
                src="https://www.youtube.com/embed/3Dq5iYw0TWQ"
                title="Deadlock Heroes"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
        <p>
            Deadlock предлагает разнообразный набор героев с уникальными способностями и стилями игры.
            Каждый герой имеет свою роль в команде - от мощных атакующих до защитников и поддержки.
        </p>
    </section>

    @elseif ($currentCategory === 'lore')
    <section class="content-section">
        <h2>Лор</h2>
        <img src="{{ asset('images/lore.jpg') }}" alt="Лор" class="section-image">
        <p>
            История мира Deadlock разворачивается в альтернативной реальности 1949 года, где магия и сверхъестественные силы всегда существовали бок о бок с человечеством, хотя осознавали это лишь немногие.
            <br><br>
            До конца XIX века магия считалась лишь фольклором и суевериями, но произошедшие события в мире игры навсегда изменили восприятие реальности для всего человечества.
        </p>
        <h3>Начало, первый Maelstrom</h3>
        <p>
            В прошлом магия была доступна лишь избранным. Всё изменилось в 1899 году, когда солнечное затмение вызвало первый Maelstrom — феномен, открывший человечеству существование магии и потусторонних существ.
            <br><br>
            Теперь Maelstrom происходят каждые 50 лет, представляя собой небесное событие, при котором магическая энергия становится значительно сильнее.
        </p>
        <h3>Исторический контекст</h3>
        <p>
            В мире Deadlock магия и мистические силы изменили геополитику. Пуэрто-Рико был аннексирован США из-за наличия астральных врат, а Южная Иксия стала новым штатом. Это породило уникальный контекст, в котором магия и технологии переплелись.
        </p>
    </section>

    @elseif ($currentCategory === 'gameplay')
    <section class="content-section">
        <h2>Геймплей</h2>
        <img src="{{ asset('images/gameplay.jpg') }}" alt="Геймплей" class="section-image">
        <img src="{{ asset('images/map.jpg') }}" alt="Deadlock карта" class="section-image">
        <p>
            Deadlock — это командный боевой экшен-шутер с мобой-элементами. Игроки выбирают героя из доступного набора и сражаются в команде против противников.
            <br><br>
            Каждый герой имеет уникальные способности и стиль игры. Цель игры — уничтожить вражескую базу, используя стратегию, командную работу и мастерство в боях.
        </p>
        <h3>Основные механики</h3>
        <ul>
            <li>Командные бои 5v5</li>
            <li>Система уровней и прокачки</li>
            <li>Экономика золота</li>
            <li>Деструктивное окружение</li>
            <li>Уникальные способности героев</li>
        </ul>
        <p>
            В Deadlock система предметов играет ключевую роль в развитии персонажа. Предметы дают различные бонусы к характеристикам и уникальные способности.
            <br><br>
            Каждый герой может собирать предметы, которые увеличивают его боевую мощь. Правильный выбор предметов может определить исход боя и победу команды.
        </p>
        <h3>Типы предметов</h3>
        <ul>
            <li><strong>Атака:</strong> Увеличивают урон и скорость атаки</li>
            <li><strong>Защита:</strong> Увеличивают броню и здоровье</li>
            <li><strong>Магия:</strong> Увеличивают магический урон и сопротивление магии</li>
            <li><strong>Утилита:</strong> Дают специальные эффекты и способности</li>
            <li><strong>Движение:</strong> Увеличивают скорость передвижения</li>
        </ul>
        <h3>Система предметов</h3>
        <p>
            В Deadlock предметы не прокачиваются через прямое накопление золота. Вместо этого игроки собирают готовые модули и наборы,
            которые сразу дают определённые эффекты и стратегии в бою.
            Это делает выбор предметов важной частью подготовки и позволяет комбинировать сеть выживаемости,
            огневой мощи и спиритических сил.
        </p>
        <p>
            Вы можете посмотреть подробную информацию о предметах во вкладке <strong>Items</strong>.
        </p>
    </section>

    @elseif ($currentCategory === 'items')
    <section class="content-section">
        <h2>Предметы</h2>
        <div class="view-content">
            <div id="predmety-tabs-nav">
                <div class="predmety-tabs">
                    <a class="tab-btn active" data-category="oruzhie">Оружие</a>
                    <a class="tab-btn" data-category="vitality">Выживаемость</a>
                    <a class="tab-btn" data-category="spirit">Спиритизм</a>
                </div>
            </div>

            <div class="predmety-description" id="predmety-description">
                Выберите категорию предметов, чтобы посмотреть доступные модули Deadlock и их особенности.
            </div>

            <div id="predmety-container">
                <!-- Items will be loaded here via JavaScript -->
            </div>
        </div>
    </section>
    @endif
</div>
@endsection

@section('extra-scripts')
<script>
    const categoryDescriptions = {
        oruzhie: 'Оружейные предметы в Deadlock повышают силу атаки и эффективность в бою, делая героя более опасным на поле.',
        vitality: 'Выживаемость в Deadlock повышает здоровье, броню и регенерацию, помогая герою дольше оставаться в бою.',
        spirit: 'Спиритические предметы усиливают магические способности, ускоряют восстановление и добавляют нестандартные эффекты в сражениях.'
    };

    async function loadItems(category = 'oruzhie') {
        try {
            const response = await fetch(`/api/items?category=${category}`);
            const data = await response.json();
            
            const container = document.getElementById('predmety-container');
            container.innerHTML = '';

            // Group items by price
            data.forEach(priceGroup => {
                const priceSection = document.createElement('div');
                priceSection.className = 'price-section';
                
                const priceLabel = document.createElement('h3');
                priceLabel.className = 'price-label';
                const symbol = priceGroup.price >= 9999 ? '¢' : '¢';
                priceLabel.textContent = symbol + priceGroup.price;
                priceSection.appendChild(priceLabel);
                
                const grid = document.createElement('div');
                grid.className = 'predmety-grid';
                
                priceGroup.items.forEach(item => {
                    const card = document.createElement('div');
                    card.className = 'predmety-card';
                    card.innerHTML = `
                        <div class="predmety-card-img">
                            <img class="predmety-card-image" src="${item.image}" alt="${item.name}" onerror="this.onerror=null;this.src='https://game.deadlock.coach/vpk/panorama/images/shop/catalog/catalog_shop_tab_icon_weapon.webp'" />
                        </div>
                        <div class="predmety-card-body">
                            <div class="predmety-card-title">${item.name}</div>
                            <div class="predmety-card-price">¢${item.price}</div>
                        </div>
                    `;
                    grid.appendChild(card);
                });
                
                priceSection.appendChild(grid);
                container.appendChild(priceSection);
            });
        } catch (error) {
            console.error('Error loading items:', error);
            document.getElementById('predmety-container').innerHTML = '<p>Ошибка при загрузке предметов</p>';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.predmety-tabs .tab-btn');
        
        // Load initial items
        loadItems('oruzhie');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const category = this.dataset.category;
                const description = categoryDescriptions[category] || '';
                
                document.getElementById('predmety-description').textContent = description;
                loadItems(category);
            });
        });
    });
</script>
@endsection

<!-- Original problematic section to replace above -->
