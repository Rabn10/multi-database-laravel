<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Edit Employee</h1>
            <form method="POST" action="{{ url('update', $employee->id) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$employee->name}}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$employee->email}}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{$employee->address}}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" value="{{$employee->phone}}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-500 transition">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>