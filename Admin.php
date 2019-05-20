<?php
require_once 'connectionDatabase.php';
session_start();
if (isset($_SESSION['login_user'])) {
    $user = $_SESSION['login_user'];
}

if ( isset( $_POST[ 'categoryTable' ] ) ) {
	$query = "INSERT INTO categorytable(name,status) values('" . $_POST[ 'name' ] . "','" . $_POST[ 'Status' ] . "')";
	$result = $connect->query( $query );
} elseif ( isset( $_POST[ 'questionTable' ] ) ) {
	$question = $_POST[ 'questionName' ];
	$Category = $_POST[ 'Category' ];
	$SubCategory = $_POST[ 'subCategory' ];
	$Option1 = $_POST[ 'AnswerOption1' ];
	$Option2 = $_POST[ 'AnswerOption2' ];
	$Option3 = $_POST[ 'AnswerOption3' ];
	$Option4 = $_POST[ 'AnswerOption4' ];
	$correctOption = $_POST[ 'correctOption' ];
	$level = $_POST[ 'Difficulty' ];

	$query = "INSERT INTO questiontable(questionName,Category,subCategory,AnswerOption1,AnswerOption2,AnswerOption3,AnswerOption4,correctOption,Difficulty) values('$question','$Category','$SubCategory','$Option1','$Option2','$Option3','$Option4','$correctOption','$level')";
	$result = $connect->query( $query );
}
elseif ( isset( $_POST[ 'categoryUpdate' ] ) ) {
	require_once 'connectionDatabase.php';
	$id = $_POST[ 'id' ];
	//        $query="UPDATE categorytable SET status=0 WHERE id='$id'";
	$test1 = "bilaltestinggg";
	$test2 = 0;
	$query = "INSERT INTO categorytable(name,status) values('$test1','$test2')";
	$result = $connect->query( $query );


}
elseif ( isset( $_POST[ 'categoryDelete' ] ) ) {
	require_once 'connectionDatabase.php';
	$id = $_POST[ 'id' ];
	$query = "UPDATE categorytable SET status='' WHERE id='$id'";
	$result = $connect->query( $query );

}
elseif ( isset( $_POST[ 'questionDelete' ] ) ) {
	$id = $_POST[ 'id' ];
	$query = "DELETE from questiontable where id='$id'";
	$result = $connect->query( $query );

}
elseif ( isset( $_POST[ "employee_id" ] ) ) {
	require_once 'connectionDatabase.php';
	$output = '';
	$query = "SELECT * FROM categorytable WHERE id = '" . $_POST[ "employee_id" ] . "'";
	$result = $connect->query( $query );
	$output .= '  
          <div class="table-responsive">  
               <table class="table table-bordered">';
	while ( $row = mysqli_fetch_array( $result ) ) {
		$output .= '  
                    <tr>  
                         <td width="30%"><label>Name</label></td>  
                         <td width="70%"><input type="text" value=""></td>  
                    </tr>  
                    <tr>  
                         <td width="30%"><label>Address</label></td>  
                         <td width="70%">' . $row[ "status" ] . '</td>  
                    </tr>  
                      
                    ';
	}
	$output .= "</table></div>";
	echo $output;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Digital Exam Conduction</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body class="fixed-sn white-skin">
	<!--Main Navigation-->

	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark primary-color">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Exam Conduction</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	








		<!-- Collapsible content -->
		<div class="collapse navbar-collapse" id="basicExampleNav">

			<!-- Links -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
				</li>
				<li class="nav-item">
					<a class="nav-link tablinks tablink" href onClick="openTab(event, 'categoryForm')">Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link tablinks tablink" onClick="openTab(event, 'questionTable')">Question</a>
				</li>
				</li>
				<li class="nav-item">
					<a class="nav-link tablinks tablink" onClick="openTab(event, 'updateTable')" href="#">Update</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Delete</a>
				</li>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Fetch</a>
				</li>
				<li class="nav-item">
					<a class="nav-link tablinks tablink" href="#" onClick="openTab(event, 'contactForm')">Contact</a>
				</li>

				<!-- Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Computer Science</a>
						<a class="dropdown-item" href="#">Software Engineering</a>
						<a class="dropdown-item" href="#">Information Technology</a>
						<hr class="mt5">
						<a class="dropdown-item" href="#">Machine Learning</a>
						<a class="dropdown-item" href="#">Artificial Intelligence</a>
						<a class="dropdown-item" href="#">Robotics</a>
					</div>
				</li>

			</ul>
			<!-- Links -->
		</div>
		<!-- Collapsible content -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">
          <i class="fa fa-facebook-f"></i> Facebook
          <span class="sr-only">(current)</span>
        </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
          <i class="fa fa-instagram"></i> Instagram</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> <?php
				if (! empty($_SESSION['login_user_Name']))
					echo $_SESSION['login_user_Name'];
				?> </a>
					<div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
						<a class="dropdown-item" href="#">My account</a>
						<a class="dropdown-item" href="SessionEnd.php">Log out</a>
					</div>
				</li>
			</ul>
		</div>

	</nav>

	<!--/.Navbar-->
	<!--Admin Data-->
	<div class=" container">
		<div id="categoryForm" class="adminActions">
			<form class="text-center border border-light p-5" action="Admin.php" method="POST">
				<input type="hidden" name="categoryTable" value="categoryTable">

				<p class="h4 mb-4">Add Category</p>

				<p>These Categories are Further used in Question Table for clarifying.</p>

				<p>
					<a href="" target="_blank">See Question Table</a>
				</p>

				<!-- Name -->
				<input type="text" id="name" name="name" class="form-control mb-4" placeholder="Category Name">
				<div class="form-group row">
					<!-- Material input -->
					<label for="inputEmail3MD" class="col-sm-2 col-form-label">Status</label>
					<div class="col-sm-10">

						<select id="status" class="select browser-default custom-select" name="Status">
							<option selected>Open this select menu</option>
							<option value="1">On</option>
							<option value="">Off</option>
						</select>

					</div>
				</div>


				<!-- Sign in button -->
				<button class="btn btn-info btn-block" type="submit" name="submit" value="submit">Sign in</button>


			</form>
		</div>

		<!-- Default form subscription -->

		<!-- Default form subscription -->
	</div>
	<div class=" container">
		<form class="text-center border border-light p-5" action="Admin.php" method="post">
			<input type="hidden" name="questionTable" value="questionTable">
			<div id="questionTable" class="adminActions " style="display:none">
				<h3 align="center">Question Form</h3>
				<!-- Grid row -->
				<div class="form-group row">
					<!-- Default input -->
					<label for="questionName" class="labels">Question</label>
					<div class="col-sm-10">
						<input type="text" class="input form-control mb-4" id="questionName" name="questionName" placeholder="Write down your question ?">
					</div>
				</div>
				<!-- Grid row -->

				<div class="form-group row">
					<label for="Category" class="labels">Category</label>
					<div class="col-sm-10">
						<select id="Category" class=" select browser-default custom-select mb-4" name="Category">
							<option value="Computer Science">Computer Science</option>
							<option value="Software Engineering">Software Engineering</option>
							<option value="Computer Engineering">Computer Engineering</option>
							<option value="Internet Technology">Internet Technology</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="subCategory" class="labels">Sub-Category</label>
					<div class="col-sm-10">
						<select id="subCategory" class=" select browser-default custom-select mb-4" name="subCategory">
							<option value="JAVA">JAVA</option>
							<option value="C programming">C programming</option>
							<option value="Assembly">Assembly</option>
							<option value="Data Structures">Data Structures</option>
							<option value="Web Technology">Web Technology</option>
							<option value="Artificial Intelligence">Artificial Intelligence</option>
							<option value="Digital Logic Design">Digital Logic Design</option>
						</select>
					</div>
				</div>
				<h3 align="center">Answer Options</h3>
				<div class=" form-group row">
					<label for="AnswerOption1" class="labels">Option 1</label>
					<div class="col-sm-10">
						<input type="text" class="input form-control mb-4" id="AnswerOption1" name="AnswerOption1" placeholder="Write down your first option ">
					</div>
				</div>
				<div class="form-group row">
					<label for="AnswerOption2" class="labels">Option 2</label>
					<div class="col-sm-10">
						<input type="text" class="input form-control mb-4" id="AnswerOption2" name="AnswerOption2" placeholder="Write down your second option ">
					</div>
				</div>
				<div class="form-group row">
					<label for="AnswerOption3" class="labels">Option 3</label>
					<div class="col-sm-10">
						<input type="text" class="input form-control mb-4" id="AnswerOption3" name="AnswerOption3" placeholder="Write down your third option ">
					</div>
				</div>
				<div class="form-group row">
					<label for="AnswerOption4" class="labels">Option 4</label>
					<div class="col-sm-10">
						<input type="text" class="input form-control mb-4	" id="AnswerOption4" name="AnswerOption4" placeholder="Write down your fourth option ">
					</div>
				</div>
				<div class="form-group row">
					<label for="Answer" class="label">Correct Option </label>
					<div class="col-sm-10">
						<select id="correctOption" class=" select browser-default custom-select mb-4" name="correctOption">
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
							<option value="4">Option 4</option>
						</select>
					</div>
				</div>
				<div class=" form-group row">
					<label for="Difficulty" class="label">Difficulty</label>
					<div class="col-sm-10">
						<select id="Difficulty" class=" select browser-default custom-select mb-4	" name="Difficulty">
							<option value="Very Easy">Very Easy</option>
							<option value="Easy">Easy</option>
							<option value="Moderate">Moderate</option>
							<option value="Difficult">Difficult</option>
							<option value="Very Difficult">Very Difficult</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<input class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" value="Submit">
				</div>
			</div>
		</form>
	</div>

	<div class="container">
		<div id="contactForm" class="adminActions " style="display:none">

			<!--Section: Contact v.2-->
			<section class="mb-4">

				<!--Section heading-->
				<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
				<!--Section description-->
				<p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>

				<div class="row">

					<!--Grid column-->
					<div class="col-md-9 mb-md-0 mb-5">
						<form id="contact-form" name="contact-form" action="Admin.php" method="POST">

							<!--Grid row-->
							<div class="row">

								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="text" id="name" name="name" class="form-control">
										<label for="name" class="">Your name</label>
									</div>
								</div>
								<!--Grid column-->

								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="text" id="email" name="email" class="form-control">
										<label for="email" class="">Your email</label>
									</div>
								</div>
								<!--Grid column-->

							</div>
							<!--Grid row-->

							<!--Grid row-->
							<div class="row">
								<div class="col-md-12">
									<div class="md-form mb-0">
										<input type="text" id="subject" name="subject" class="form-control">
										<label for="subject" class="">Subject</label>
									</div>
								</div>
							</div>
							<!--Grid row-->

							<!--Grid row-->
							<div class="row">

								<!--Grid column-->
								<div class="col-md-12">

									<div class="md-form">
										<textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
										<label for="message">Your message</label>
									</div>

								</div>
							</div>
							<!--Grid row-->

						</form>

						<div class="text-center text-md-left">
							<a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
						</div>
						<div class="status"></div>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col-md-3 text-center">
						<ul class="list-unstyled mb-0">
							<li><i class="fa fa-map-marker fa-2x"></i>
								<p>Comsats University Lahore</p>
							</li>

							<li><i class="fa fa-phone mt-4 fa-2x"></i>
								<p>+ 92 111 222 333</p>
							</li>

							<li><i class="fa fa-envelope mt-4 fa-2x"></i>
								<p>contact@gmail.com</p>
							</li>
						</ul>
					</div>
					<!--Grid column-->

				</div>

			</section>
			<!--Section: Contact v.2-->
		</div>
	</div>

	<div class="paddingContactForm ">
		<div id="updateTable" class="adminActions " style="display:none">
			<a class=" btn btn-info btn-primary btn-lg " role="button" onClick="category(event, 'categoryUpdate')">Category Update Form</a>
			<a class="btn btn-info btn-primary btn-lg" role="button" onClick="question(event, 'QuestionUpdate')">Question Update Form</a>
		</div>

		<div id="categoryUpdate" style="display: none">
			<div class="container">
				<div>
					<?php
					require_once 'connectionDatabase.php';
					$query = "SELECT * FROM categorytable where status=1";
					$result = $connect->query( $query );
					$rows = $result->num_rows;
					?>
					<div>
						<table class='table  table-bordered ' width='100%'>
							<thead>
								<tr>
									<th width="20%">ID</th>
									<th width="50%">Category Name</th>
									<th width="10">Status</th>
									<th width="20%">Action</th>
								</tr>
							</thead>
						</table>
					</div>
					<?php

					for ( $i = 0; $i < $rows; $i++ ) {
						$result->data_seek( $i );
						$rows = $result->fetch_array( MYSQLI_BOTH );


						echo "<form action='adminPanel.php' method='GET'>";
						echo "<div style='padding-bottom: -10px'>";
						echo "<table class='table  table-bordered ' width='100%'>";
						echo "<tbody>";
						echo "<tr >";
						echo "<td width='20%'>$rows[id]</td>";
						echo "<td width='50%'>$rows[1]</td>";
						echo "<td width='10%'>$rows[2]</td>";
						echo "<input type='hidden' value='name=$rows[1]'>";
						echo "<input type='hidden' value='$rows[1]'>";
						echo "<td width='20%'><a class='btn btn-primary myBtn' id='$rows[id]' >Update</a></td>";
						echo "</tr>";
						echo "</tbody>";
						echo "</table>";
						echo "</div>";
						echo "</form>";
					}
					?>

					<div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="Category Update" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="updateModel">Update</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
								
								</div>

								<div class="modal-body" id="employee_detail">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div id="QuestionUpdate" style="display: none">
			<div class="container">

				<h3 align="center">Contact Form</h3>
				<div>
					<?php
					require_once 'connectionDatabase.php';

					$query = "SELECT * FROM questiontable ";
					$result = $connect->query( $query );
					$rows = $result->num_rows;

					echo <<<END
    <table class="table table-striped">
        <tbody>
        <tr >
            <th width="5%">ID</th>
            <th width="15%">Question</th>
            <th width="10%">Category</th>
            <th width="10%">Sub-Category</th>
            <th width="10%">Opt 1</th>
            <th width="10%">Opt 1</th>
            <th width="10%">Opt 1</th>
            <th width="10%">Opt 1</th>
            <th width="10%">Answer</th>
            <th width="10%">Difficulty</th>
            <th width="10%">Action</th>               
        </tr>
</tbody>
    </table>
END;
					$i = 0;
					for ( $i; $i < $rows; $i++ ) {
						$result->data_seek( $i );
						$rows = $result->fetch_array( MYSQLI_BOTH );

						echo <<<END
                    
                    <form action="adminPanel.php" method="post">
                        <table class="table table-striped">
                            <tbody>
                            <tr style="padding-bottom: -40px !important;">       
                                <td width="5%">$rows[0]</td>    
                                <td width="15%">$rows[1]</td>    
                                <td width="10%">$rows[2]</td>
                                <td width="10%">$rows[3]</td>    
                                <td width="10%">$rows[4]</td>    
                                <td width="10%">$rows[5]</td>
                                <td width="10%">$rows[6]</td>    
                                <td width="10%">$rows[7]</td>    
                                <td width="10%">$rows[8]</td>
                                <td width="10%">$rows[9]</td>
                                <td width="10%"><a class='btn btn-primary'  id="updateQuestion">Update</a></td>
                            </tr>           
</tbody>
                        </table>
                    </form>
END;
					}

					//<td><a href="adminPanel.php?id=$rows[0]"   data-toggle="modal" data-target="#questionUpdate">Update</a></td>
					?>
				</div>
			</div>
		</div>
	</div>

	<!--Footer-->
	<footer class="page-footer unique-color-dark pt-0">
		<!-- Social buttons -->
		<div class="primary-color">
			<div class="container">
				<!--Grid row-->
				<div class="row py-4 d-flex align-items-center">

					<!--Grid column-->
					<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
						<h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col-md-6 col-lg-7 text-center text-md-right">
						<!--Facebook-->
						<a class="fb-ic ml-0">
                        <i class="fa fa-facebook white-text mr-4"> </i>
                    </a>
						<!--Twitter-->
						<a class="tw-ic">
                        <i class="fa fa-twitter white-text mr-4"> </i>
                    </a>
						<!--Google +-->
						<a class="gplus-ic">
                        <i class="fa fa-google-plus white-text mr-4"> </i>
                    </a>
						<!--Linkedin-->
						<a class="li-ic">
                        <i class="fa fa-linkedin white-text mr-4"> </i>
                    </a>
						<!--Instagram-->
						<a class="ins-ic">
                        <i class="fa fa-instagram white-text mr-lg-4"> </i>
                    </a>
					</div>
					<!--Grid column-->

				</div>
				<!--Grid row-->
			</div>
		</div>
		<!-- Social buttons -->
		<!--footer linkd-->
		<div class="container mt-5 mb-4 text-center text-md-left">
			<div class="row mt-3">

				<!--First column-->
				<div class="col-md-3 col-lg-4 col-xl-3 mb-4">
					<h6 class="text-uppercase font-weight-bold">
                <strong>Comsats University</strong>
            </h6>
				







					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p>Here you can use chechk your abilities about your mind.Here you can use chechk your abilities about your mindHere you can use chechk your abilities about your mind</p>
				</div>
				<!--/.First column-->

				<!--Second column-->
				<!--
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
                <strong>Products</strong>
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <a href="#!"></a>
            </p>
            <p>
                <a href="#!"></a>
            </p>
            <p>
                <a href="#!"></a>
            </p>
            <p>
                <a href="#!"> </a>
            </p>
        </div>
-->
				<!--/.Second column-->

				<!--Third column-->
				<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
					<h6 class="text-uppercase font-weight-bold">
                <strong>Useful links</strong>
            </h6>
				







					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p>
						<a href="#!">Your Account</a>
					</p>
					<p>
						<a href="#!">Become an Affiliate</a>
					</p>
					<p>
						<a href="#!">EXAM CONDUCTION</a>
					</p>
					<p>
						<a href="#!">Help</a>
					</p>
				</div>
				<!--/.Third column-->

				<!--Fourth column-->
				<div class="col-md-4 col-lg-3 col-xl-3">
					<h6 class="text-uppercase font-weight-bold">
                <strong>Contact</strong>
            </h6>
				




					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<p><i class="fa fa-home mr-3"></i> COMSATS University,LHR</p>
					<p><i class="fa fa-envelope mr-3"></i> muhammadbilalakbar021</p>
					<p><i class="fa fa-phone mr-3"></i> 0321 2345678</p>
					<p><i class="fa fa-print mr-3"></i> 042-3-5111122</p>
				</div>
				<!--/.Fourth column-->

			</div>
		</div>
		<!--/.Footer Links-->


		<!--Copyright-->
		<div class="footer-copyright py-3 text-center">
			© 2018 Copyright:
			<a href=""> Bilal Akbar </a>
		</div>
		<!--/.Copyright-->
	</footer>
	<!--Footer-->
</body>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Carousel options -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	function openTab( evt, tabName ) {
		var i, x, tablinks;
		x = document.getElementsByClassName( "adminActions" );
		for ( i = 0; i < x.length; i++ ) {
			x[ i ].style.display = "none";
		}
		tablinks = document.getElementsByClassName( "tablink" );
		for ( i = 0; i < x.length; i++ ) {
			tablinks[ i ].className = tablinks[ i ].className.replace( " w3-red", "" );
		}
		document.getElementById( tabName ).style.display = "block";
		evt.currentTarget.className += " w3-red";
	}
</script>
<script>
	function validateForm() {
		var name = document.getElementById( 'name' ).value;
		if ( name == "" ) {
			document.getElementById( 'status' ).innerHTML = "Name cannot be empty";
			return false;
		}
		var email = document.getElementById( 'email' ).value;
		if ( email == "" ) {
			document.getElementById( 'status' ).innerHTML = "Email cannot be empty";
			return false;
		} else {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if ( !re.test( email ) ) {
				document.getElementById( 'status' ).innerHTML = "Email format invalid";
				return false;
			}
		}
		var subject = document.getElementById( 'subject' ).value;
		if ( subject == "" ) {
			document.getElementById( 'status' ).innerHTML = "Subject cannot be empty";
			return false;
		}
		var message = document.getElementById( 'message' ).value;
		if ( message == "" ) {
			document.getElementById( 'status' ).innerHTML = "Message cannot be empty";
			return false;
		}
		document.getElementById( 'status' ).innerHTML = "Sending...";
		document.getElementById( 'contact-form' ).submit();

	}
</script>
<script>
	function category( evt, cityName ) {
		document.getElementById( 'categoryUpdate' ).style.display = 'none';
		document.getElementById( 'QuestionUpdate' ).style.display = 'none';
		document.getElementById( 'QuestionDelete' ).style.display = 'none';
		document.getElementById( 'categoryDelete' ).style.display = 'none';
		document.getElementById( 'questionFetch' ).style.display = 'none';
		document.getElementById( 'categoryFetch' ).style.display = 'none';
		document.getElementById( cityName ).style.display = "block";

	}

	function question( evt, cityName ) {
		document.getElementById( 'categoryUpdate' ).style.display = 'none';
		document.getElementById( 'QuestionUpdate' ).style.display = 'none';
		document.getElementById( 'QuestionDelete' ).style.display = 'none';
		document.getElementById( 'categoryDelete' ).style.display = 'none';
		document.getElementById( 'questionFetch' ).style.display = 'none';
		document.getElementById( 'categoryFetch' ).style.display = 'none';
		document.getElementById( cityName ).style.display = "block";
	}
</script>
</html>