<!DOCTYPE html>
<html>

<head>
    <title>Send Mail</title>
    <script src="https://smtpjs.com/v3/smtp.js">
    </script>

    <script type="text/javascript">
        function sendEmail() {
            Email.send({
                    Host: "smtp.gmail.com",
                    Username: "provisioalert@gmail.com",
                    Password: "gmasata94p",
                    To: "tasilnimashan@gmail.com",
                    From: "provisioalert@gmail.com",
                    Subject: "Provisio - Intelligent Criminal Detector",
                    Body: "Warning: Criminal Detect!!",
                })
                .then(function(message) {
                    alert("mail sent successfully")
                });
        }
    </script>
</head>

<body>
    <form method="post">
        <input type="button" value="Send Email" onclick="sendEmail()" />
    </form>
</body>

</html>