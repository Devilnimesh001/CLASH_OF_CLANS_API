<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAYER STATS</title>
    <link rel="stylesheet" href="clash.css"> 
</head>
<body>
    <?php
        // Read the token from file
        $myKey = rtrim(file_get_contents('token.txt'));
        
        $tag = $_POST['playerTag'];
        
        // Define base URL and endpoint
        $baseUrl = "https://api.clashofclans.com/v1";
        $endpoint = "/players/%23" . $tag;

        // Set up the request headers
        $headers = array(
            "Authorization: Bearer $myKey",
        );

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Get the HTTP status code
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Check if the request was successful (status code 200)
        if ($httpStatusCode === 200) {
            // Decode the JSON response
            $data = json_decode($response, true);

            // Define keys to extract
            $keysToExtract = ['name', 'tag', 'townHallLevel', 'expLevel', 'trophies', 'bestTrophies', 'builderHallLevel', 'troops', 'heroes', 'spells'];

            // Initialize an array to store extracted data
            $newData = array();

            // Extract the desired keys from the data
            foreach ($keysToExtract as $key) {
                if (array_key_exists($key, $data)) {
                    $newData[$key] = $data[$key];
                }
            }

            // Convert the extracted data to JSON format
            $newDataJson = json_encode($newData);

            // Output the JSON
            
        } else {
            // Request failed
            echo "Request failed with HTTP status code: " . $httpStatusCode;
        }
        

        // Function to extract troop information
        function extractTroopInfo($data) {
            // Extract 'troops' list from the data dictionary
            $troopsList = isset($data['troops']) ? $data['troops'] : [];

            // Initialize a list to store extracted information
            $troopsInfo = [];

            // Iterate over each dictionary in the 'troops' list
            foreach ($troopsList as $troop) {
                // Extract 'name' and 'level' keys from each troop dictionary
                $name = isset($troop['name']) ? $troop['name'] : null;
                $level = isset($troop['level']) ? $troop['level'] : null;

                // Append the extracted information as a dictionary to troopsInfo list
                if ($name !== null && $level !== null) {
                    $troopsInfo[] = ['name' => $name, 'level' => $level];
                }
            }

            // Return the troopsInfo list
            return $troopsInfo;
        }

        // Function to extract hero information
        function extractHeroInfo($data) {
            // Extract 'heroes' list from the data dictionary
            $heroesList = isset($data['heroes']) ? $data['heroes'] : [];

            // Initialize a list to store extracted information
            $heroesInfo = [];

            // Iterate over each dictionary in the 'heroes' list
            foreach ($heroesList as $hero) {
                // Extract 'name' and 'level' keys from each hero dictionary
                $name = isset($hero['name']) ? $hero['name'] : null;
                $level = isset($hero['level']) ? $hero['level'] : null;

                // Append the extracted information as a dictionary to heroesInfo list
                if ($name !== null && $level !== null) {
                    $heroesInfo[] = ['name' => $name, 'level' => $level];
                }
            }

            // Return the heroesInfo list
            return $heroesInfo;
        }

        // Function to extract spell information
        function extractSpellInfo($data) {
            // Extract 'spells' list from the data dictionary
            $spellsList = isset($data['spells']) ? $data['spells'] : [];

            // Initialize a list to store extracted information
            $spellsInfo = [];

            // Iterate over each dictionary in the 'spells' list
            foreach ($spellsList as $spell) {
                // Extract 'name' and 'level' keys from each spell dictionary
                $name = isset($spell['name']) ? $spell['name'] : null;
                $level = isset($spell['level']) ? $spell['level'] : null;

                // Append the extracted information as a dictionary to spellsInfo list
                if ($name !== null && $level !== null) {
                    $spellsInfo[] = ['name' => $name, 'level' => $level];
                }
            }

            // Return the spellsInfo list
            return $spellsInfo;
        }

        // Function to extract player information
        function extractPlayerInfo($data) {
            // Extract required keys from the data dictionary
            $playerInfo = [
                'name' => isset($data['name']) ? $data['name'] : null,
                'tag' => isset($data['tag']) ? $data['tag'] : null,
                'townHallLevel' => isset($data['townHallLevel']) ? $data['townHallLevel'] : null,
                'expLevel' => isset($data['expLevel']) ? $data['expLevel'] : null,
                'trophies' => isset($data['trophies']) ? $data['trophies'] : null,
                'bestTrophies' => isset($data['bestTrophies']) ? $data['bestTrophies'] : null,
                'builderHallLevel' => isset($data['builderHallLevel']) ? $data['builderHallLevel'] : null
            ];

            return $playerInfo;
        }

        // Your API response data should be converted to associative array $data before using these functions

        // Call the function with the data dictionary and store the returned value
        $player = extractPlayerInfo($newData);

        // Call the function with the data dictionary and store the returned value
        $heroes = extractHeroInfo($newData);

        // Call the function with the data dictionary and store the returned value
        $troops = extractTroopInfo($newData);

        // Call the function with the data dictionary and store the returned value
        $spells = extractSpellInfo($newData);
        
        // Close cURL session
        curl_close($ch);
        
        
        ?>
    <div class="section">
        <div class="left">
            <img class="wizard" src="img/1713841546612.png">
            <!-- <img class="fireball" src="1713845474110.png">  -->
        </div>
        <div class="right">
            <h1 class="playername gold">NAGA NIMESH</h1>
            <h3 class="playertag gold">#9CUCYPCJO</h3>
            <div class="container_tab">
                <div class="townhall">
                    <div class="th-img">
                        <img src="img/th-16.9bdef62.png">
                    </div>
                    <h4 class="TH gold1">TOWNHALL 11</h4>
                </div>

                <div class="builderhall">
                    <div class="bh-img">
                        <img src="img/bh-10.3b88e3b.png">
                    </div>
                    <h4 class="BH gold1">BUILDER HALL 7</h4>
                </div>

                <div class="xplevel">
                    <div class="xp-img">
                        <img src="img/xp-small.f6305c6.png">
                    </div>
                    <h4 class="XP gold1">XP LEVEL 145</h4>
                </div>

                <div class="trophys">
                    <div class="tp-img">
                        <img src="img/trophy.2cfed53.png">
                    </div>
                    <h4 class="trophy gold1">TROPHIES 2456</h4>
                </div>
                
                <div class="besttrophys">
                    <div class="bt-img">
                        <img src="img/legend-trophy.92b22fd.png">
                    </div>
                    <h4 class="besttrophy gold1">BEST TROHIES 4555</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="section1">
        <div class="container_army">
            <div class="heroes">
                <h1 class="gold1">HEROES</h1>

                <div class="hero_tab">
                    <div class="hero unlock">
                        <div class="king-img">
                            <!-- <img src="hero-0.40a3539.png"> -->
                        </div>
                        <h4 class="gold heroname">BARBARIAN KING</h4>
                        <h4 class="kinglevel gold level">UNLOCK</h4>
                    </div>

                    <div class="hero unlock">
                        <div class="queen-img">
                        </div>
                        <h4 class="gold heroname">ARCHER QUEEN</h4>
                        <h4 class="queenlevel gold level">UNLOCK</h4>
                    </div>

                    <div class="hero unlock">
                        <div class="warden-img">
                        </div>
                        <h4 class="gold heroname">GRAND WARDEN</h4>
                        <h4 class="wardenlevel gold level">UNLOCK</h4>
                    </div>

                    <div class="hero unlock">
                        <div class="champion-img">
                        </div>
                        <h4 class="gold heroname">ROYAL CHAMPION</h4>
                        <h4 class="championlevel gold level">UNLOCK</h4>
                    </div>
                </div>
            </div>
            <div class="troops">
                <h1 class="gold1">TROOPS</h1>

                <div class="troop_tab">
                    <div class="troop">
                        <div class="troop-img" style="background-image: url(img/troop-0.c4844f8.png);"></div>
                        <h4 class="gold troopname">BARBARIAN</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-1.a7b2c4e.png);"></div>
                        <h4 class="gold troopname">ARCHER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-2.6bdf613.png);"></div>
                        <h4 class="gold troopname">GIANT</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-3.082ad93.png);"></div>
                        <h4 class="gold troopname">GOBLIN</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-4.1b77fc4.png);"></div>
                        <h4 class="gold troopname">WALL BREAKER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-5.aeff777.png);"></div>
                        <h4 class="gold troopname">BALLOON</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-6.5b3dcac.png);"></div>
                        <h4 class="gold troopname">WIZARD</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-7.a8bc0a9.png);"></div>
                        <h4 class="gold troopname">HEALER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-8.65ec436.png);"></div>
                        <h4 class="gold troopname">DRAGON</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-9.a0a3378.png);"></div>
                        <h4 class="gold troopname">P.E.K.K.A</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-17.82f6802.png);"></div>
                        <h4 class="gold troopname">BABY DRAGON</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-18.b62cc2e.png);"></div>
                        <h4 class="gold troopname">MINER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-29.d772d84.png);"></div>
                        <h4 class="gold troopname">ELECTRO DRAGON</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-35.5e9f9ee.png);"></div>
                        <h4 class="gold troopname">YETI</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-43.a48e1dd.png);"></div>
                        <h4 class="gold troopname">DRAGON RIDER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-49.5999868.png);"></div>
                        <h4 class="gold troopname">ELECTRO TITAN</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-53.f6c27e1.png);"></div>
                        <h4 class="gold troopname">ROOT RIDER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-10.e6bec92.png);"></div>
                        <h4 class="gold troopname">MINION</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-11.f951ed1.png);"></div>
                        <h4 class="gold troopname">HOG RIDER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-12.64589d6.png);"></div>
                        <h4 class="gold troopname">VALKYRIE</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-13.465dbca.png);"></div>
                        <h4 class="gold troopname">GOLEM</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-14.0a03202.png);"></div>
                        <h4 class="gold troopname">WITCH</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-15.0b63d06.png);"></div>
                        <h4 class="gold troopname">LAVA HOUND</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-16.2f9fc1f.png);"></div>
                        <h4 class="gold troopname">BOWLER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-32.aa7287f.png);"></div>
                        <h4 class="gold troopname">ICE GOLEM</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="troop unlock">
                        <div class="troop-img" style="background-image: url(img/troop-37.0e8b09c.png);"></div>
                        <h4 class="gold troopname">HEADHUNTER</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                </div>
            </div>
            <div class="spells">
                <h1 class="gold1">SPELLS</h1>

                <div class="spell_tab">
                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-0.8d642b0.png);"></div>
                        <h4 class="gold spellname">LIGHTNING SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-1.e8fe579.png);"></div>
                        <h4 class="gold spellname">HEALING SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-2.67d9e40.png);"></div>
                        <h4 class="gold spellname">RAGE SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-3.2143aab.png);"></div>
                        <h4 class="gold spellname">JUMP SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-4.c1d0b1c.png)"></div>
                        <h4 class="gold spellname">FREEZE SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-5.9780822.png)"></div>
                        <h4 class="gold spellname">CLONE SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-6.afef3df.png)"></div>
                        <h4 class="gold spellname">INVISIBILITY SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-7.9e7f91a.png)"></div>
                        <h4 class="gold spellname">RECALL SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-8.7c10113.png)"></div>
                        <h4 class="gold spellname">POISON SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-9.ff66edf.png)"></div>
                        <h4 class="gold spellname">EARTHQUAKE SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-10.54b76eb.png)"></div>
                        <h4 class="gold spellname">HASTE SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-11.1c0a764.png)"></div>
                        <h4 class="gold spellname">SKELETON SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                    <div class="spell unlock">
                        <div class="spell-img" style="background-image: url(img/spell-12.1696c69.png)"></div>
                        <h4 class="gold spellname">BAT SPELL</h4>
                        <h4 class="gold level">UNLOCK</h4>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer_left">
            <img src="img/Hog_Rider_card_render.webp">
        </div>
        <div class="footer_right">
            <div class="footer-img">
                <a href="https://play.google.com/store/apps/details?id=com.supercell.clashofclans&pli=1"><img class="img1" src="icons/googleplay.4ced544f.webp"></a>
                <a href="https://apps.apple.com/us/app/clash-of-clans/id529479190"><img class="img2" src="icons/appstore.c44572b2.webp"></a>
                <a href="https://supercell.com/en/games/clashofclans/"><img class="img3" src="icons/logo.png"></a>
                <a href="https://supercell.com/en/"><img class="img4" src="icons/supercell_logo.38ec5826.webp"></a>
                <a href="https://developer.clashofclans.com/#/"><img class="img5" src="icons/Picsart_24-04-23_18-54-38-100.png"></a>
            </div>
            <div class="footer_text">
                <h1>DEVELOPED BY <br><span class="nickname">NAGANIMESH</span></h1>
            </div>
        </div>    
            
    </div>
    <!--SCRIPT-->
    <script>
        // JavaScript code to update player profile, heroes, troops, and spells
        document.addEventListener('DOMContentLoaded', function() {
            // Player profile data from PHP
            var playerData = <?php echo json_encode($player); ?>;
            
            var PlayerName = document.querySelector('.playername');
            if (PlayerName) {
                PlayerName.textContent = '' + playerData.name;
            }
            
            var PlayerTag = document.querySelector('.playertag');
            if (PlayerTag) {
                PlayerTag.textContent = '' + playerData.tag;
            }
            
            // Update Town Hall Level
            var townhallElement = document.querySelector('.TH');
            if (townhallElement) {
                townhallElement.textContent = 'TOWNHALL ' + playerData.townHallLevel;
            }
        
            // Update Builder Hall Level
            var builderhallElement = document.querySelector('.BH');
            if (builderhallElement) {
                builderhallElement.textContent = 'BUILDER HALL ' + playerData.builderHallLevel;
            }
        
            // Update Experience Level
            var xpLevelElement = document.querySelector('.XP');
            if (xpLevelElement) {
                xpLevelElement.textContent = 'XP LEVEL ' + playerData.expLevel;
            }
        
            // Update Trophies
            var trophiesElement = document.querySelector('.trophy');
            if (trophiesElement) {
                trophiesElement.textContent = 'TROPHIES ' + playerData.trophies;
            }
        
            // Update Best Trophies
            var bestTrophiesElement = document.querySelector('.besttrophy');
            if (bestTrophiesElement) {
                bestTrophiesElement.textContent = 'BEST TROPHIES ' + playerData.bestTrophies;
            }
            
            // Heroes data from PHP
            var heroesData = <?php echo json_encode($heroes); ?>;
            
            // Troops data from PHP
            var troopsData = <?php echo json_encode($troops); ?>;
            
            // Spells data from PHP
            var spellsData = <?php echo json_encode($spells); ?>;
            
            // Function to update heroes, troops, and spells
            function updateUnits(units, unitClass) {
                units.forEach(function(unit) {
                    // Find all elements with class 'unitname'
                    var unitNameElements = document.querySelectorAll('.' + unitClass);
                    
                    // Iterate through the found elements
                    unitNameElements.forEach(function(unitNameElement) {
                        if (unitNameElement.textContent.trim().toUpperCase() === unit.name.toUpperCase()) {
                            // Find the corresponding level element
                            var levelElement = unitNameElement.nextElementSibling;
                            
                            if (levelElement && levelElement.classList.contains('level')) {
                                // Update the text content of the level element
                                levelElement.textContent = 'LEVEL ' + unit.level;
                                // Remove the .unlock class from the parent element
                                var parentElement = levelElement.parentNode;
                                parentElement.classList.remove('unlock');
                            }
                        }
                    });
                });
            }
            
            // Update heroes
            updateUnits(heroesData, 'heroname');
            
            // Update troops
            updateUnits(troopsData, 'troopname');
            
            // Update spells
            updateUnits(spellsData, 'spellname');
        });
    </script>
</body>
</html>
