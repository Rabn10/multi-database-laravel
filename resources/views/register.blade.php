<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .alert-success {
            background-color: #d1e7dd;
            border-color: #badbcc;
            color: #0f5132;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
    </style>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <div class="flex items-center justify-center mb-4 w-full">
            <a href="{{ url('/') }}" class="text-2xl hover:underline mr-2"><i class="fa-solid fa-left-long"></i></a>
            <h1 class="text-2xl font-semibold mx-auto">User Register</h1>
        </div>
        @if(session()->has('message'))
            <div class="alert-success">
                {{session()->get('message')}}
            </div>
             @endif
        <form method="POST" action="{{ route('register') }}" >
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password_confirmation">DatabaseCode</label>
                <select name="usercode" id="usercode" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="flex justify-between items-center">
                <button type="submit"
                    class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-700">REGISTER</button>
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Already have an account</a>
            </div>
        </form>
    </div>
</body>
</html>
