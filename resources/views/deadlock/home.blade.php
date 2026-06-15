@extends('deadlock.layout')

@section('extra-styles')
<style>
    .main-page {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 100vh;
        padding: 20px;
        margin-top: 70px;
        color: #ffffff;
    }

    .video-background {
        position: absolute;
        inset: 0;
        z-index: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .video-background video {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.95;
        filter: brightness(0.92) saturate(1.1);
    }

    .main-page::before {
        content: '';
        position: absolute;
        inset: 0;
        z-index: 1;
        pointer-events: none;
    }

    .main-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        width: 100%;
    }

    .title {
        font-size: clamp(2.75rem, 6vw, 5rem);
        font-weight: 900;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        text-shadow: 0 0 35px rgba(0, 0, 0, 0.65);
        animation: pulseGlow 3s ease-in-out infinite alternate;
    }

    .subtitle {
        margin-top: 20px;
        font-size: clamp(1rem, 2vw, 1.5rem);
        color: rgba(255,255,255,0.88);
        max-width: 760px;
        line-height: 1.6;
        animation: floatText 6s ease-in-out infinite;
    }

    .sound-button {
        margin-top: 28px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 26px;
        border-radius: 999px;
        background: rgba(255,102,0,0.95);
        color: white;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, background 0.2s ease;
        z-index: 2;
    }

    .sound-button:hover {
        transform: translateY(-2px);
        background: rgba(255,118,0,1);
    }

    .sound-notice {
        margin-top: 12px;
        font-size: 0.95rem;
        color: rgba(255,255,255,0.75);
        opacity: 0.9;
        animation: fadeIn 2s ease both;
    }

    @keyframes pulseGlow {
        from { text-shadow: 0 0 20px rgba(255,102,0,0.55), 0 0 40px rgba(255,102,0,0.15); }
        to { text-shadow: 0 0 40px rgba(255,102,0,0.75), 0 0 75px rgba(255,102,0,0.25); }
    }

    @keyframes floatText {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 0.9; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .main-page {
            margin-top: 60px;
            padding: 15px;
        }

        .title {
            font-size: 2.5rem;
        }

        .subtitle {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<main class="main-page">
    <div class="video-background">
        <video id="bgVideo" autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('videos/videoplayback.mp4') }}" type="video/mp4">
            Ваш браузер не поддерживает видеофоновое воспроизведение.
        </video>
    </div>
    <div class="main-content">
        <h1 class="title">Deadlock</h1>
        <button class="sound-button" id="soundBtn">Включить звук</button>
        <p class="sound-notice">Если звук не работает, обновите страницу или разрешите автозапуск в браузере.</p>
    </div>
</main>
@endsection

@section('extra-scripts')
<script>
    const soundBtn = document.getElementById('soundBtn');
    const bgVideo = document.getElementById('bgVideo');
    let soundEnabled = false;

    function updateSoundState() {
        bgVideo.muted = !soundEnabled;
        soundBtn.textContent = soundEnabled ? 'Выключить звук' : 'Включить звук';
    }

    soundBtn.addEventListener('click', function() {
        soundEnabled = !soundEnabled;
        updateSoundState();
        if (soundEnabled) {
            bgVideo.play().catch(() => {});
        }
    });
</script>
@endsection
