<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Application</title>
<style>
  <?php include 'style.css'; ?>
</style>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <!--Navigation Bar-->
  <div class="header">
  <a href="index.php" class="logo">Pinnacle Law Group</a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a href="positions.php">Open Positions</a>
    <a href="apply.php">Apply</a>
  </div>
  </div>
</head>
<body>
  <!--Job Application Form-->
  <div id="formDiv">
    <form id="jobApplicationForm">
  <label for="fullName">Full Name:</label>
  <input type="text" id="fullName" name="fullName" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

    <label for="fullName">Address: </label>
    <input type="text" id="address" name="address" required>

    <label for="jobPosition">Job Position</label>
    <select id="job" name="job">
      <option value="paralegal">Paralegal</option>
      <option value="secretary">Attorney Secretary</option>
      <option value="itAdmin">IT Adminstrator</option>
    </select>

  <label for="resume">Upload Resume:</label>
  <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>

  <button type="submit">Submit Application</button>
</form>
  </div>
  


<script>
  //JavaScript that handles form submission via Fetch API and POST request
  
document.getElementById('jobApplicationForm').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get form data
  const formData = new FormData(this);

  // Send form data using Fetch API
  fetch('submit_application.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Handle success response
    console.log('Success:', data);
    alert('Application submitted successfully!');
    // You can redirect the user or do any other actions here
  })
  .catch(error => {
    // Handle error
    console.error('Error:', error);
    alert('There was an error submitting your application. Please try again later.');
  });
});
</script>

</body>
</html>
