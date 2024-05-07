<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Book</h2>
        <form method="POST" action="{{ route('generate-pdf') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="author">Title:</label>
                <input type="text" id="author" name="title">
            </div>
            <div class="form-group">
                <label for="author">Author (Front Page):</label>
                <input type="text" id="author" name="author">
            </div>
            <div class="form-group">
                <label for="front_image">Front Cover Image:</label>
                <input type="file" id="front_image" name="front_image">
            </div>
            <div class="form-group">
                <label for="background_image">Back Cover Image:</label>
                <input type="file" id="background_image" name="background_image">
            </div>
            <div class="form-group">
                <label for="background_image">Page Image:</label>
                <input type="file" id="page_image" name="page_image">
            </div>
            <div class="form-group">
                <label for="page_content">Page Content:</label>
                <textarea id="page_content" name="page_content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="back_cover_content">Back Cover Content:</label>
                <textarea id="back_cover_content" name="back_cover_content" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Page Number:</label>
                <input type="number" id="price" name="page_number">
            </div>
            <div class="form-group">
                <label for="price">Price (Bottom):</label>
                <input type="text" id="price" name="price">
            </div>
            <input type="submit" value="Create Book">
        </form>
    </div>
</body>
</html>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
        ClassicEditor
            .create(document.querySelector('textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
