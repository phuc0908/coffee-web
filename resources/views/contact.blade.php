<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact Mochii</title>
    <link rel="shortcut icon" href="img/logo_Mochii.png" type="img/icon" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    textarea::-webkit-scrollbar {
        width: 10px;
        /* Độ rộng của thanh cuộn */
        background: transparent;
        /* Màu nền của thanh cuộn */
    }

    textarea::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.2);
        /* Màu của nút cuộn */
        border-radius: 10px;
    }
</style>

<body>
    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Bo Trach, Quang Binh</div>
                    <div class="text-two">Vietnam</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">089-8865-456</div>
                    <div class="text-two">082-2734-103</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">phuc@gmail.com</div>
                    <div class="text-two">phucnh.22itb@vku.udn.vn</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">
                        <textarea style="box-sizing: border-box; overflow-y: scroll;" name="" id="" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" value="Send Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>