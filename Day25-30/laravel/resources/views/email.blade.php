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
				Username: "KESAVAN V",
				Password: "kesavanvel@7781",
				To: 'kesavanvel77@gmail.com',
				From: "kesavan.2006@srit.org",
				Subject: "Sending Email using javascript",
				Body: "Well that was easy!!",
			})
				.then(function (message) {
					alert("mail sent successfully")
				});
		}
	</script>
</head>

<body>
	<form method="post">
		<input type="button" value="Send Email"
			onclick="sendEmail()" />
	</form>
</body>
</html>