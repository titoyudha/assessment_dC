<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Wilayah Administratif Indonesia</title>
    <style>
        /* Style to make the dropdowns vertical */
        select {
            display: block;
            width: 200px;
            /* Adjust the width as needed */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    {{-- <select id="province-dropdown">
        <option value="">Pilih Provinsi</option>
        @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select> --}}
    @include('region_dropdown');
</body>

</html>
