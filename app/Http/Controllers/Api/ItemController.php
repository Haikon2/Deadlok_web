<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Get all items organized by price tier and grouped
     */
    public function index()
    {
        // Get category filter from query parameter
        $category = request()->query('category', 'oruzhie');

        // Base item image path from shop HTML
        $baseImageUrl = 'https://game.deadlock.coach/vpk/panorama/images/items/';
        $categoryFolders = [
            'oruzhie' => 'weapon/',
            'vitality' => 'vitality/',
            'spirit' => 'spirit/',
        ];

        // All items data organized by price and category
        $itemsByCategory = [
            'oruzhie' => [ // Weapon
                800 => [
                    ['id' => 'close-quarters', 'name' => 'Ближняя дистанция', 'image' => 'close_quarters.webp'],
                    ['id' => 'extended-magazine', 'name' => 'Увеличенный магазин', 'image' => 'basic_magazine.webp'],
                    ['id' => 'headshot-booster', 'name' => 'Усилитель выстрелов в голову', 'image' => 'headshot_booster.webp'],
                    ['id' => 'high-velocity-rounds', 'name' => 'Скоростные патроны', 'image' => 'high_velocity_rounds.webp'],
                    ['id' => 'monster-rounds', 'name' => 'Чудовищные патроны', 'image' => 'monster_rounds.webp'],
                    ['id' => 'rapid-rounds', 'name' => 'Спешная стрельба', 'image' => 'rapid_rounds.webp'],
                    ['id' => 'restorative-shot', 'name' => 'Живительный выстрел', 'image' => 'restorative_shot.webp'],
                ],
                1600 => [
                    ['id' => 'active-reload', 'name' => 'Активная перезарядка', 'image' => 'active_reload.webp'],
                    ['id' => 'fleetfoot', 'name' => 'Проворная поступь', 'image' => 'fleetfoot.webp'],
                    ['id' => 'intensifying-magazine', 'name' => 'Усиливающий магазин', 'image' => 'intensifying_magazine.webp'],
                    ['id' => 'kinetic-dash', 'name' => 'Кинетический рывок', 'image' => 'kinetic_dash.webp'],
                    ['id' => 'long-range', 'name' => 'Дальняя дистанция', 'image' => 'long_range.webp'],
                    ['id' => 'melee-charge', 'name' => 'Удар с зарядом', 'image' => 'melee_charge.webp'],
                    ['id' => 'mystic-shot', 'name' => 'Мистический выстрел', 'image' => 'mystic_shot.webp'],
                    ['id' => 'opening-rounds', 'name' => 'Вскрывающие патроны', 'image' => 'opening_rounds.webp'],
                    ['id' => 'recharging-rush', 'name' => 'Прилив перезарядки', 'image' => 'recharging_rounds.webp'],
                    ['id' => 'slowing-bullets', 'name' => 'Замедляющие пули', 'image' => 'slowing_bullets.webp'],
                    ['id' => 'spirit-shredder-bullets', 'name' => 'Душегубные пули', 'image' => 'spirit_shredder_bullets.webp'],
                    ['id' => 'split-shot', 'name' => 'Веерный выстрел', 'image' => 'split_shot.webp'],
                    ['id' => 'stalker', 'name' => 'Преследователь', 'image' => 'backstabber.webp'],
                    ['id' => 'swift-striker', 'name' => 'Быстрый стрелок', 'image' => 'swift_striker.webp'],
                    ['id' => 'titanic-magazine', 'name' => 'Титанический магазин', 'image' => 'titanic_magazine.webp'],
                    ['id' => 'weakening-headshot', 'name' => 'Ослабляющий выстрел в голову', 'image' => 'weakening_headshot.webp'],
                ],
                3200 => [
                    ['id' => 'alchemical-fire', 'name' => 'Алхимический огонь', 'image' => 'alchemical_fire.webp'],
                    ['id' => 'ballistic-enchantment', 'name' => 'Баллистические чары', 'image' => 'alchemical_seal.webp'],
                    ['id' => 'berserker', 'name' => 'Берсерк', 'image' => 'berserker.webp'],
                    ['id' => 'blood-tribute', 'name' => 'Кровавая дань', 'image' => 'blood_tribute.webp'],
                    ['id' => 'burst-fire', 'name' => 'Шквальный огонь', 'image' => 'burst_fire.webp'],
                    ['id' => 'cultist-sacrifice', 'name' => 'Жертвенный ритуал', 'image' => 'cultist_sacrifice.webp'],
                    ['id' => 'escalating-resilience', 'name' => 'Растущая стойкость', 'image' => 'escalating_resilience.webp'],
                    ['id' => 'express-shot', 'name' => 'Экспресс-выстрел', 'image' => 'express_shot.webp'],
                    ['id' => 'headhunter', 'name' => 'Охотник за головами', 'image' => 'headhunter.webp'],
                    ['id' => 'heroic-aura', 'name' => 'Героическая аура', 'image' => 'heroic_aura.webp'],
                    ['id' => 'hollow-point', 'name' => 'Разрывник', 'image' => 'hollow_point.webp'],
                    ['id' => 'hunters-aura', 'name' => 'Аура охотника', 'image' => 'hunters_aura.webp'],
                    ['id' => 'point-blank', 'name' => 'Стрельба в упор', 'image' => 'point_blank.webp'],
                    ['id' => 'shadow-weave', 'name' => 'Сплетение теней', 'image' => 'shadow_weave.webp'],
                    ['id' => 'sharpshooter', 'name' => 'Прицельная стрельба', 'image' => 'sharp_shooter.webp'],
                    ['id' => 'spirit-rend', 'name' => 'Спиритический разрыв', 'image' => 'spellslinger_headshots.webp'],
                    ['id' => 'tesla-bullets', 'name' => 'Тесла-пули', 'image' => 'tesla_bullets.webp'],
                    ['id' => 'toxic-bullets', 'name' => 'Токсичные пули', 'image' => 'toxic_bullets.webp'],
                    ['id' => 'weighted-shots', 'name' => 'Утяжелённые выстрелы', 'image' => 'weighted_shots.webp'],
                ],
                6400 => [
                    ['id' => 'armor-piercing-rounds', 'name' => 'Бронебойные патроны', 'image' => 'armor_piercing_rounds.webp'],
                    ['id' => 'capacitor', 'name' => 'Конденсатор', 'image' => 'capacitor.webp'],
                    ['id' => 'crippling-headshot', 'name' => 'Калечащий выстрел в голову', 'image' => 'crippling_headshot.webp'],
                    ['id' => 'crushing-fists', 'name' => 'Сокрушительные кулаки', 'image' => 'crushing_fists.webp'],
                    ['id' => 'frenzy', 'name' => 'Ярость', 'image' => 'frenzy.webp'],
                    ['id' => 'glass-cannon', 'name' => 'Стеклянная пушка', 'image' => 'glass_cannon.webp'],
                    ['id' => 'lucky-shot', 'name' => 'Удачный выстрел', 'image' => 'lucky_shot.webp'],
                    ['id' => 'ricochet', 'name' => 'Рикошет', 'image' => 'ricochet.webp'],
                    ['id' => 'silencer', 'name' => 'Глушитель', 'image' => 'silencer.webp'],
                    ['id' => 'spellslinger', 'name' => 'Метатель чар', 'image' => 'spell_slinger.webp'],
                    ['id' => 'spiritual-overflow', 'name' => 'Спиритическое переполнение', 'image' => 'spiritual_overflow.webp'],
                ],
                9999 => [
                    ['id' => 'haunting-shot', 'name' => 'Терзающий выстрел', 'image' => 'brawl/eldritch_shot.webp'],
                    ['id' => 'infinite-rounds', 'name' => 'Бесконечные патроны', 'image' => 'brawl/infinite_rounds.webp'],
                    ['id' => 'runed-gauntlets', 'name' => 'Рунные рукавицы', 'image' => 'brawl/runed_gauntlets.webp'],
                ],
            ],
            'vitality' => [ // Vitality/Survival
                800 => [
                    ['id' => 'extra-health', 'name' => 'Добавочное здоровье', 'image' => 'extra_health.webp'],
                    ['id' => 'extra-regen', 'name' => 'Добавочное восстановление', 'image' => 'extra_regen.webp'],
                    ['id' => 'extra-stamina', 'name' => 'Добавочная выносливость', 'image' => 'extra_stamina.webp'],
                    ['id' => 'grit', 'name' => 'Крепость', 'image' => 'grit.webp'],
                    ['id' => 'healing-rite', 'name' => 'Обряд лечения', 'image' => 'healing_rite.webp'],
                    ['id' => 'melee-lifesteal', 'name' => 'Ударная кража здоровья', 'image' => 'melee_lifesteal.webp'],
                    ['id' => 'rebuttal', 'name' => 'Отпор', 'image' => 'rebuttal.webp'],
                    ['id' => 'sprint-boots', 'name' => 'Беговые ботинки', 'image' => 'sprint_boots.webp'],
                ],
                1600 => [
                    ['id' => 'battle-vest', 'name' => 'Боевой жилет', 'image' => 'battle_vest.webp'],
                    ['id' => 'bullet-lifesteal', 'name' => 'Пулевая кража здоровья', 'image' => 'bullet_lifesteal.webp'],
                    ['id' => 'debuff-reducer', 'name' => 'Уменьшитель эффектов', 'image' => 'debuff_reducer.webp'],
                    ['id' => 'enchanters-emblem', 'name' => 'Эмблема заклинателя', 'image' => 'enchanters_emblem.webp'],
                    ['id' => 'enduring-speed', 'name' => 'Скоростная стойкость', 'image' => 'enduring_speed.webp'],
                    ['id' => 'guardian-ward', 'name' => 'Заслон стража', 'image' => 'guardian_ward.webp'],
                    ['id' => 'healbane', 'name' => 'Гроза целителей', 'image' => 'healbane.webp'],
                    ['id' => 'healing-booster', 'name' => 'Усилитель лечения', 'image' => 'healing_booster.webp'],
                    ['id' => 'reactive-barrier', 'name' => 'Барьерная реакция', 'image' => 'reactive_barrier.webp'],
                    ['id' => 'restorative-locket', 'name' => 'Живительный медальон', 'image' => 'restorative_locket.webp'],
                    ['id' => 'return-fire', 'name' => 'Обратный огонь', 'image' => 'return_fire.webp'],
                    ['id' => 'spirit-lifesteal', 'name' => 'Спиритическая кража здоровья', 'image' => 'spirit_lifesteal.webp'],
                    ['id' => 'spirit-shielding', 'name' => 'Спиритическая защита', 'image' => 'spirit_shielding.webp'],
                    ['id' => 'trophy-collector', 'name' => 'Собиратель трофеев', 'image' => 'trophy_collector.webp'],
                    ['id' => 'weapon-shielding', 'name' => 'Оружейная защита', 'image' => 'weapon_shielding.webp'],
                ],
                3200 => [
                    ['id' => 'bullet-resilience', 'name' => 'Пулевая стойкость', 'image' => 'bullet_resilience.webp'],
                    ['id' => 'counterspell', 'name' => 'Контрчары', 'image' => 'counterspell.webp'],
                    ['id' => 'dispel-magic', 'name' => 'Развеивание магии', 'image' => 'debuff_remover.webp'],
                    ['id' => 'fortitude', 'name' => 'Выдержка', 'image' => 'fortitude.webp'],
                    ['id' => 'fury-trance', 'name' => 'Яростный экстаз', 'image' => 'fury_trance.webp'],
                    ['id' => 'healing-nova', 'name' => 'Вспышка исцеления', 'image' => 'healing_nova.webp'],
                    ['id' => 'lifestrike', 'name' => 'Витальный удар', 'image' => 'lifestrike.webp'],
                    ['id' => 'majestic-leap', 'name' => 'Грациозный скачок', 'image' => 'majestic_leap.webp'],
                    ['id' => 'metal-skin', 'name' => 'Металлическая кожа', 'image' => 'metal_skin.webp'],
                    ['id' => 'rescue-beam', 'name' => 'Спасательный луч', 'image' => 'rescue_beam.webp'],
                    ['id' => 'spirit-resilience', 'name' => 'Спиритическая стойкость', 'image' => 'spirit_resilience.webp'],
                    ['id' => 'stamina-mastery', 'name' => 'Превосходная выносливость', 'image' => 'stamina_mastery.webp'],
                    ['id' => 'veil-walker', 'name' => 'Незримый покров', 'image' => 'veil_walker.webp'],
                    ['id' => 'warp-stone', 'name' => 'Камень переноса', 'image' => 'warp_stone.webp'],
                ],
                6400 => [
                    ['id' => 'cheat-death', 'name' => 'Обман смерти', 'image' => 'cheat_death.webp'],
                    ['id' => 'colossus', 'name' => 'Колосс', 'image' => 'colossus.webp'],
                    ['id' => 'divine-barrier', 'name' => 'Божественный барьер', 'image' => 'divine_barrier.webp'],
                    ['id' => 'diviners-kevlar', 'name' => 'Доспех прорицателя', 'image' => 'diviners_kevlar.webp'],
                    ['id' => 'healing-tempo', 'name' => 'Целебный темп', 'image' => 'healing_tempo.webp'],
                    ['id' => 'indomitable', 'name' => 'Непреклонность', 'image' => 'indomitable.webp'],
                    ['id' => 'infuser', 'name' => 'Насытитель', 'image' => 'infuser.webp'],
                    ['id' => 'inhibitor', 'name' => 'Ограничитель', 'image' => 'inhibitor.webp'],
                    ['id' => 'juggernaut', 'name' => 'Громила', 'image' => 'juggernaut.webp'],
                    ['id' => 'leech', 'name' => 'Кровопийца', 'image' => 'leech.webp'],
                    ['id' => 'phantom-strike', 'name' => 'Фантомный удар', 'image' => 'phantom_strike.webp'],
                    ['id' => 'plated-armor', 'name' => 'Латная броня', 'image' => 'plated_armor.webp'],
                    ['id' => 'siphon-bullets', 'name' => 'Вытягивающие пули', 'image' => 'siphon_bullets.webp'],
                    ['id' => 'spellbreaker', 'name' => 'Разрушитель чар', 'image' => 'spellbreaker.webp'],
                    ['id' => 'unstoppable', 'name' => 'Неудержимость', 'image' => 'unstoppable.webp'],
                    ['id' => 'vampiric-burst', 'name' => 'Порыв вампиризма', 'image' => 'vampiric_burst.webp'],
                    ['id' => 'witchmail', 'name' => 'Ведьмовской доспех', 'image' => 'witchmail.webp'],
                ],
                9999 => [
                    ['id' => 'celestial-blessing', 'name' => 'Небесное благословение', 'image' => 'brawl/celestial_guidance.webp'],
                    ['id' => 'cloak-of-opportunity', 'name' => 'Плащ возможностей', 'image' => 'brawl/cloak_of_opportunity.webp'],
                    ['id' => 'electric-slippers', 'name' => 'Электротапки', 'image' => 'brawl/electric_slippers.webp'],
                    ['id' => 'eternal-gift', 'name' => 'Вечный дар', 'image' => 'brawl/eternal_gift.webp'],
                    ['id' => 'nullification-burst', 'name' => 'Обнуляющий импульс', 'image' => 'brawl/nullification_aura.webp'],
                    ['id' => 'seraphim-wings', 'name' => 'Крылья серафима', 'image' => 'brawl/icarus_wings.webp'],
                    ['id' => 'shadow-strike', 'name' => 'Теневой удар', 'image' => 'brawl/shadow_strike.webp'],
                ],
            ],
            'spirit' => [ // Spirit
                800 => [
                    ['id' => 'extra-charge', 'name' => 'Добавочные заряды', 'image' => 'extra_charge.webp'],
                    ['id' => 'extra-spirit', 'name' => 'Добавочный спиритизм', 'image' => 'extra_spirit.webp'],
                    ['id' => 'golden-goose-egg', 'name' => 'Золотое гусиное яйцо', 'image' => 'goose_egg.webp'],
                    ['id' => 'mystic-burst', 'name' => 'Мистический импульс', 'image' => 'mystic_burst.webp'],
                    ['id' => 'mystic-expansion', 'name' => 'Мистическое расширение', 'image' => 'mystic_reach.webp'],
                    ['id' => 'mystic-regeneration', 'name' => 'Мистическое восстановление', 'image' => 'mystic_regen.webp'],
                    ['id' => 'rusted-barrel', 'name' => 'Ржавый ствол', 'image' => 'rusted_barrel.webp'],
                    ['id' => 'spirit-strike', 'name' => 'Спиритический удар', 'image' => 'spirit_strike.webp'],
                ],
                1600 => [
                    ['id' => 'arcane-surge', 'name' => 'Колдовской порыв', 'image' => 'arcane_surge.webp'],
                    ['id' => 'bullet-resist-shredder', 'name' => 'Измельчитель пулестойкости', 'image' => 'bullet_resist_shredder.webp'],
                    ['id' => 'cold-front', 'name' => 'Холодный фронт', 'image' => 'cold_front.webp'],
                    ['id' => 'compress-cooldown', 'name' => 'Сжатая перезарядка умений', 'image' => 'improved_cooldown.webp'],
                    ['id' => 'duration-extender', 'name' => 'Увеличитель длительности', 'image' => 'duration_extender.webp'],
                    ['id' => 'improved-spirit', 'name' => 'Улучшенный спиритизм', 'image' => 'improved_spirit.webp'],
                    ['id' => 'mystic-slow', 'name' => 'Мистическое замедление', 'image' => 'mystic_slow.webp'],
                    ['id' => 'mystic-vulnerability', 'name' => 'Мистическая уязвимость', 'image' => 'mystic_vulnerability.webp'],
                    ['id' => 'quicksilver-reload', 'name' => 'Ртутная перезарядка', 'image' => 'quicksilver_reload.webp'],
                    ['id' => 'slowing-hex', 'name' => 'Замедляющие чары', 'image' => 'slowing_hex.webp'],
                    ['id' => 'spirit-sap', 'name' => 'Спиритическое истощение', 'image' => 'spirit_sap.webp'],
                    ['id' => 'suppressor', 'name' => 'Подавитель', 'image' => 'suppressor.webp'],
                ],
                3200 => [
                    ['id' => 'decay', 'name' => 'Разложение', 'image' => 'decay.webp'],
                    ['id' => 'disarming-hex', 'name' => 'Чары обезоруживания', 'image' => 'disarming_hex.webp'],
                    ['id' => 'greater-expansion', 'name' => 'Усиленное расширение', 'image' => 'greater_expansion.webp'],
                    ['id' => 'knockdown', 'name' => 'Нокдаун', 'image' => 'knockdown.webp'],
                    ['id' => 'radiant-regeneration', 'name' => 'Сияющее восстановление', 'image' => 'radiant_regeneration.webp'],
                    ['id' => 'rapid-recharge', 'name' => 'Спешные заряды', 'image' => 'rapid_recharge.webp'],
                    ['id' => 'silence-wave', 'name' => 'Волна безмолвия', 'image' => 'silence_glyph.webp'],
                    ['id' => 'spirit-snatch', 'name' => 'Похищение спиритизма', 'image' => 'spirit_snatch.webp'],
                    ['id' => 'superior-cooldown', 'name' => 'Превосходная перезарядка умений', 'image' => 'superior_cooldown.webp'],
                    ['id' => 'superior-duration', 'name' => 'Превосходная длительность', 'image' => 'superior_duration.webp'],
                    ['id' => 'surge-of-power', 'name' => 'Прилив мощи', 'image' => 'surge_of_power.webp'],
                    ['id' => 'tankbuster', 'name' => 'Гроза танков', 'image' => 'tankbuster.webp'],
                    ['id' => 'torment-pulse', 'name' => 'Терзающий пульс', 'image' => 'torment_pulse.webp'],
                ],
                6400 => [
                    ['id' => 'arctic-blast', 'name' => 'Арктический взрыв', 'image' => 'arctic_blast.webp'],
                    ['id' => 'boundless-spirit', 'name' => 'Безграничный спиритизм', 'image' => 'boundless_spirit.webp'],
                    ['id' => 'cursed-relic', 'name' => 'Проклятая реликвия', 'image' => 'curse.webp'],
                    ['id' => 'echo-shard', 'name' => 'Осколок эха', 'image' => 'echo_shard.webp'],
                    ['id' => 'escalating-exposure', 'name' => 'Растущее воздействие', 'image' => 'escalating_exposure.webp'],
                    ['id' => 'ethereal-shift', 'name' => 'Развоплощение', 'image' => 'ethereal_shift.webp'],
                    ['id' => 'focus-lens', 'name' => 'Фокусная линза', 'image' => 'focus_lens.webp'],
                    ['id' => 'lightning-scroll', 'name' => 'Свиток молнии', 'image' => 'lightning_scroll.webp'],
                    ['id' => 'magic-carpet', 'name' => 'Ковёр-самолёт', 'image' => 'magic_carpet.webp'],
                    ['id' => 'mercurial-magnum', 'name' => 'Ртутный Магнум', 'image' => 'mercurial_magnum.webp'],
                    ['id' => 'mystic-reverb', 'name' => 'Мистический отзвук', 'image' => 'mystic_reverb.webp'],
                    ['id' => 'refresher', 'name' => 'Обновитель', 'image' => 'refresher.webp'],
                    ['id' => 'scourge', 'name' => 'Кара', 'image' => 'scourge.webp'],
                    ['id' => 'spirit-burn', 'name' => 'Спиритический ожог', 'image' => 'spirit_burn.webp'],
                    ['id' => 'transcendent-cooldown', 'name' => 'Трансцендентная перезарядка', 'image' => 'transcendent_cooldown.webp'],
                    ['id' => 'vortex-web', 'name' => 'Паутинный вихрь', 'image' => 'vortex_web.webp'],
                ],
                9999 => [
                    ['id' => 'frostbite-charm', 'name' => 'Морозящий амулет', 'image' => 'brawl/frostbite.webp'],
                    ['id' => 'mystic-conduit', 'name' => 'Мистическая связь', 'image' => 'brawl/patrons_blessing.webp'],
                    ['id' => 'mystical-piano', 'name' => 'Мистическое фортепиано', 'image' => 'brawl/mystical_piano.webp'],
                    ['id' => 'omnicharge-signet', 'name' => 'Всезарядная печать', 'image' => 'brawl/omnicharge_pendant.webp'],
                    ['id' => 'prism-blast', 'name' => 'Призматический взрыв', 'image' => 'brawl/prism_blast.webp'],
                    ['id' => 'shrink-ray', 'name' => 'Луч уменьшения', 'image' => 'brawl/shrink_ray.webp'],
                    ['id' => 'unstable-concoction', 'name' => 'Нестабильный отвар', 'image' => 'brawl/unstable_concoction.webp'],
                ],
            ],
        ];

        foreach ($itemsByCategory as $categoryName => $prices) {
            $folder = $categoryFolders[$categoryName] ?? '';
            foreach ($prices as $price => $items) {
                foreach ($items as $index => $item) {
                    $imagePath = strpos($item['image'], '/') !== false
                        ? $item['image']
                        : $folder . $item['image'];

                    $itemsByCategory[$categoryName][$price][$index]['image'] = $baseImageUrl . $imagePath;
                }
            }
        }

        $items = $itemsByCategory[$category] ?? $itemsByCategory['oruzhie'];

        // Add price tier grouping
        $itemsGrouped = [];
        foreach ($items as $price => $itemList) {
            $itemsGrouped[] = [
                'price' => $price,
                'items' => array_map(function($item) use ($price, $category) {
                    $item['price'] = $price;
                    $item['category'] = $category;
                    return $item;
                }, $itemList)
            ];
        }

        return response()->json($itemsGrouped);
    }
}
