<?php 
	include 'conn.php';
	$limit =  5;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	
	$result = $conn->prepare("SELECT * FROM customers LIMIT $start, $limit");
	$result->execute();
	$customers = $result->fetchAll(PDO::FETCH_ASSOC);

	$result1 = $conn->prepare("SELECT count(id) AS id FROM customers");
	$result1->execute();
	$custCount = $result1->fetchAll(PDO::FETCH_ASSOC);

	// print_r($custCount);

	$total = $custCount[0]['id'];
	print_r("<br>");
	// $total = 1;
	$pages = ceil( $total / $limit);

	$Previous = $page - 1;
	$Previous = ($page - 1 <= 0) ? 1 : $Previous;

	$Next = $page + 1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container well">
		<h1 class="text-center">Bootstrap Pagination in PHP and MySQL</h1>
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li>
				      <a href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true" class="btn btn-success md-3">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li><a href="index.php?page=<?= $i; ?>" class="btn btn-primary mx-2" ><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li>
				      <a href="index.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true"  class="btn btn-success md-3">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
			
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
	                    <th>Id</th>
	                    <th>Name</th>
	                    <th>Mobile</th>
	                    <th>Address</th>
	                    <th>Date</th>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		        		<tr>
		        			<td><?= $customer['id']; ?></td>
		        			<td><?= $customer['name']; ?></td>
		        			<td><?= $customer['mobile']; ?></td>
		        			<td><?= $customer['address']; ?></td>
		        			<td><?= $customer['createdOn']; ?></td>
		        		</tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>

      		
		</div>

<div style="position: fixed; bottom: 10px; right: 10px; color: green;">
        <strong>
            Learn Web Coding
        </strong>
</div>
<!-- <script src="js/bootstrap.bundle.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script> -->
</body>
</html>
