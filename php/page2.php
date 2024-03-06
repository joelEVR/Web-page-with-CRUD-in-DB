<!DOCTYPE html>
<html>

<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuneHub|Assignmnet 2</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <header>
        <h2 class="logo">TuneHub</h2>
        <nav class="navigation">
            <a href="#About">About</a>
            <a href="#Contact">Contact</a>
            <button class="btnLogout-popup">Logout</button>
        </nav>
    </header>

    <section class="Artists content-section" id="Artists">
    <h2>Artists</h2>
    <table>
        <!-- Table headers -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <!-- PHP code to fetch and display artists -->
        <?php
        include 'database.php';

        // Fetch artists from the database
        $artists = fetchData('artists');

        // Display artists
        foreach ($artists as $artist) {
            echo "<tr>";
            echo "<td>{$artist['id']}</td>";
            echo "<td>{$artist['name']}</td>";
            echo "<td>{$artist['description']}</td>";
            echo "<td><a href='delete.php?table=artists&id={$artist['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
   
    <!-- Add Artist form -->
    <h2>Add New Artist</h2>
    <form action="insert.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="description" placeholder="Description">
        <input type="hidden" name="table" value="artists">
        <input type="submit" value="Add Artist">
    </form> 
    </section>
<!-- ... -->

<section class="Genres content-section" id="Genres">
    <h2>Genres</h2>
<table>
    <!-- Table headers -->
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <!-- PHP code to fetch and display genres -->
    <?php
    // Fetch genres from the database
    $genres = fetchData('genres');

    // Display genres
    foreach ($genres as $genre) {
        echo "<tr>";
        echo "<td>{$genre['id']}</td>";
        echo "<td>{$genre['name']}</td>";
        echo "<td>{$genre['description']}</td>";
        echo "<td><a href='delete.php?table=genres&id={$genre['id']}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>


<!-- Add Genre form -->
<h2>Add New Genre</h2>
<form action="insert.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="description" placeholder="Description">
    <input type="hidden" name="table" value="genres">
    <input type="submit" value="Add Genre">
</form>
</section>

<section class="Songs content-section" id="Songs">
    <h2>Songs</h2>
    
    <table>
    <!-- Table headers -->
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Artist ID</th>
        <th>Genre ID</th>
        <th>Actions</th>
    </tr>
    <!-- PHP code to fetch and display songs -->
    <?php
    // Fetch songs from the database
    $songs = fetchData('songs');

    // Display songs
    foreach ($songs as $song) {
        echo "<tr>";
        echo "<td>{$song['id']}</td>";
        echo "<td>{$song['title']}</td>";
        echo "<td>{$song['artist_id']}</td>";
        echo "<td>{$song['genre_id']}</td>";
        echo "<td><a href='delete_song.php?table=songs&id={$song['id']}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>


<!-- Add Song form -->
<h2>Add New Song</h2>
<form action="insert_song.php" method="post">
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="artist_id" placeholder="Artist ID">
    <input type="text" name="genre_id" placeholder="Genre ID">
    <input type="hidden" name="table" value="songs">
    <input type="submit" value="Add Song">
</form>
</section>
<div class="about-popup">
        <span class="icon-close-about">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="about-content">
            <h2>About us</h2>
            <p class="text">At TuneHub, music isn't just a sound; it's an experience, a journey, and a celebration of
                the universal language that connects us all. We are a passionate team of music enthusiasts on a mission
                to create a virtual space that goes beyond the ordinary. Here, we believe that music has the power to
                inspire, uplift, and unite.</p>
        </div>
    </div>

    <div class="contact-popup">
        <span class="icon-close-contact">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="contact-content">
            <h2>Contact</h2>
            <h3>Our email</h3>
            <p>TuneHub@gmail.com</p>
            <h3>Our phone number</h3>
            <p>+123-456-789</p>
        </div>
    </div>

    <!-- Pop-up Logout -->
    <div class="logout-confirmation-popup" id="logoutPopup" style="display: none;">
        <div class="popup-content">
            <p>Are you sure you want to logout?</p>
            <button id="confirmLogout">Yes, Logout</button>
            <button id="cancelLogout">Cancel</button>
        </div>
    </div>

    <!--footer-->
    <footer class="footer">
        <p>&copy; 2023 David Contreras, Joel Velasquez, Sukaina Al-akwaa | Date: Nov 26, 2023</p>
    </footer>

    <script src="../js/scriptpage2.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>
