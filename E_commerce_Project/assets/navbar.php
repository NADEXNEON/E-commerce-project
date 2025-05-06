<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar</title>
  <style type="text/css">
       * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color:#16acf2;
  padding: 1rem 2rem;
  margin-bottom: -10px;
}

.navbar .logo a {
  color: white;
  text-decoration: none;
  font-size: 1.5rem;
}
.logo h5{
    color: white;
}
.nav-links {
  display: flex;
  list-style: none;
}

.nav-links li {
  margin: 0 15px;
}

.nav-links li a {
  color: white;
  text-decoration: none;
  font-size: 1rem;
}

.menu-icon {
  display: none;
  font-size: 2rem;
  color: white;
  cursor: pointer;
}

ul li a:hover{
    padding: 10px 15px;
      text-decoration: none;
      transition: all 0.3s ease;
      color:rgb(255, 250, 248); 
      background-color: #444; 
      border-radius: 5px; 
}
/*nav {
      background-color: #333;
      padding: 10px;
    }
ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
li {
      margin-right: 20px;
    }
/*a {
      
      color: white;
      
      display: block;
      
    }

    /* Hover effect
a:hover {
      padding: 10px 15px;
      text-decoration: none;
      transition: all 0.3s ease;
      color:rgb(172, 167, 165); 
      background-color: #444; 
      border-radius: 5px; 
    }*/


/* Responsive styles */
@media screen and (max-width: 768px) {
  .nav-links {
    position: absolute;
    top: 60px;
    left: 0;
    right: 0;
    background-color: #333;
    display: none;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 1rem 0;
  }

  .nav-links.active {
    display: flex;
  }

  .nav-links li {
    margin: 10px 0;
  }

  .menu-icon {
    display: block;
  }
}
</style>
</head>
<body>

  <header>
    <nav class="navbar">
      <div class="logo">
         <h5>MEDIPRO+</h5>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="data.php">Users</a></li>
        <li><a href="medicine.php">Medicines</a></li>
        <li><a href="dashboard_admin.php">Admin Login</a></li>
        <li><?php include_once("./auth/authenticate.php");?></li>
      </ul>
      <div class="menu-icon" id="menu-icon">
        <span>&#9776;</span>
      </div>
    </nav>
  </header>

  <script type="text/javascript">
      const menuIcon = document.getElementById('menu-icon');
const navLinks = document.querySelector('.nav-links');

menuIcon.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

  </script>
</body>
</html>
