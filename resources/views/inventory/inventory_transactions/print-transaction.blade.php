<html>
<head>
  <meta charset="UTF-8">
  <title>Blue || ERP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
        <div class="wrapper">
          <!-- Main content -->
          <section class="invoice" >
            <!-- title row -->
            <div class="row">
              <div class="col-xs-3">
                <h2 class="page-header">
                  BlueTech, Inc.
                </h2>
              </div>
              <div class="col-xs-offset-6">
                <h2 class="page-header">
                   Warehouse Stock in
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">  
                <b>Ref.No #{!! $movment[0]->no!!}</b><br>
                <b>Date #{!! $movment[0]->created_at!!} </b>
              
              </div>

            </div>
            <!-- /.row -->
           
            <!-- Table row -->
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                  <tr>
                     <th>Warehouse</th>
                    <th width="10%">Item Code</th>
                    <th>Item Name</th>
                    <th width="10%">Unit</th>
                    <th width="10%">Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                        @foreach($movment as $data)
                  <tr>
                  <td>{!!$data->warehouse->name!!}</td>
                    <td>{!!$data->items->no!!}</td>
                    <td>{!!$data->items->name!!}</td>
                    <td>{!!$data->items->units->name!!}</td>
                    <td>{!!$data->qty!!}</td>
                  </tr>
                  @endforeach
        
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        <hr/> <br/>
            <div class="row">
              <div class="col-md-4">
                <b>Keeper signature: ........................................................</b> 
              </div>
             
              <div class="col-md-4">
                <b>Shipper signature: ........................................................</b> 
                  
              </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        
         </div>
          </section>
        
        </body>

    </html>
    