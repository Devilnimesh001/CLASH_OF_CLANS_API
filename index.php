<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASH OF CLANS PLAYER STATS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="banner">
        <video autoplay muted loop class="back-video" plays-inline>
            <source src="sound/Clash_Of_Clans_Movie_-__Animation_video__Funny_(1080p).mp4">
        </video>
        <div class="navbar">
            <!-- <img src="logo.jpg" class="logo"> -->
            <p class="logo"><img src="img/logo.png"></p>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#STATS">STATS</a></li>
            </ul>
        </div>

        <audio id="song">
            <source src="sound/Clash_of_Clans__Main_Theme(256k).mp3" type="audio/mp3">
        </audio>


        <div class="content">
            <h1 class="gold">Player Status</h1>
            <p class="gold1">Welcome to our player status page! Check out the latest updates and statistics for Clash of Clans players.</p>
        </div>
        <div class="sound">
            <img src="sound/play.png" style="filter: hue-rotate(290deg);" id="icon">
        </div>
    </div>
    
    <div class="section" id="STATS">
        <div class="left">
            <p class="gold reveal">CHECK <br> PLAYER'S PROFILE</p>
            <div class="forms reveal">
                <form action="clash.php" method="POST" target="_blank">
                    <label class="gold2" for="playerTag">Enter Player Tag:</label>
                    <input type="text" class="gold1" id="playerTag" name="playerTag" placeholder="e.g., #9CUCYPCJO" value="">
                    <button type="submit">CHECK</button>
                </form>
            </div>

        </div>
        <div class="right">
            <div class="image reveal">
                <img src="img/1713609531516.png">
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer_left">
            <div class="container">
                <div class="footer_text">
                    <h1>SEE THE LATEST</h1>
                    <p>To stay on top of your game, keep an eye on the in-game News section. Follow <br> us on social media for the latest chatter and sneak peeks on what the team is <br> working on. Don’t be a stranger and join the conversation.</p>    
                </div>
                <div class="footer_icons">
                    <h2>FOLLOW CLASH OF CLANS ON</h2>
                    <div class="imageText">
                        <a href="https://www.reddit.com/r/ClashOfClans/"><img src="icons/reddit.webp"></a>
                        <a href="https://www.youtube.com/clashofclans"><img src="icons/youtube.webp"></a>
                        <a href="https://www.facebook.com/ClashofClans"><img src="icons/fb.webp"></a>
                        <a href="https://www.instagram.com/ClashofClans/"><img src="icons/insta.webp"></a>
                        <a href="https://twitter.com/ClashofClans"><img src="icons/tweet.webp"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_right">
            <div>
                <img src="img/bg_gamewebsite_clashofclans.2f177d99.webp" alt="">
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        window.addEventListener('scroll', reveal);

        function reveal()
        {
            var reveals = document.querySelectorAll('.reveal');

            for(i = 0; i < reveals.length; i++)
            {
                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 170;

                if(revealtop < windowheight - revealpoint)
                {
                    reveals[i].classList.add('active');
                }
                else
                {
                    reveals[i].classList.remove('active');
                }
            }


            
        }

        var song = document.getElementById("song") 
            var icon = document.getElementById("icon")
    
            
            icon.onclick = function() {
                if(song.paused){
                    song.play();
                    icon.src = "sound/pause.png";
                }else{
                    song.pause();
                    icon.src = "sound/play.png";
                }
            }



    </script>

</body>
</html>