<!DOCTYPE html>
<html>
<head>
  <title>Courses - Indian Computer Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; }
    header { background-color: #f8f9fa; padding: 20px; text-align: center; }
    nav a {
      margin: 0 10px;
      text-decoration: none;
      padding: 8px 12px;
      background: #007bff;
      color: white;
      border-radius: 5px;
    }
    nav a:hover { background: #0056b3; }
    .course-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
      background-color: #fff;
    }
  </style>
</head>
<body>

  <header>
    <h1>Indian Computer Services</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="courses.php">Courses</a>
      <a href="admission.html">Admission</a>
      <a href="contact.html">Contact</a>
    </nav>
  </header>

  <section id="courses" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">🎓 Available Courses</h2>
      <div class="row">
        <?php
        // Replace these with your actual DB details
        $conn = new mysqli("localhost", "root", "", "your_database_name");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM courses ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($course = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4">
              <div class="course-card shadow-sm">
                <h4>' . htmlspecialchars($course['course_name']) . '</h4>
                <p>' . htmlspecialchars($course['course_description']) . '</p>
                <p><strong>Duration:</strong> ' . htmlspecialchars($course['duration']) . '</p>
                <p><strong>Fees:</strong> ₹' . htmlspecialchars($course['fees']) . '</p>
              </div>
            </div>';
          }
        } else {
          echo "<p class='text-center'>No courses available yet.</p>";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </section>

</body>
</html>
