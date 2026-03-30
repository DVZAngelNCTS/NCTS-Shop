<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <link rel="stylesheet" href="./Home_Page.css"/>
  <link rel="stylesheet" href="./NavBar_Section.css"/>
  <link rel="stylesheet" href="./Presentation_Section.css"/>
  <link rel="stylesheet" href="./Store_Section.css"/>
  <link rel="stylesheet" href="./About_Section.css"/>
  <link rel="stylesheet" href="./Contact_Section.css"/>

  <title>NCTS - Shop</title>
</head>
<body>
  <div id="BackGround">
    <?php
    include_once __DIR__ . '/NavBar_Section.php';
    include_once __DIR__ . '/Presentation_Section.php';
    include_once __DIR__ . '/Store_Section.php';
    include_once __DIR__ . '/About_Section.php';
    include_once __DIR__ . '/Contact_Section.php';?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./Home_Page.js"></script>

  <!-- Scroll reveal -->
  <script>
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
  </script>
</body>
</html>
