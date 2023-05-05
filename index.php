<?php

$section = $_REQUEST['section'] ?? 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <section class="hero">
        <h1>
            YourService.ai
        </h1>
        <p>Unlock Your Potential with AI - The AI-Powered Spiritual Companion.</p>
    </section>

    <section class="msger">
        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url(./assets/images/robot.png)">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">AI BOT</div>
                        <div class="msg-info-time">12:45</div>
                    </div>

                    <div class="msg-text">
                        Hi, welcome to SimpleChat! Go ahead and send me a message. ðŸ˜„
                    </div>
                </div>
            </div>

            <!-- <div class="msg right-msg">
                <div class="msg-img" style="background-image: url(./assets/images/robot.png)">
                </div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">AI Bot</div>
                        <div class="msg-info-time">12:46</div>
                    </div>

                    <div class="msg-text">
                        Hay, How can I help you ?
                    </div>
                </div>
            </div> -->
        </main>

        <div class="sugessions">
            <h1>Suggestions:</h1>
            <div class="sugessions-items" id="sugessions-items">
                <a href="#"><span>What is life's purpose?</span></a>
                <a href="#"><span>What is life's </span></a>
                <a href="#"><span>What is </span></a>
                <a href="#"><span>life's purpose?</span></a>
                <a href="#"><span>What is life's purpose?</span></a>
                <a href="#"><span> life's purpose?</span></a>
                <a href="#"><span>What is life's purpose?</span></a>
                <a href="#"><span>What is life's purpose?</span></a>
                <a href="#"><span>What is life's purpose?</span></a>
            </div>
        </div>
        <form class="msger-inputarea">
            <input type="text" class="msger-input" placeholder="Enter your message...">
            <label for="file-input" class="msger-file-label">
                <i class="fas fa-file-contract"></i>
            </label>
            <input type="file" class="msger-input-file" id="file-input">
            <button type="submit" class="msger-send-btn"><i class="far fa-paper-plane"></i></button>
        </form>
    </section>

        <section>
            <div class="login center">
                <div class="login-container">
                    <label for="show" class="close-btn fas fa-times" title="close"></label>
                    <div class="text">
                        Login Form
                    </div>
                    <form action="#">
                        <div class="data">
                            <input type="text" placeholder="Email" required>
                        </div>
                        <div class="data">
                            <input type="password" placeholder="Password" required>
                        </div>
                        <div class="btn">
                            <div class="inner"></div>
                            <button type="submit">login</button>
                        </div>
                        <div class="signup-link">
                            Not a member? <a href="#" class="signup-btn">Signup now</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section>
            <div class="registration center">
                <div class="registration-container">
                    <label for="show" class="close-btn fas fa-times" title="close"></label>
                    <div class="text">
                        Register Form
                    </div>
                    <form action="login_reg_core.php" method="POST">
                        <div class="data">
                            <input type="text" name="fname" placeholder="Full Name" required>
                        </div>
                        <div class="data">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="data">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="btn">
                            <div class="inner"></div>

                            <input type="hidden" name="action" value="registration">
                            <button type="submit">registration</button>
                        </div>
                        <div class="signup-link">
                            Have a account? <a href="#" class="login-btn">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const msgerForm = $(".msger-inputarea");
        const msgerInput = $(".msger-input");
        const msgerInputFile = $(".msger-input-file");
        const msgerChat = $(".msger-chat");
        const login = $(".login");
        const registration = $(".registration");
        const loginBtn = $(".login-btn");
        const signupBtn = $(".signup-btn");
        const closeBtn = $(".close-btn");

        signupBtn.click(function() {
            login.hide();
            registration.show();
        });

        loginBtn.click(function() {
            registration.hide();
            login.show();
        });

        closeBtn.click(function() {
            registration.hide();
            login.hide();
        });



        const BOT_MSGS = [
            "Hi, how are you?",
            "Ohh... I can't understand what you trying to say. Sorry!",
            "I like to play games... But I don't know how to play!",
            "Sorry if my answers are not relevant. :))",
            "I feel sleepy! :("
        ];

        const PERSON_IMG = "./assets/images/user-avatar.png";
        const BOT_IMG = "./assets/images/robot.png";
        const BOT_NAME = "AI BOT";
        const PERSON_NAME = "CLIENT";

        msgerForm.on("submit", function(event) {
            event.preventDefault();

            login.show();


            const msgText = msgerInput.val();
            const binary_pdf_file = msgerInputFile[0].files[0];

            if (!msgText) return;
            appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
            msgerInput.val("");

            // Create a FormData object
            var formData = new FormData();
            formData.append("query", msgText);
            formData.append("file", binary_pdf_file);

            // Make the AJAX request
            $.ajax({
                url: "https://chatapi.onlinewithyou.nl:5001",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    console.log(jqXHR, textStatus, errorMessage);
                }
            });

            botResponse();

            header("location:index.php?success");

        });

        function appendMessage(name, img, side, text) {
            //   Simple solution for small apps
            const msgHTML = `
            <div class="msg ${side}-msg">
              <div class="msg-img" style="background-image: url(${img})"></div>
              <div class="msg-bubble">
                <div class="msg-info">
                  <div class="msg-info-name">${name}</div>
                  <div class="msg-info-time">${formatDate(new Date())}</div>
                </div>
                <div class="msg-text">${text}</div>
              </div>
            </div>
          `;

            msgerChat.append(msgHTML);
            msgerChat.scrollTop(msgerChat.prop("scrollHeight"));
        }

        function botResponse() {
            const r = random(0, BOT_MSGS.length - 1);
            const msgText = BOT_MSGS[r];
            const delay = msgText.split(" ").length * 100;

            setTimeout(() => {
                appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
            }, delay);
        }

        // Sugge
        const suggestionItems = $('#sugessions-items a');
        const inputField = $('.msger-input');

        suggestionItems.each(function() {
            $(this).on('click', function(event) {
                const span = $(event.currentTarget).find('span');
                const spanValue = span.text();
                inputField.val(spanValue);
            });
        });

        // Utils
        function formatDate(date) {
            const h = "0" + date.getHours();
            const m = "0" + date.getMinutes();

            return `${h.slice(-2)}:${m.slice(-2)}`;
        }

        function random(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }
    </script>
</body>

</html>