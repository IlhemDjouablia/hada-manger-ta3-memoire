<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idm']) && isset($_SESSION['namem'])) {
    $id=$_GET['id'];
    if (isset($id)) {

        $sql = "SELECT * FROM request INNER JOIN student ON student.id_student = request.id_student where intern_name='$id'";  
        $result = mysqli_query($conn, $sql);  
        
$co=0;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
  
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}



#ATTESTATION{
    display: none;
}
#ATTESTATION h1 {
font-size: 2rem;
text-align: center;
margin-bottom: 1cm;;
letter-spacing: 2px;
color: rgb(147, 8, 211);
}
#ATTESTATION h3{
font-weight: 400;
margin-top: 2cm;
    font-size: 1.6rem;
    text-align: center;
    margin-bottom: 0.3cm;
    color:#828486;
}
.ATTESTATION{
    letter-spacing: 0.7px;
   
   font-size: 1.8rem;
   
}
.infoatt{
    margin-bottom: 0.4cm;
    color:#828486;
}
.infoatt span{
    color: #8041f5ab;
}
.deaux{
    margin-top: 1cm;
    margin-bottom: 1cm;
    display: flex;
}
.deaux .infoatt3{
    width: 300px;
    margin-left: 1cm;
    color:#828486;
}
.deaux .infoatt4{
    margin-left: 4cm;
    width: 300px;
    color:#828486;
}
.infoatt2{
    margin-left: 9cm;
    color:#828486;
}
.line{
    margin-top: 2cm;
    border-bottom: .15rem solid rgba(0, 0, 0, 0.616);
    width: 100%;
   
}
.fin{
  
    margin-top: 0.3;
    font-weight: 480;
    color:#828486;
}

.bgt88{
    display: inline-block;
    background-color:  #8B73FF;
    color: white;
    padding: 1rem 1.5rem;
    border-radius: .5rem;
    font-weight: 600;
    transition: .3s;
    border: none;
  }
  
  .bgt88:hover{
    background-color: #539bde;
  }
  
  .bgt88-link{
    background: none;
    padding: 0;
    color: #8B73FF;
  }
  
  .bgt88-link:hover{
    background-color: transparent;
    color: var(--first-color-alt);
  }
    .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
    </style>
 </head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="img/lgogoo2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li ><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li ><a href="request.php"><i class='bx bx-send' style="font-size: 2rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li ><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                    <li class="active"><a href="intern.php" data-section="company">
                        <i class="fa-solid fa-briefcase"></i>
                            <div class="title">internships</div>
                        </a></li>

                    <li><a href="contact.php"  data-section="contact">
                        <i class="fa-solid fa-message"></i>
                            <div class="title">Contact</div>
                        </a></li> 

                    
                  
                </ul>
            </nav>
        </aside>
    <!--end sidebar//////////////////////////////////////////////////-->
    <main class="content">
        <!--start header ////////////////////////////////////////////////-->
        <header>
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="toggle-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #537bc1;"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">

                <div class="dropdown dt">
    <div class="star-container bell">
        <i class='bx bx-bell'></i>
        <span class="count" style="	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid white;
	background: #fe3232d8;
	color: white;
	font-weight: 700;
	font-size: 12px;
	display: none;
	justify-content: center;
	align-items: center;
    display: flex;"></span>
      </div>
    <div class="dropdown-content ">

    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function load_unseen_notification(view = '') {
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: { view: view },
				dataType: "json",
				success: function(data) {
					$('.dropdown-content').html(data.notification);
					if (data.unseen_notification > 0) {
						$('.count').html(data.unseen_notification);
						$('.count').css('display', 'flex');
					} else {
						$('.count').html('');
						$('.count').css('display', 'none');
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
			$('.count').css('display', 'none');
			load_unseen_notification('yes');
		});

		setInterval(function() {
			load_unseen_notification();
		}, 5000);
	});
</script>
              <div class="star-container chat">
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <img src="img/<?=$_SESSION['pm']?>" alt="avatar" style="height: 45px ;width:45px ;">
                </div>
            </div>
        </header>    
        <?php
        if (isset($_POST['print'])) {
            $idst=$_POST['print'];
            $sql2 = "SELECT * FROM request INNER JOIN student ON student.id_student = request.id_student WHERE request.id_student='$idst'";
            $result2 = mysqli_query($conn, $sql2);
           $tst = mysqli_fetch_array($result2);

            // Assign the selected row's data to variables
            $manager =$tst['manager'];
            $internName =$tst['intern_name'];
            $studentName =$tst['firstname_student'] . " " .$tst['lastname_student'];
            $birthday =$tst['birthday_student'];
            $faculty = "Faculté des Nouvelles Technologies NTIC de Constantine";
            $department =$tst['dep_student'];
            $speciality =$tst['speciality_student'];
            $companyName =$tst['name_comp'];
            $startDate =$tst['str_date'];
            $endDate =$tst['end_date'];
            $companyAddress =$tst['add_comp'];

            echo "<style>#ATTESTATION{display:block;}</style>";
            echo '<script>window.onload = function() { 
                window.print(); 
                document.getElementById("Certificate").style.display = "none"; 
                document.getElementById("bgthh").style.display = "none"; 
                document.getElementById("bgthhh").style.display = "none"; 
                document.querySelector("header").style.display = "none";
                document.querySelector("footer").style.display = "none";
            }</script>';
        }
        ?>

        <section id="Certificate" class="page-section">
        <div class="home__title" style="font-size: 1.6rem;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.6rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;">Certificate </span></div> 
            <div class="table__header">
            <a href="intern.php" data-section="profile"> <button class="create-rq"> <i class="fa-solid fa-arrow-left"></i>&nbsp;back</button> </a>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr class="score-card themecar">
                            <th>ID<span class="icon-arrow">&UpArrow;</span></th>
                            <th>student<span class="icon-arrow">&UpArrow;</span></th>
                            <th>Email<span class="icon-arrow">&UpArrow;</span></th>
                            <th>Action<span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr class="score-card">
                                <td><br><?= $co = $co + 1; ?></td>
                                <td><img src="../student/img/<?= $row['profile_student'] ?>"> <?= $row['firstname_student'] . " " . $row['lastname_student'] ?></td>
                                <td><br><?= $row['email_student'] ?></td>
                              
                                <td><br>
                                    <form method="post">
                                        <button type="submit" name="print" value="<?= $row['id_student'] ?>" class="rq-btn"><i class='bx bx-printer bx-tada'></i> &nbsp;print</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="ATTESTATION">
            <h3>République Algérienne Démocratique et Populaire</h3>
            <h1>ATTESTATION DE STAGE</h1>
            <div class="ATTESTATION">
                <div class="infoatt">
                    <p>Je, soussigné(e) <span><?= $manager ?>    </span>   responsable de stage de <span><?= $internName ?></span></p>
                </div>
                <div class="infoatt">
                    <p>atteste que l'étudiant(e) <span><?= $studentName ?>      </span>    né(e) le <span><?= $birthday ?></span> à <span>25</span></p>
                </div>
                <div class="infoatt">
                    <p>inscrit(e) à <?= $faculty ?></p>
                </div>
                <div class="infoatt">
                    <p>a effectué un stage de formation dans la filière / spécialité <span>  <?= $department ?>/<?= $speciality ?>     </span></p>
                </div>
                <div class="infoatt">
                    <p>à <span><?= $companyName ?></span></p>
                </div>
                <div class="infoatt">
                    <p>Durant la période du <span><?= $startDate ?>    </span> au <span><?= $endDate ?></span></p>
                </div>
                <div class="infoatt2">
                    <p>Fait à <span><?= $companyAddress ?></span>   le <span>   <?= date('d/m/Y') ?></span></p>
                </div>

                <div class="deaux">
                    <div class="infoatt3">
                        <p>Le Représentant de Faculté des Nouvelles Technologies NTIC de Constantine</p>
                    </div>
                    <div class="infoatt4">
                        <p>Le Responsable de l'établissement ou de l'administration d'accueil</p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="fin">Cette attestation est délivrée pour servir et faire valoir ce que de droit</div>
        </section>
        




<br><br><br>
        <footer>
            <div class="copyright">
                copyright &copy; 2023 | Staget made with ❤️ by girls team | all right reserved.
            </div>
        </footer>


    </main>
   </div>

    <div class="switcher-container" id="bgthh">
        <div class="switcher-icon">
            <i class="fas fa-cog"></i>
        </div>
        <div class="switcher-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="switcher-header">
            <h3>theme customizer</h3>
            <h4>theme styles</h4>
        </div>
        <div class="switcher-body">
            <ul>
                <li data-color="#f7f7f7" class="active"></li>
                <li data-color="#212529"></li>
            </ul>
        </div>
    </div>
    <div id="bgthhh">
    <a href="#top" class="scroll-top" >
        <i class="fas fa-arrow-up"></i>
    </a>
    </div>
    
 
    <script>
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const activeListItem = document.querySelector(".submenu li.active");

    dropdownToggle.addEventListener("click", function (event) {
        event.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("open");
    });

    // Check if there is an active list item and keep the dropdown open
    if (activeListItem) {
        const parentDropdown = activeListItem.closest(".submenu");
        const parentLi = parentDropdown.parentElement;
        parentLi.classList.add("open");
    }
</script>


<script>
        window.onafterprint = function() {
            document.getElementById("Certificate").style.display = "block";
            document.getElementById("ATTESTATION").style.display = "none";
            document.querySelector("header").style.display = "block";
                document.querySelector("footer").style.display = "block";
                document.getElementById("bgthh").style.display = "block"; 
                document.getElementById("bgthhh").style.display = "block"; 
        };
    </script>



</body>
</html>
<?php 
                }else{
                     header("Location: ../login.php");
                     exit();
                }}
                 ?>
 