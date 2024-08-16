<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    {{ $slot }}
    <!-- asobi -->
    <button class="color-changer" style="border: none; color: yellowgreen; background: rgba(0, 0, 0, 0);">●</button>
    <script type="text/javascript">
        const root = document.documentElement;
        const CC = document.querySelector(".color-changer");
        CC.addEventListener("click", () => {
            if (root.style.getPropertyValue('--main-color1') !== 'rgb(111, 255, 71)') {
                root.style.setProperty('--main-color1', 'rgb(111, 255, 71)');
                root.style.setProperty('--main-color2', 'rgba(111, 255, 71, .3)');
                root.style.setProperty('--main-color3', 'rgba(111, 255, 71, .1)');
                CC.style.color = 'white';
            } else {
                root.style.setProperty('--main-color1', 'rgb(255, 255, 255)');
                root.style.setProperty('--main-color2', 'rgba(255, 255, 255, .3)');
                root.style.setProperty('--main-color3', 'rgba(255, 255, 255, .1)');
                CC.style.color = 'yellowgreen';
            }
        });
    </script>
</body>
</html>