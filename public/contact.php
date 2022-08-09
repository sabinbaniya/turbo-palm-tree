<?php
if (isset($_POST["submit"])) {
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $mobile = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require_once("./courses/send_email.php");
    require_once("./db/connectDB.php");

    if ($stmt = $conn->prepare("INSERT INTO contact_form_submissions (name, mobile,subject, message,email) VALUES (?,?,?,?,?)")) {
        $stmt->bind_param("sssss", $name, $mobile, $subject, $message, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $res = send_contact_email($name, $email, $subject, $mobile, $message);
            if ($res) {
                header("Location: ./?formsubmitted=true");
            } else {
                header("Location: ./?formsubmitted=false");
            }
        } else {
            header("Location: ./?formsubmitted=false");
        }
    } else {
        header("Location: ./?formsubmitted=false");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Pixel IT Magic Solutions</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="max-w-[1400px] xl:mx-auto mx-4">
        <div class="my-8 space-y-4">
            <h3 class="text-center font-bold text-2xl md:text-4xl text-gray-800">Get in touch!</h3>
            <p class="text-lg text-gray-500 text-center">Contact Us for, any queries that you may have.</p>
            <div class="flex justify-between items-stretch max-w-2xl mx-auto space-x-6 pt-8">
                <div class="bg-blue-50 h-36 w-60 hover:bg-blue-500 hover:text-white cursor-default transiton-all grid place-items-center gap-4 py-6 rounded-lg">
                    <i class="fa-solid fa-location-dot fa-2xl"></i>
                    <p>Pokhara 33700, Nepal</p>
                </div>
                <div class="bg-blue-50 h-36 w-60 hover:bg-blue-500 hover:text-white cursor-default transiton-all grid place-items-center gap-4 py-6 rounded-lg">
                    <i class="fa-solid fa-phone fa-2xl"></i>
                    <p>+061-34124</p>
                </div>
                <div class="bg-blue-50 h-36 w-60 hover:bg-blue-500 hover:text-white cursor-default transiton-all grid place-items-center gap-4 py-6 rounded-lg">
                    <i class="fa-solid fa-envelope fa-2xl"></i>
                    <p>info@website.com</p>
                </div>
            </div>
            <div class="pt-8">
                <form action="./contact.php" method="POST" class="p-8 space-y-6 max-w-2xl mx-auto">
                    <div class="flex justify-between items-center space-x-4">
                        <div class="relative w-full ">
                            <input type="text" name="full_name" required autocomplete="off" class="w-full peer bg-transparent border-2 border-gray-400 rounded-md focus:border-gray-600 focus:outline-none pl-6 pr-2 py-2" placeholder=" ">
                            <p class="absolute cursor-text -top-3 left-2 px-2 peer-placeholder-shown:top-2 peer-placeholder-shown:-z-10 z-10 peer-focus:z-10 peer-focus:-top-3 transition-all bg-white text-sm peer-placeholder-shown:text-base peer-focus:text-sm inline duration-300">Full Name</p>
                        </div>
                        <div class="relative w-full">
                            <input type="email" name="email" required autocomplete="off" class="w-full peer bg-transparent border-2 border-gray-400 rounded-md focus:border-gray-600 focus:outline-none pl-6 pr-2 py-2" placeholder=" ">
                            <p class="absolute cursor-text -top-3 left-2 px-2 peer-placeholder-shown:top-2 peer-placeholder-shown:-z-10 z-10 peer-focus:z-10  peer-focus:-top-3 transition-all bg-white text-sm peer-placeholder-shown:text-base peer-focus:text-sm inline duration-300">Email</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center space-x-4">
                        <div class="relative w-full">
                            <input type="tel" name="phone" required autocomplete="off" class="w-full peer bg-transparent border-2 border-gray-400 rounded-md focus:border-gray-600 focus:outline-none pl-6 pr-2 py-2" placeholder=" ">
                            <p class="absolute cursor-text -top-3 left-2 px-2 peer-placeholder-shown:top-2 peer-placeholder-shown:-z-10 z-10 peer-focus:z-10  peer-focus:-top-3 transition-all bg-white text-sm peer-placeholder-shown:text-base peer-focus:text-sm inline duration-300">Mobile</p>
                        </div>
                        <div class="relative w-full">
                            <input type="text" name="subject" required autocomplete="off" class="w-full peer bg-transparent border-2 border-gray-400 rounded-md focus:border-gray-600 focus:outline-none pl-6 pr-2 py-2" placeholder=" ">
                            <p class="absolute cursor-text -top-3 left-2 px-2 peer-placeholder-shown:top-2 peer-placeholder-shown:-z-10 z-10 peer-focus:z-10  peer-focus:-top-3 transition-all bg-white text-sm peer-placeholder-shown:text-base peer-focus:text-sm inline duration-300">Subject</p>
                        </div>
                    </div>
                    <div class="relative w-full">
                        <textarea required autocomplete="off" name="message" style="resize: none;" rows="5" class="w-full peer bg-transparent border-2 border-gray-400 rounded-md focus:border-gray-600 focus:outline-none px-4 py-2 width-full" placeholder=" "></textarea>
                        <p class="absolute cursor-text -top-3 left-2 px-2 peer-placeholder-shown:top-2 peer-placeholder-shown:-z-10 z-10 peer-focus:z-10 peer-focus:-top-3 transition-all bg-white text-sm peer-placeholder-shown:text-base peer-focus:text-sm inline duration-300">Message</p>
                    </div>
                    <div class="flex justify-center items-center">
                        <input type="submit" id="btn" name="submit" value="Send Now" class="rounded-md px-8 py-2 text-white font-bold bg-blue-500 cursor-pointer hover:bg-blue-400" />
                    </div>
                </form>
            </div>
        </div>

    </section>
    <?php require_once("./include/footer.php") ?>
</body>

</html>