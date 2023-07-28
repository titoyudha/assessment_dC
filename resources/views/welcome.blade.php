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
    <h1>Dropdown Wilayah Administratif Indonesia</h1>
    <select id="province-dropdown">
        <option value="">Pilih Provinsi</option>
    </select>
    <select id="city-dropdown">
        <option value="">Pilih Kota/Kabupaten</option>
    </select>
    <select id="district-dropdown">
        <option value="">Pilih Kecamatan</option>
    </select>
    <select id="village-dropdown">
        <option value="">Pilih Kelurahan</option>
    </select>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to populate cities dropdown
            function populateCities(provinceId) {
                $.ajax({
                    url: '/get-cities/' + provinceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $("#city-dropdown").empty();
                        $("#city-dropdown").append('<option value="">Pilih Kota/Kabupaten</option>');
                        $.each(data, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            }

            // Function to populate districts dropdown
            function populateDistricts(cityId) {
                $.ajax({
                    url: '/get-districts/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $("#district-dropdown").empty();
                        $("#district-dropdown").append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $("#district-dropdown").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            }

            // Function to populate villages dropdown
            function populateVillages(districtId) {
                $.ajax({
                    url: '/get-villages/' + districtId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $("#village-dropdown").empty();
                        $("#village-dropdown").append('<option value="">Pilih Kelurahan</option>');
                        $.each(data, function(key, value) {
                            $("#village-dropdown").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            }

            // Populate provinces dropdown on page load
            $.ajax({
                url: '/get-provinces',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $("#province-dropdown").empty();
                    $("#province-dropdown").append('<option value="">Pilih Provinsi</option>');
                    $.each(data, function(key, value) {
                        $("#province-dropdown").append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });

            // Handle province dropdown change event
            $("#province-dropdown").change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    populateCities(provinceId);
                } else {
                    $("#city-dropdown").empty();
                    $("#city-dropdown").append('<option value="">Pilih Kota/Kabupaten</option>');
                }
                $("#district-dropdown").empty();
                $("#district-dropdown").append('<option value="">Pilih Kecamatan</option>');
                $("#village-dropdown").empty();
                $("#village-dropdown").append('<option value="">Pilih Kelurahan</option>');
            });

            // Handle city dropdown change event
            $("#city-dropdown").change(function() {
                var cityId = $(this).val();
                if (cityId) {
                    populateDistricts(cityId);
                } else {
                    $("#district-dropdown").empty();
                    $("#district-dropdown").append('<option value="">Pilih Kecamatan</option>');
                    $("#village-dropdown").empty();
                    $("#village-dropdown").append('<option value="">Pilih Kelurahan</option>');
                }
            });

            // Handle district dropdown change event
            $("#district-dropdown").change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    populateVillages(districtId);
                } else {
                    $("#village-dropdown").empty();
                    $("#village-dropdown").append('<option value="">Pilih Kelurahan</option>');
                }
            });
        });
    </script>
</body>

</html>
