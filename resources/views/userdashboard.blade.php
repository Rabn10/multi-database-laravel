<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100 relative">
    <!-- Logout Button -->
    <div class="flex items-center justify-end mb-8 ml-auto mr-36 space-x-4">
        <h3 class="text-lg font-semibold text-gray-800">Welcome, {{ session('username') }}</h3>
        <a href="{{ route('logout') }}" class="bg-red-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-500 transition">
            Logout
        </a>
    </div>
    
    <div class="flex space-x-8 w-4/5">
        <!-- Employee List -->
        <div class="w-3/4 bg-white p-6 rounded-lg shadow-xl border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Employee List</h2>
                <form method="GET" action="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <input type="search" name="search" value="{{ request()->search }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search">
                    <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition">Search</button>
                </form>
            </div>
            
            <table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-3">Name</th>
                        <th class="border border-gray-300 px-4 py-3">Email</th>
                        <th class="border border-gray-300 px-4 py-3">Phone</th>
                        <th class="border border-gray-300 px-4 py-3">Address</th>
                        <th class="border border-gray-300 px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr class="bg-gray-50 hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->phone }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->address }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('edit', $employee->id) }}" class="text-blue-600 font-medium hover:underline">Edit</a>
                                <a href="{{url('delete_employee', $employee->id)}}" class="text-red-600 font-medium hover:underline ml-3">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $employees->links() }}
            </div>
        </div>
        
        <!-- Add Employee Form -->
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Add Employee</h1>
            <form method="POST" action="{{ url('store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="address">Address</label>
                    <input type="text" name="address" id="address" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-500 transition">ADD</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
