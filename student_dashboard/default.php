<?php
	//error_reporting(E_ALL ^ E_WARNING);
	session_start();
	if ($_SESSION['role'] != "Abuja") {
		header("Location: ../default.php");
	} else {
		require_once("../config.php");
		$_SESSION["userrole"] = "Student";
		$cred = explode("_", $_SESSION["cred"]);
		$qur = "SELECT *,BranchName FROM studentmaster INNER JOIN branchmaster ON studentmaster.StudentBranchCode = branchmaster.BranchCode WHERE StudentUserName='$cred[0]' AND StudentPassword='$cred[1]'";
		$res = mysqli_query($conn, $qur);
		$row = mysqli_fetch_assoc($res);
		$uqur = "SELECT * FROM updatemaster";
		$ures = mysqli_query($conn, $uqur);
		$urow = mysqli_fetch_assoc($ures);
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once('../head.php'); ?>
	</head>
	<body>
		<!-- NAVIGATION -->
		<?php require_once('nav.php'); ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<!-- HEADER -->
			<div class="header">
				<div class="container-fluid">
					<!-- Body -->
					<div class="header-body">
						<div class="row align-items-end">
							<div class="col">
								<!-- Pretitle -->
								<h6 class="header-pretitle">
									Student
								</h6>
								<!-- Title -->
								<h1 class="header-title">
									Dashboard
								</h1>
							</div>
							<div class="col-auto">
								<!-- Button -->
								<a href="../logout.php" class="btn btn-primary lift">
								logout
								</a>
							</div>
						</div>
						<!-- / .row -->
					</div>
					<!-- / .header-body -->
				</div>
			</div>
			<!-- / .header -->
			<br><br>
			<div class="container-fluid">
				<div class="page-header min-height-100 border-radius-xl mt-4">
				</div>
				<div class="card card-body blur shadow-blur mx-1 mt-n6 overflow-hidden">
					<div class="row gx-4">
						<div class="col-auto">
							<div class="avatar avatar-xxl position-relative">
								<img src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
							</div>
						</div>
						<div class="col-auto my-auto">
							<div class="h-100">
								<h1 class="mb-0 font-weight-bold text-sm">
									<?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?>
								</h1>
								<p class="mb-0 font-weight-bold text-sm">
									<?php echo $row['StudentEnrollmentNo']; ?>
								</p>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-6">
							<div class="card  border-1">
								<div class="card-body">
									<div class="list-group list-group-flush my-n3">
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<!-- Title -->
													<h5 class="mb-0">
														Ongoing Semester 
													</h5>
												</div>
												<div class="col-auto">
													<!-- Time -->
													<h5 class="text-muted mb-0">
													<?php echo $row['StudentSemester']; ?>
													</h5>
												</div>
											</div>
											<!-- / .row -->
										</div>
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<!-- Title -->
													<h5 class="mb-0">
														Branch
													</h5>
												</div>
												<div class="col-auto">
													<!-- Text -->
													<small class="text-muted">
													<?php echo $row['BranchName']; ?>
													</small>
												</div>
											</div>
											<!-- / .row -->
										</div>
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<!-- Title -->
													<h5 class="mb-0">
														Website
													</h5>
												</div>
												<div class="col-auto">
													<!-- Link -->
													<a href="#!" class="small">
													themes.getbootstrap.com
													</a>
												</div>
											</div>
											<!-- / .row -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card  border-1">
								<div class="card-body">
									<div class="list-group list-group-flush my-n3">
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<h5 class="mb-0">
													Primary Contact Number
													</h5>
												</div>
												<div class="col-auto">
													<small class="text-muted">
													<?php echo $row['StudentContactNo'];?>
													</small>
												</div>
											</div>
										</div>
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<h5 class="mb-0">
														Primary Email Id
													</h5>
												</div>
												<div class="col-auto">
													<small class="text-muted">
													<?php echo $row['StudentEmail'];?>
													</small>
												</div>
											</div>
										</div>
										<div class="list-group-item">
											<div class="row align-items-center">
												<div class="col">
													<h5 class="mb-0">
														Date of Birth
													</h5>
												</div>
												<div class="col-auto">
													<time class="small text-muted" datetime="2018-10-28">
													<?php echo $row['StudentDOB']; ?>
													</time>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="text-uppercase text-muted mb-2">
											SPI
										</h6>
										<span class="h2 mb-0">
										9.58
										</span>
									</div>
									<div class="col-auto">
										<span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="text-uppercase text-muted mb-2">
											Attendance
										</h6>
										<span class="h2 mb-0">
										55%
										</span>
									</div>
									<div class="col-auto">
										<span class="h2 fe fe-briefcase text-muted mb-0"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="text-uppercase text-muted mb-2">
											assignment
										</h6>
										<span class="h2 mb-0">
										10/40
										</span>
									</div>
									<div class="col-auto">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="text-uppercase text-muted mb-2">
											Avg. Time
										</h6>
										<span class="h2 mb-0">
										2:37
										</span>
									</div>
									<div class="col-auto">
										<span class="h2 fe fe-clock text-muted mb-0"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl">
						<div class="card">
							<div class="card-header">
								<h2 class="card-header-title ">
									Updates
								</h2>
								<a href="update.php" class="small">View all</a>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
									<!-- Card -->
									<div class="card" data-list="{&quot;valueNames&quot;: [&quot;item-name&quot;, &quot;item-title&quot;, &quot;item-email&quot;, &quot;item-phone&quot;, &quot;item-score&quot;, &quot;item-company&quot;], &quot;page&quot;: 10, &quot;pagination&quot;: {&quot;paginationClass&quot;: &quot;list-pagination&quot;}}" id="contactsList">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<!-- Form -->
												</div>
												<form>
													<div class="input-group input-group-flush input-group-merge input-group-reverse">
														<input class="form-control list-search" type="search" placeholder="Search">
														<span class="input-group-text">
														<i class="fe fe-search"></i>
														</span>
													</div>
												</form>
											</div>
										</div>
										<!-- / .row -->
									</div>
									<div class="table-responsive">
										<table class="table table-sm table-hover table-nowrap card-table" id="myTable">
											<thead>
												<tr>
													<th>
														<a class="list-sort text-muted" data-sort="item-name">#</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-title" href="#">Date</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-email" href="#">Title</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone" href="#">Uploaded By</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-score" href="#">Info</a>
													</th>
													<th colspan="2">
														<a class="list-sort text-muted" data-sort="item-company" href="#">Download</a>
													</th>
												</tr>
											</thead>
											<tbody class="list font-size-base">
												<?php
													while ($urow = mysqli_fetch_assoc($ures)) { ?>
												<tr>
													<td>
														<?php echo $urow['UpdateId']; ?>
													</td>
													<td>
														<span class="item-title"><?php echo $urow['UpdateUploadDate']; ?></span>
													</td>
													<td>
														<!-- Text -->
														<span class="item-title"><?php echo $urow['UpdateTitle']; ?></span>
													</td>
													<td>
														<span class="item-title"><?php echo $urow['UpdateUploadedBy']; ?></span>
													</td>
													<td>
														<!-- Phone -->
														<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="collapse" data-target="#demo1" data-parent="#myTable">View</button>
													</td>
													<td>
														<!-- Badge -->
														<a download="../uploads/facprofile/CEAJJ.png" href="../uploads/facprofile/CEAJJ.png" type="button" class="btn btn-sm btn-outline-primary">Download</a>
													</td>
												<tr id="demo1" class="collapse">
													<td colspan="6" class="hiddenRow">
														<div>Demo1</div>
													</td>
												</tr>
												</tr>
												<?php } ?>
												<!--over-->
											</tbody>
										</table>
									</div>
									<div class="card-footer d-flex justify-content-between">
										<!-- Pagination (prev) -->
										<ul class="list-pagination-prev pagination pagination-tabs card-pagination">
											<li class="page-item">
												<a class="page-link pl-0 pr-4 border-right" href="#">
												<i class="fe fe-arrow-left mr-1"></i> Prev
												</a>
											</li>
										</ul>
										<!-- Pagination -->
										<ul class="list-pagination pagination pagination-tabs card-pagination">
											<li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">3</a></li>
										</ul>
										<!-- Pagination (next) -->
										<ul class="list-pagination-next pagination pagination-tabs card-pagination">
											<li class="page-item">
												<a class="page-link pl-4 pr-0 border-left" href="#">
												Next <i class="fe fe-arrow-right ml-1"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="contactsCardsPane" role="tabpanel" aria-labelledby="contactsCardsTab">
								<!-- Cards -->
								<div data-list="{&quot;valueNames&quot;: [&quot;item-name&quot;, &quot;item-title&quot;, &quot;item-email&quot;, &quot;item-phone&quot;, &quot;item-score&quot;, &quot;item-company&quot;], &quot;page&quot;: 9, &quot;pagination&quot;: {&quot;paginationClass&quot;: &quot;list-pagination&quot;}}" id="contactsCards">
									<!-- Header -->
									<div class="row align-items-center mb-4">
										<div class="col">
											<!-- Form -->
											<form>
												<div class="input-group input-group-lg input-group-merge input-group-reverse">
													<input class="form-control list-search" type="search" placeholder="Search">
													<span class="input-group-text">
													<i class="fe fe-search"></i>
													</span>
												</div>
											</form>
										</div>
										<div class="col-auto mr-n3">
											<!-- Select -->
											<form>
												<div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
													<div class="form-select form-select-sm form-control-flush">
														<select class="form-select form-select-sm form-control-flush form-control" data-choices="{&quot;searchEnabled&quot;: false}" hidden="" tabindex="-1" data-choice="active">
															<option value="9 per page">9 per page</option>
														</select>
														<div class="choices__list choices__list--single">
															<div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="9 per page" data-custom-properties="null" aria-selected="true">9 per
																page
															</div>
														</div>
													</div>
													<div class="choices__list dropdown-menu" aria-expanded="false">
														<div class="choices__list" role="listbox">
															<div class="choices__item dropdown-item choices__item--selectable is-highlighted" data-select-text="Press to select" data-choice="" data-choice-selectable="" data-id="1" data-value="9 per page" role="option" aria-selected="true">
																9 per page
															</div>
															<div class="choices__item dropdown-item choices__item--selectable" data-select-text="Press to select" data-choice="" data-choice-selectable="" data-id="2" data-value="All" role="option">
																All
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- / .row -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / .main-content -->
		<!-- JAVASCRIPT -->
		<!-- Map JS -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
		<!-- Vendor JS -->
		<script src="../assets/js/vendor.bundle.js"></script>
		<!-- Theme JS -->
		<script src="../assets/js/theme.bundle.js"></script>
	</body>
</html>
<?php } ?>