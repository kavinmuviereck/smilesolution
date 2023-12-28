    <link rel="icon" href="<?= favicon ?>" sizes="16x16">    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakasa | SEO</title>
    

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="examples/css/site.css"> -->
    <link rel="stylesheet" href="src/richtext.min.css">
       
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!--gallery-->
    <link rel="stylesheet" href="dist/css/lightbox.min.css">

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
  

<script type="text/javascript" src="tableExport/tableExport.js"></script>
<script type="text/javascript" src="tableExport/jquery.base64.js"></script>
<script type="text/javascript" src="tableExport/html2canvas.js"></script>
<script type="text/javascript" src="tableExport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="tableExport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="tableExport/jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script type="text/javascript" src="tableExport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="tableExport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="tableExport/jspdf/libs/base64.js"></script>

   
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!----------------datatables---------->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap.min.css">

 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap.min.css">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Select2 css and js file -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!----------------jquery alert plugin---------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<!---- Custom Css --->
<link href="dist/css/custom.css" rel="stylesheet">
<link href="dist/css/ck_edidor_styles.css" rel="stylesheet">
<link href="dist/css/mdb-button-styles.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans|Tangerine|Inconsolata|Droid+Sans|Josefin+Sans|Roboto:400|Open+Sans:600|Sansita:400,800,900|Redressed" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
<style type="text/css">
    body{
        display: none;
    }

</style>
<script>
    function closealert()
    {
        $('.alert').html(),autoClose = true;
    }
     function notification(position1,color,Content) {
         
                NotifContent = $('#preview').find('.alert').html(),autoClose = false;
                type = 'error';
                notifContent = '<div class="alert alert-' + color + ' media fade in"><p>' + Content + '</p></div>';
                method = 3000;
                position = position1;
                container ='';
                style = 'topbar';
                openAnimation = 'animated bounceIn';
                closeAnimation = 'animated bounceOut';

            var n = noty({
                text        : notifContent,
                dismissQueue: false,
                layout      : position,
                closeWith   : ['click'],
                theme       : 'made',
                maxVisible  : 5
               
            });

            }

    </script>
    