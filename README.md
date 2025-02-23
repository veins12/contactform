Contact Form Project
>> A simple contact form to collect user inputs like name, email, and message. It includes basic form validation and sends the data to a backend or email service.

Steps to Run
Step 1: CLone The Repository - git clone <repository_url>
cd <project_folder>

Step 2: Set up the environment
  >>Make sure your web server (Apache/Nginx) and PHP are installed.
  >>Ensure you have access to an SMTP server to send emails.


Step 3: Configure SMTP settings
Open send_email.php and update the SMTP settings with your email credentials:
  >>$mail->Host = 'smtp.yourmailserver.com';
$mail->Username = 'your-email@example.com';
$mail->Password = 'your-email-password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;


Step 4: Run the project locally -If using XAMPP, place the project folder in the htdocs  directory.
Start the Apache and MySQL services.

Step 5: Open the form in a browser
Navigate to http://localhost/contact_form (or the path where your project is saved) and fill out the form.
