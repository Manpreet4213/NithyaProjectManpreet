<?php
include 'header3.php';
?>
<?php
session_start();
if(isset($_POST['Login'])){
    //get values from form and assign to local variable
    $user = $_POST['username'];
    $pass = $_POST['password'];

    //connect to db and see if username and password matches
    $dbuser = 'nithya';
    $dbpass = '1234';

    //create a session if user exist
    if($user == $dbuser && $pass == $dbpass){
        $_SESSION['username'] = $dbuser;
        $_SESSION['password'] = $dbpass;

        header('Location: home.php');
    } else {
        echo "Invalid Login Credentials";
    }

}
?>

<!--------------------- main --------------------------->
    <main id="main_content">
        <img id ="room" src="../images/PROJECT_TASKLIST4/home.jpg" alt="image for restaurant home page" />
        <img id="home" src="../images/PROJECT_TASKLIST4/sandals-grenada-pool.jpg" alt="image of reataurant background " />
        <div id="qoute">
            <img id="pattern" src="../images/PROJECT_TASKLIST4/background.png" width="1410" alt="image of a pattern"/>
            <!--<p class="p1">You'll feel great at the moment you walk through our doors.</p><p class="p2"> Rediscover that classic resort experience-the friendly service with us.</p>
-->
        </div>
        <div >

            <!-------------YOUR PART------------------>
            <h1>Hey admin, add your username and password to go further.</h1>
            <form action="" method="post">

                    <div class="form-group">
                        <label for="name">Username :</label>
                        <input type="text" class="form-control" name="username" id="username" value=""
                               placeholder="Enter username">
                        <span style="color: red">

            </span>
                    </div>
                    <div class="form-group">
                        <label for="date">Password :</label>
                        <input type="text" class="form-control" id="password" name="password"
                               value="" placeholder="Enter password">
                        <span style="color: red">

            </span>
                    </div>
                    <button type="submit" name="Login"
                            class="btn btn-primary float-right" id="btn-submit">
                        LOGIN
                    </button>
            


            </form>

            <div id="output"></div>

        </div>
    </main>
    <section id="contact">
        <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
    </section>

<?php
include 'footerAdmin.php';
?>

