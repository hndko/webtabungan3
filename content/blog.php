<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Document</title>
</head>

<body>


	<div class="container">
		<h1 class="text-center my-5">Latest Blog Posts</h1>

		<!-- Blog Post List -->
		<div id="blogPostList"></div>
	</div>

	<!-- jQuery and Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- API call script -->
	<script>
		$(document).ready(function() {
			$.ajax({
				url: "https://jsonplaceholder.typicode.com/posts",
				method: "GET",
				success: function(data) {
					// Loop through blog posts and add them to the list
					$.each(data, function(index, value) {
						let blogPost = `
						<div class="card my-3">
							<div class="card-body">
								<h5 class="card-title">${value.title}</h5>
								<p class="card-text">${value.body}</p>
							</div>
						</div>`;
						$("#blogPostList").append(blogPost);
					});
				}
			});
		});
	</script>
</body>

</html>