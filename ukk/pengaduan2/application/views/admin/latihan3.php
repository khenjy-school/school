<!DOCTYPE html>
<html>

<head>
    <title>Site Name</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>custom/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
        </div>
        <!-- Navbar -->
        <div class="menu">
            <ul>
                <li>
                </li>
            </ul>

        </div>
    </div>

    <div class="sidebar transition">

        <!-- Sidebar Menu -->
        <div class="sidebar-items">

        </div>
    </div>

    <div class="sidebar-overlay"></div>

    <!-- Content -->
    <div class="content transition">
    </div>

    <div class="footer transition">
        <p>&copy; 2021 All Right Reserved by <a href="AhliKode.com">AhliKode</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#sidebar-toggle, .sidebar-overlay").click(function() {
                $(".sidebar").toggleClass("sidebar-show");
                $(".sidebar-overlay").toggleClass("d-block");
            });
        });
    </script>
</body>

</html>