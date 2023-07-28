<!-- resources/views/subscribe.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Email Subscription</title>
    <style>
        form {
            border: 4px solid #f1f1f1;
        }

        /* Add some padding and a grey background color to containers */
        .container {
            padding: 20px;
            background-color: #f1f1f1;
        }

        /* Style the input elements and the submit button */
        input[type=text],
        input[type=submit] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Add margins to the checkbox */
        input[type=checkbox] {
            margin-top: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            border: none;
        }

        input[type=submit]:hover {
            opacity: 0.8;
    </style>
</head>

<body>
    <h1>Email Subscription</h1>
    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="submit" value="Subscribe">
    </form>
</body>

</html>
