<?php
session_start();

if(!isset($_SESSION['password']) ){
    header('Location: login.php');
}
?>

<?php
include 'header4.php';
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
            <h1 class="h1">Welcome back!!!</h1>
            <h2 class="h2">Go and manage the website !!!</h2>
            <!-------------YOUR PART------------------>
            <p class="h1 text-center">Paradise resort</p>
            <p class="h1 text-center">Let us work for image interactivity of the website!!</p>
            <div class="m-1">
                <!--    Displaying Data in Table-->
                <table class="table table-bordered tbl">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">path</th>
                        <th scope="col">date</th>
                        <th scope="col">description</th>
                        <th scope="col">update</th>
                        <th scope="col">delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th>1</th>
                        <td>komla.jpg</td>
                        <td>2019-08-07</td>
                        <td>It is my image.</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="id"/>
                                <input type="submit" class="button btn btn-primary" name="updateImage" value="Update"/>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="id"/>
                                <input type="submit" class="button btn btn-danger" name="deleteImage" value="Delete"/>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <a href="" id="btn_addEvent" class="btn btn-success btn-lg float-right">Add Images</a>


            </div>
        </div>
    </main>
    <section id="contact">
        <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
    </section>

<?php
include 'footerAdmin.php';
?>
