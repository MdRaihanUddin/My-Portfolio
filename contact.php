<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process form submission
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $visitor_email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        // If all inputs are empty, display an error message
        if ($name == '' || $phone == '' || $visitor_email == '' || $subject == '' || $message == '') {
            // $error_message = "All form inputs are required.";
            $error_message = "<script type='text/javascript'>
                var demo = document.querySelector('.demo');
                demo.innerText = 'All form inputs are required.';
                demo.classList.add('error');
                setTimeout(() => {
                    demo.classList.remove('error');
                }, 6000);
            </script>";
        } else {
    
            // Example: Send email with form data
            $email_from = 'Portfolio@gmail.com';
            $email_subject = 'New Form Submission, '.$subject;
            $email_body = "Name: $name.\n".
                            "Phone: $phone.\n".
                                "Email: $visitor_email.\n".
                                    "Subject: $subject.\n".
                                        "Message: $message.\n";

            $to = "rnbd929@gmail.com"; // Your email
            $headers = "From: $email_from \r\n";
            $headers .= "Replay-To: $visitor_email \r\n";
    
            if (mail($to,$email_subject,$email_body,$headers)) {
                // $success_message = "Form submitted successfully!";
                $success_message = "<script type='text/javascript'>
                    document.querySelector('#contact-form').reset();
                    var demo = document.querySelector('.demo');
                    demo.innerText = 'Message send successfully!';
                    demo.classList.add('success');
                    setTimeout(() => {
                        demo.classList.remove('success');
                        location.href = 'contact.php';
                    }, 6000);
                </script>";
            } else {
                // $error_message = "Failed to send email.";
                $error_message = "<script type='text/javascript'>
                    var demo = document.querySelector('.demo');
                    demo.innerText = 'Failed to send email.';
                    demo.classList.add('error');
                    setTimeout(() => {
                        demo.classList.remove('error');
                    }, 6000);
                </script>";
            }
        }
        // header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Md Raihan Uddin</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url(images/bg-texture.png);
        }
    </style>
    <!-- google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
</head>

<body>

    <!-- navbar section starts -->
    <nav class="navbar">
        <a href="index.html"><i class="fas fa-home"></i><span>home</span></a>
        <a href="about.html"><i class="fas fa-user"></i><span>about</span></a>
        <a href="portfolio.html"><i class="fas fa-briefcase"></i><span>portfolio</span></a>
        <a href="blogs.html"><i class="fas fa-blog"></i><span>blogs</span></a>
        <a href="contact.php"><i class="fas fa-address-book"></i><span>contact</span></a>
    </nav>
    <!-- navbar section ends -->

    <!-- contact section starts -->
    <section class="contact">
        <h1 class="heading">contact <span>me</span></h1>

        <div class="row">
            <div class="info-container">
                <h1>get in tuch</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nostrum temporibus enim velit non
                    reiciendis molestias atque ab autem laborum!</p>

                <div class="box-container">
                    <div class="box">
                        <i class="fas fa-map"></i>
                        <div class="info">
                            <h3>address :</h3>
                            <!-- <p>Ctg, Bangladesh - 324502</p> -->
                            <p>chittagong, bangladesh - 4210</p>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <h3>email :</h3>
                            <p>RnBD929@Gmail.Com</p>
                        </div>
                    </div>

                    <div class="box">
                        <i class="fas fa-phone"></i>
                        <div class="info">
                            <h3>number :</h3>
                            <p>+123-456-7890</p>
                        </div>
                    </div>
                </div>

                <div class="share">
                    <a href="https://facebook.com/Raihan929" class="fab fa-facebook-square" target="_blank"
                        title="Facebook"></a>
                    <a href="https://twitter.com/Raihan_929" class="fab fa-twitter-square" target="_blank"
                        title="Twitter"></a>
                    <a href="https://instagram.com/Raihan__929" class="fab fa-instagram-square" target="_blank"
                        title="Instagram"></a>
                    <a href="https://linkedin.com/in/Raihan929" class="fab fa-linkedin" target="_blank"
                        title="LinkedIn"></a>
                    <a href="https://api.whatsapp.com/send?phone=+8801863266929" class="fab fa-whatsapp-square"
                        target="_blank" title="WhatsApp"></a>
                </div>
            </div>

            <!-- <form action="https://formspree.io/f/xjvdypbl" method="POST">
                <div class="inputBox">
                    <input type="text" name="Full name" placeholder="Your name" required>
                    <input type="number" name="Phone number" placeholder="Phone number">
                </div>

                <div class="inputBox">
                    <input type="email" name="Email" placeholder="Your email" required>
                    <input type="text" name="Subject" placeholder="Subject" required>
                </div>

                <textarea name="Message" placeholder="Your message" id="" cols="30" rows="10" required></textarea>

                <input type="submit" value="send message" class="btn">
            </form> -->

            <form id="contact-form" action="contact.php" method="POST">

                <p class="demo">This is a message</p>

                <?php if (isset($error_message)) { ?>
                <?php echo $error_message;?>
                <?php }?>

                <?php if (isset($success_message)) { ?>
                <?php echo $success_message;?>
                <?php }?>

                <div class="inputBox">
                    <input type="text" name="name" placeholder="Your name" required>
                    <input type="number" name="phone" placeholder="Phone number">
                </div>

                <div class="inputBox">
                    <input type="email" name="email" placeholder="Your email" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>

                <textarea name="message" placeholder="Your message" id="" cols="30" rows="10" required></textarea>

                <input type="submit" value="send message" class="btn">
            </form>
        </div>
    </section>
    <!-- contact section ends -->

</body>

</html>