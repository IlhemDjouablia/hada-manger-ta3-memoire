<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idm']) && isset($_SESSION['namem'])) {
    $id=$_GET['id'];
    $date=$_GET['date'];
    if (isset($id) && isset($date)) {

        $sql = "SELECT * FROM att INNER JOIN student ON student.id_student = att.id_student where intern_name='$id' and date ='$date'";  
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
                <img src="send2.png" alt="Logo">
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
        <section id="home-section" class="page-section ">
               
               <div class="table__header">
           <a href="att.php?id=<?=$id?>&date=<?=$date?>" data-section="profile">
               <button class="bgt88">back</button>
           </a>
           <div class="nhar_lyoum">
           <h1>
               <?=$date
              
               ?>
           </h1>
       </div>
       
       
           <form method="post" action="back/updateatt.php">
         
           </div>
           <div class="table__body">
               <table>
                   
                   <thead>
                       <tr class="score-card themecar ">
                           <th>ID<span class="icon-arrow">&UpArrow;</span></th>
                           <th>student<span class="icon-arrow">&UpArrow;</span></th>
                           <th>Email<span class="icon-arrow">&UpArrow;</span></th>
                           <th>attendance<span class="icon-arrow">&UpArrow;</span></th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php
                       while($row = mysqli_fetch_array($result))  
                       {  ?>
                       <tr class="score-card">
                           <td><br><?=$co=$co+1;?></td>
                           <td><img src="../student/img/<?=$row['profile_student']?>"></td>
                           <input type="hidden" name="date" value="<?=$date?>">
                           <input type="hidden" name="id" value="<?=$id?>">
                          
                           <td><br><?=$row['email_student']?></td>
                           <td><br><?=$row['firstname_student']." ".$row['lastname_student']?></td>
                           
                           <?php
                           if ($row['state']=='present') { ?>
                            <td><br>
                            <input type="radio" name="attendance[<?=$co?>]" value="present" id="p<?=$co?>" checked >
                            <label for="p<?=$co?>">Present</label>
                            <input type="radio" name="attendance[<?=$co?>]" value="absent" id="a<?=$co?>">
                            <label for="a<?=$co?>">Absent</label>
                            <input type="hidden" name="idst[<?= $co ?>]" value="<?= $row['id_student'] ?>">
                        </td>
                          
                          <?php }else {?>
                           <td><br>
                           <input type="radio" name="attendance[<?=$co?>]" value="present" id="p<?=$co?>"  >
                           <label for="p<?=$co?>">Present</label>
                           <input type="radio" name="attendance[<?=$co?>]" value="absent" id="a<?=$co?>" checked>
                           <label for="a<?=$co?>">Absent</label>
                           <input type="hidden" name="idatt[<?= $co ?>]" value="<?= $row['id_att'] ?>">
                       </td> 
                        <?php  }
                           ?>
                           
                       </tr>
                       <?php
                       }
                       ?>
                   </tbody>
               </table>
               <div class="row">
                   <button class="bgt88" type="submit">update</button>
               </div>
           </form>
       </div>
       
                         </section>  
<br><br><br>
        <footer>
            <div class="copyright">
                copyright &copy; 2023 | Staget made with ❤️ by girls team | all right reserved.
            </div>
        </footer>


    </main>
   </div>

    <div class="switcher-container">
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
    <a href="#top" class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    
 
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






</body>
</html>
<?php 
                }else{
                     header("Location: ../login.php");
                     exit();
                }}
                 ?>
 