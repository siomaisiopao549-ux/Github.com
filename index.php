<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Generator</title>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1920&q=80');
            background-size: cover; background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; padding: 40px;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.95); padding: 30px; border-radius: 15px; 
            width: 450px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        h2 { color: #d63384; text-align: center; margin-top: 0; }
        label { font-weight: bold; color: #444; display: block; margin-top: 10px; }
        input[type="text"], input[type="number"], input[type="email"], textarea {
            width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;
        }
        .btn { 
            background: #d63384; color: white; border: none; padding: 15px; 
            width: 100%; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 20px;
        }
        .btn:hover { background: #b8226b; }
        .hint { font-size: 0.8em; color: #888; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Personal Profile Form</h2>
    <form action="profile.php" method="POST" enctype="multipart/form-data">
        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Course / Program</label>
        <input type="text" name="course" required>

        <label>Email Address</label>
        <input type="email" name="email" required>

        <label>Gender</label>
        <input type="radio" name="gender" value="Male" required> Male 
        <input type="radio" name="gender" value="Female"> Female

        <label>Hobbies</label>
        <div class="hint">(Please select at least 5)</div>
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Coding"> Coding
        <input type="checkbox" name="hobbies[]" value="Music"> Music
        <input type="checkbox" name="hobbies[]" value="Photography"> Photography
        <input type="checkbox" name="hobbies[]" value="Travel"> Travel
        <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming

        <label>Short Biography</label>
        <textarea name="bio" rows="4" required></textarea>

        <label>Upload Profile Image</label>
        <input type="file" name="profile_image" accept="image/*" required>

        <button type="submit" class="btn">Generate Profile</button>
    </form>
</div>

</body>
</html>