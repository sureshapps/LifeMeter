<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neumorphism Form</title>
    <!-- Inter font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN for basic utilities -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom CSS for Neumorphism and Theme Toggling */
        :root {
            /* Light Theme Colors */
            --bg-light: #FFFACD; /* Lemon Chiffon - light yellow */
            --primary-light: #FFD700; /* Gold */
            --text-light: #333333;
            --shadow-light-1: rgba(255, 255, 255, 0.7); /* White for top/left */
            --shadow-light-2: rgba(200, 180, 0, 0.5); /* Darker yellow for bottom/right */
            --input-bg-light: #FFFBEB; /* Slightly lighter yellow for input */

            /* Dark Theme Colors */
            --bg-dark: #330000; /* Dark red/maroon */
            --primary-dark: #FF4500; /* OrangeRed for contrast */
            --text-dark: #F0F0F0;
            --shadow-dark-1: rgba(100, 0, 0, 0.7); /* Lighter red for top/left */
            --shadow-dark-2: rgba(0, 0, 0, 0.7); /* Black for bottom/right */
            --input-bg-dark: #220000; /* Slightly darker red for input */

            /* Default to Light Theme */
            --bg-color: var(--bg-light);
            --primary-color: var(--primary-light);
            --text-color: var(--text-light);
            --shadow-color-1: var(--shadow-light-1);
            --shadow-color-2: var(--shadow-light-2);
            --input-bg: var(--input-bg-light);
        }

        /* Dark Mode Class */
        body.dark-mode {
            --bg-color: var(--bg-dark);
            --primary-color: var(--primary-dark);
            --text-color: var(--text-dark);
            --shadow-color-1: var(--shadow-dark-1);
            --shadow-color-2: var(--shadow-dark-2);
            --input-bg: var(--input-bg-dark);
        }

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
            padding: 20px; /* Add some padding for mobile */
            box-sizing: border-box;
        }

        #content {
            background-color: var(--bg-color);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 10px 10px 20px var(--shadow-color-2),
                        -10px -10px 20px var(--shadow-color-1);
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 400px; /* Max width for better form appearance */
            width: 100%; /* Ensure it takes full width on smaller screens */
            box-sizing: border-box;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        #form {
            width: 100%;
        }

        .age input[type="number"] {
            width: 100%;
            padding: 15px 20px;
            margin-bottom: 25px;
            border: none;
            border-radius: 15px;
            background-color: var(--input-bg);
            color: var(--text-color);
            font-size: 1.1em;
            outline: none;
            box-shadow: inset 5px 5px 10px var(--shadow-color-2),
                        inset -5px -5px 10px var(--shadow-color-1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
            box-sizing: border-box; /* Include padding in width */
        }

        .age input[type="number"]::placeholder {
            color: var(--text-color);
            opacity: 0.7;
        }

        .age input[type="number"]:focus {
            box-shadow: inset 3px 3px 7px var(--shadow-color-2),
                        inset -3px -3px 7px var(--shadow-color-1),
                        0 0 0 2px var(--primary-color); /* Highlight on focus */
        }

        .submitform input[type="submit"] {
            width: 100%;
            padding: 15px 20px;
            border: none;
            border-radius: 15px;
            background-color: var(--primary-color);
            color: var(--text-light); /* Keep text dark for contrast on yellow/red */
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            box-shadow: 6px 6px 12px var(--shadow-color-2),
                        -6px -6px 12px var(--shadow-color-1);
            transition: all 0.2s ease;
        }

        .submitform input[type="submit"]:hover {
            box-shadow: 3px 3px 6px var(--shadow-color-2),
                        -3px -3px 6px var(--shadow-color-1);
            transform: translateY(1px);
        }

        .submitform input[type="submit"]:active {
            box-shadow: inset 3px 3px 6px var(--shadow-color-2),
                        inset -3px -3px 6px var(--shadow-color-1);
            transform: translateY(2px);
        }

        /* Toggle Switch Styling */
        .theme-switch-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            gap: 10px;
            font-size: 0.9em;
            color: var(--text-color);
            transition: color 0.3s ease;
        }

        .theme-switch {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            background-color: var(--shadow-color-2); /* Darker shadow for slider track */
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: 0.4s;
            border-radius: 34px;
            box-shadow: inset 2px 2px 5px var(--shadow-color-2),
                        inset -2px -2px 5px var(--shadow-color-1);
        }

        .slider:before {
            background-color: var(--primary-color); /* Primary color for the thumb */
            bottom: 4px;
            content: "";
            height: 26px;
            left: 4px;
            position: absolute;
            width: 26px;
            transition: 0.4s;
            border-radius: 50%;
            box-shadow: 2px 2px 5px var(--shadow-color-2),
                        -2px -2px 5px var(--shadow-color-1);
        }

        input:checked + .slider {
            background-color: var(--primary-color); /* Primary color for track when checked */
            box-shadow: inset 2px 2px 5px var(--shadow-color-2),
                        inset -2px -2px 5px var(--shadow-color-1);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
            background-color: var(--bg-color); /* Background color for thumb when checked */
            box-shadow: 2px 2px 5px var(--shadow-color-2),
                        -2px -2px 5px var(--shadow-color-1);
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            #content {
                padding: 20px;
                border-radius: 15px;
                box-shadow: 8px 8px 16px var(--shadow-color-2),
                            -8px -8px 16px var(--shadow-color-1);
            }

            .age input[type="number"],
            .submitform input[type="submit"] {
                padding: 12px 15px;
                font-size: 1em;
                border-radius: 12px;
            }

            .theme-switch-wrapper {
                font-size: 0.8em;
            }

            .theme-switch {
                height: 30px;
                width: 50px;
            }

            .slider:before {
                height: 22px;
                width: 22px;
                bottom: 4px;
                left: 4px;
            }

            input:checked + .slider:before {
                transform: translateX(16px);
            }
        }
    </style>
</head>
<body>
    <div id="content">
        <div class="theme-switch-wrapper">
            <span>Light Mode</span>
            <label class="theme-switch">
                <input type="checkbox" id="theme-toggle">
                <span class="slider"></span>
            </label>
            <span>Dark Mode</span>
        </div>

        <div id="form">
            <form name="lookup" method="get" action="query.php">
                <div class="age">
                    <input type="number" name="age" min="0" max="100" required placeholder="How Old Are You?">
                </div> <!-- end age div -->

                <div class="submitform">
                    <input type="submit" value="Submit">
                </div><!--end submitform div -->
            </form>
        </div> <!--end form div -->
    </div> <!--end content div -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('theme-toggle');
            const body = document.body;

            // Function to set the theme
            const setTheme = (isDarkMode) => {
                if (isDarkMode) {
                    body.classList.add('dark-mode');
                    themeToggle.checked = true;
                } else {
                    body.classList.remove('dark-mode');
                    themeToggle.checked = false;
                }
            };

            // Check for saved theme preference in localStorage
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                setTheme(true);
            } else {
                setTheme(false); // Default to light if no preference or 'light'
            }

            // Listen for changes on the toggle switch
            themeToggle.addEventListener('change', () => {
                if (themeToggle.checked) {
                    setTheme(true);
                    localStorage.setItem('theme', 'dark');
                } else {
                    setTheme(false);
                    localStorage.setItem('theme', 'light');
                }
            });
        });
    </script>
</body>
</html>