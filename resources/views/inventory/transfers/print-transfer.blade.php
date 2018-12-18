{{-- <html>
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
                   Stock Transfer Order
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                  <strong>Warehouse From</strong><br>
               
                <address>
                  Name : {!! $movment->Warehousefrom->name !!}<br>
                 Location: {!! $movment->Warehousefrom->location !!}<br>
                 Phone: {!! $movment->Warehousefrom->phone !!}
                
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                  <strong>Warehouse To</strong><br>
               
                  <address>
                    Name : {!! $movment->Warehouseto->name !!}<br>
                   Location: {!! $movment->Warehouseto->location !!}<br>
                   Phone: {!! $movment->Warehouseto->phone !!}
                  
                  </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Ref.No #{!! $movment->no!!}</b><br>
                <b>Date #{!! $movment->created_at!!} </b>
              
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
           
            <!-- Table row -->
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th width="10%">Item Code</th>
                    <th>Item Name</th>
                    <th width="10%">UOM</th>
                    <th width="10%">Expiry Date</th>
                    <th width="10%">Quantity</th>
                    <th>Remark</th>
                  </tr>
                  </thead>
                  <tbody>
                        @foreach($movment->MovementDetails as $data)
                  <tr>
                    <td>{!!$data->items->no!!}</td>
                    <td>{!!$data->items->name!!}</td>
                    <td>{!!$data->items->units->name!!}</td>
                    <td>{!!$data->expiry_date !!}</td>
                    <td>{!!$data->qty!!}</td>
                    <td>{!!$data->notes!!}</td>
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
                <b>Recipient signature: ........................................................</b> 
              </div>
              <div class="col-md-4">
                <b>Dispatcher signature: ........................................................</b> 
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
     --}}


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  
  <link href="/invoice.css" rel="stylesheet" type="text/css" />
      <script src="/invoice.js"></script> 
  
       @extends('layouts.app')
  
       @section('content')
       <div class="portlet light bordered">
               <div class="portlet-title">
                   <div class="caption">
                       <i class="icon-equalizer font-red-sunglo"></i>
                       <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.Print')</span>
                   </div>
           
               </div>
               <div class="clearfix"></div>
               <div class="box box-primary">
                   <div class="box-body">
                      <div id="invoice">
  
                         
                          <div class="invoice overflow-auto" id="invbody">
                              <div style="min-width: 600px">
                                  <header>
                                      <div class="row">
                                          <div class="col">
                                              <a target="_blank" href="https://lobianijs.com">
                                                  <img src="http://www.bluetech-sd.com/assets/images/capture-242x128.png" data-holder-rendered="true" />
                                                  </a>
                                          </div>
                                          <div class="col company-details">
                                              <h2 class="name">
                                                  <a target="_blank" href="http://www.bluetech-sd.com">
                                                  BlueTech
                                                  </a>
                                              </h2>
                                              <div>455 Foggy Heights, AZ 85004, US</div>
                                              <div>(123) 456-789</div>
                                              <div>info@bluetech-sd.com</div>
                                          </div>
                                      </div>
                                  </header>
                                  <main>
                                      <div class="row contacts">
                                          <div class="col invoice-to">
                                              <div class="text-gray-light">Warehouse from:</div>
                                              <h3 class="to">{!! $movment->Warehousefrom->name !!}</h3>
                                              <div class="address">{!! $movment->Warehousefrom->location !!}</div>
                                              <div class="phone">{!! $movment->Warehousefrom->phone !!}</div>
                                          </div>
                                          <div class="col invoice-to">
                                              <div class="text-gray-light">Warehouse to:</div>
                                              <h3 class="to">{!! $movment->Warehouseto->name !!}</h3>
                                              <div class="address">{!! $movment->Warehouseto->location !!}</div>
                                              <div class="phone">{!! $movment->Warehouseto->phone !!}</div>
                                          </div>
                                          <div class="col invoice-details">
                                              <h3 class="invoice-id">Stock Transfer Order</h3>
                                              <div class="date">Ref.No #{!! $movment->no!!}</div>
                                              <div class="date">Date #{!! $movment->created_at!!}</div>
                                          </div>
                                      </div>
                                      <table border="0" cellspacing="0" cellpadding="0">
                                          <thead>
                                              <tr>
                                                  {{-- <th>#</th> --}}
                                                  <th width="10%" class="text-left">Item Code</th>
                                                  <th class="text-left">Item Name</th>
                                                  <th width="10%" class="text-left">UOM</th>
                                                  <th width="10%" class="text-left">Expiry Date</th>
                                                  <th width="10%" class="text-right">Quantity</th>
                                                  <th class="text-left">Remark</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                  @foreach($movment->MovementDetails as $data)
                                              <tr>
                                                  <td class="no">{!!$data->items->no!!}</td>
                                                  <td class="text-left">{!!$data->items->name!!}</td>
                                                  <td class="unit">{!!$data->items->units->name!!}</td>
                                                  <td class="unit">{{ date('d-m-Y', strtotime($data->expiry_date)) }}</td>
                                                  <td class="unit">{!!$data->qty!!}</td>
                                                  <td class="text-left">{!!$data->notes!!}</td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                       
                                      </table>
                                      <hr/><br/><br/>
                                      <div class="text-right">
                                              <tr>
                                                  <td colspan="4">Dispatcher Sig...................................</td>   <br/><br/>    
                                                      
                                                  </tr>
                                                  <tr>
                                                      <td colspan="4">Shipper Sig...................................</td>     <br/><br/>                                                    
                                                      </tr>
                                                      <tr>
                                                           
                                                          <td colspan="4">Recipient Sig...................................</td>                                           
                                                      </tr>
                                              </div>
                                      <div class="thanks">Thank you!</div>
                                      <div class="notices">
                                          <div>NOTICE:</div>
                                          <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                      </div>
                                  </main>
                                  <footer>
                                      Invoice was created on a computer and is valid without the signature and seal.
                                  </footer>
                              </div>
                              <div class="toolbar hidden-print">
                                      <div class="text-right">
                                          <button id="printInvoice" onclick="PrintElem('invbody');" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                                          <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                      </div>
                                      <hr>
                                  </div>
                              <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                              <div></div>
                          </div>
                      </div>
                  </div>
               </div>
        </div>
       @endsection
  