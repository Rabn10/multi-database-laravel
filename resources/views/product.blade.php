<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.umd.js"></script> --}}
    <!-- TinyMCE CDN -->
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

</head>
<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Add Product</h1>
            <form method="POST" action="{{ url('store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="price">Price</label>
                    <input type="number" name="price" id="price"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="address">description</label>
                    <textarea id="editor" name="description"></textarea>
                    {{-- <input type="text" name="address" id="address"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="password_confirmation">File Type</label>
                    <select name="usercode" id="usercode" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                        <option value="A">FIlE</option>
                        <option value="B">URL</option>
                    </select>
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

<script>
    CKEDITOR.replace('editor');
</script>

{{-- <script>
    tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link charmap print preview',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
    });
</script> --}}