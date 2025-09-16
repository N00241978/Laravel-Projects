<!-- resources/views/about.blade.php -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? ('About Me — ' . config('app.name')) }}</title>
    <style>
    :root {
        --bg: #f7f7fb;
        --card: #ffffff;
        --ink: #151515;
        --muted: #656565;
        --ring: #e6e6ee;
        --accent: #0f62fe;
        --radius: 18px;
        --shadow: 0 10px 30px rgba(16, 24, 40, .06), 0 2px 8px rgba(16, 24, 40, .04)
    }
 
    * {
        box-sizing: border-box
    }
 
    html,
    body {
        height: 100%
    }
 
    body {
        margin: 0;
        background:
            radial-gradient(1200px 800px at 100% -10%, #e9f0ff 0%, transparent 60%),
            radial-gradient(900px 600px at -20% 110%, #f7ecff 0%, transparent 60%),
            var(--bg);
        color: var(--ink);
        font: 16px/1.5 ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, Apple Color Emoji, Segoe UI Emoji;
        -webkit-font-smoothing: antialiased
    }
 
    .wrap {
        max-width: 1000px;
        margin: 0 auto;
        padding: 48px 20px
    }
 
    header {
        display: grid;
        gap: 18px;
        justify-items: center;
        text-align: center
    }
 
    .avatar {
        width: 96px;
        height: 96px;
        border-radius: 20px;
        object-fit: cover;
        display: block;
        box-shadow: var(--shadow);
        border: 4px solid #fff;
        background: #fff
    }
 
    .badge {
        display: inline-flex;
        gap: 8px;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: #111;
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        box-shadow: var(--shadow)
    }
 
    h1 {
        margin: 6px 0 0;
        font-size: clamp(28px, 5vw, 40px);
        letter-spacing: -.02em
    }
 
    .lead {
        max-width: 720px;
        margin: 8px auto 0;
        color: var(--muted)
    }
 
    .links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-top: 12px
    }
 
    .chip {
        display: inline-block;
        padding: 10px 14px;
        border-radius: 999px;
        background: #fff;
        border: 1px solid var(--ring);
        text-decoration: none;
        color: var(--ink);
        font-weight: 600;
        box-shadow: 0 1px 0 rgba(16, 24, 40, .04);
        transition: transform .12s ease, box-shadow .12s ease
    }
 
    .chip:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow)
    }
 
    main {
        margin-top: 36px;
        display: grid;
        gap: 16px
    }
 
    @media(min-width:820px) {
        main {
            grid-template-columns: 3fr 2fr
        }
    }
 
    .card {
        background: linear-gradient(180deg, rgba(255, 255, 255, .8), rgba(255, 255, 255, .9));
        border: 1px solid var(--ring);
        border-radius: var(--radius);
        padding: 22px;
        box-shadow: var(--shadow);
        backdrop-filter: blur(8px)
    }
 
    .card h2,
    .card h3 {
        margin: 0 0 10px;
        font-size: 18px
    }
 
    .list {
        margin: 10px 0 0;
        padding-left: 18px
    }
 
    .skillset {
        display: flex;
        flex-wrap: wrap;
        gap: 8px
    }
 
    .pill {
        font-size: 12px;
        padding: 8px 12px;
        border-radius: 999px;
        background: #f2f2f7;
        border: 1px solid var(--ring);
        color: #333
    }
 
    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 10px
    }
 
    .stat {
        padding: 12px;
        border-radius: 14px;
        background: #fafafe;
        border: 1px solid var(--ring);
        text-align: center
    }
 
    .stat dt {
        font-size: 12px;
        color: #6b7280
    }
 
    .stat dd {
        margin: 4px 0 0;
        font-weight: 800;
        font-size: 18px
    }
 
    footer {
        margin-top: 32px;
        padding-top: 18px;
        border-top: 1px solid var(--ring);
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        color: #6b7280
    }
    </style>
</head>
 
<body>
    @php
    $name = $name ?? 'Angus Walker';
    $role = $role ?? 'Designer • Developer • Freestyler';
    $headline = $headline ?? ('Hi, I'm ' . $name);
    $bio = $bio ?? 'I build fast, accessible web experiences and sweat the details: performance, typography, and crisp
    interactions.';
    $about = $about ?? "Front-end focused, systems-minded. I turn fuzzy requirements into clear interfaces and ship
    without drama.";
    $location = $location ?? 'Based in Dublin';
 
    $links = $links ?? [
    ['label' => 'Email', 'href' => 'mailto:hello@example.com'],
    ['label' => 'GitHub', 'href' => 'https://github.com/username'],
    ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/username/'],
    ['label' => 'Portfolio', 'href' => '#'],
    ];
 
    $highlights = $highlights ?? [
    'Rapid prototyping with Laravel + Blade + Alpine',
    'Design systems that scale',
    'Type-safe backends, pragmatic frontends',
    'Performance budgets and profiling',
    ];
 
    $skills = $skills ?? ['Laravel','Blade','Alpine.js','PHP','MySQL','Redis','React','TypeScript'];
 
    $stats = $stats ?? [
    ['label'=>'Projects','value'=>'24'],
    ['label'=>'Commits','value'=>'10k+'],
    ['label'=>'Caffeine','value'=>'∞'],
    ];
    @endphp
 
    <div class="wrap">
        <header>
            <img class="avatar"
                src="{{ $avatar ?? ('https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode($name)) }}"
                alt="{{ $name }}">
            <span class="badge">{{ $role }}</span>
            <h1>{{ $headline }}</h1>
            <p class="lead">{{ $bio }}</p>
            <div class="links">
                @foreach($links as $link)
                <a class="chip" href="{{ $link['href'] }}">{{ $link['label'] }}</a>
                @endforeach
            </div>
        </header>
 
        <main>
            <section class="card">
                <h2>What I'm About</h2>
                <p>{{ $about }}</p>
                <ul class="list">
                    @foreach($highlights as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </section>
 
            <aside class="card">
                <h3>Skills</h3>
                <div class="skillset">
                    @foreach($skills as $skill)
                    <span class="pill">{{ $skill }}</span>
                    @endforeach
                </div>
 
                <h3 style="margin-top:16px">Stats</h3>
                <dl class="stats">
                    @foreach($stats as $s)
                    <div class="stat">
                        <dt>{{ $s['label'] }}</dt>
                        <dd>{{ $s['value'] }}</dd>
                    </div>
                    @endforeach
                </dl>
            </aside>
        </main>
 
        <footer>
            <span>&copy; {{ now()->year }} {{ $name }}</span>
            <span>{{ $location }}</span>
        </footer>
    </div>
</body>
 
</html>