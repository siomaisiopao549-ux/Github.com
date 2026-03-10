<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['fullname'];
    $age     = $_POST['age'];
    $course  = $_POST['course'];
    $email   = $_POST['email'];
    $gender  = $_POST['gender'];
    $bio     = $_POST['bio'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "None";

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $file_name   = time() . "_" . basename($_FILES["profile_image"]["name"]);
    $target_file = $target_dir . $file_name;
    $temp_name   = $_FILES["profile_image"]["tmp_name"];

    if (move_uploaded_file($temp_name, $target_file)) {
        $profile_pic = $target_file;
    } else {
        $profile_pic = "https://via.placeholder.com/150"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $name; ?>'s Profile</title>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1920&q=80');
            background-size: cover; background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;
        }
        .profile-card {
            background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);
            padding: 40px; border-radius: 20px; width: 400px; text-align: center;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.4);
        }
        .user-img { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 5px solid white; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { color: #d63384; margin: 10px 0 5px 0; }
        .subtitle { color: #666; font-weight: bold; margin-bottom: 20px; }
        .data-box { text-align: left; background: rgba(255,255,255,0.6); padding: 15px; border-radius: 10px; margin-bottom: 15px; }
        .hobby-tag { background: #fce4ec; color: #ad1457; padding: 3px 8px; border-radius: 10px; font-size: 12px; margin: 2px; display: inline-block; }
    </style>
</head>
<body>

<div class="profile-card">
    <img src="<?php echo $profile_pic; ?>" class="user-img">
    <h1><?php echo $name; ?></h1>
    <div class="subtitle"><?php echo $course; ?> Student</div>

    <div class="data-box">
        <p><strong>Age:</strong> <?php echo $age; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        <p><strong>Hobbies:</strong><br>
            <?php 
                $h_list = explode(", ", $hobbies);
                foreach($h_list as $h) echo "<span class='hobby-tag'>$h</span>"; 
            ?>
        </p>
    </div>

    <div style="font-style: italic; color: #444; line-height: 1.6;">
        "<?php echo nl2br($bio); ?>"
    </div>

    <br>
    <a href="index.php" style="color: #d63384; text-decoration: none; font-weight: bold;">← Create New Profile</a>
</div>

</body>
</html>