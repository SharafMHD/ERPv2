<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link href="/invoice.css" rel="stylesheet" type="text/css" />
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
                                        <div class="col ">

                                        </div>
                                        <div class="col company-details">
                                          <a class="logo-details" target="_blank" href="https://lobianijs.com">
                                              <img src="http://www.bluetech-sd.com/assets/images/capture-242x128.png" data-holder-rendered="true" />
                                              </a>
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
                                            <h3 class="to">To</h3>
                                              <div class="phone">#{!!$Qouatation->customer->no!!}</div>
                                            <div class="address">{!!$Qouatation->customer->name!!}</div>
                                            <div class="phone">{!!$Qouatation->customer->phone!!}</div>
                                                      <div class="address">{!!$Qouatation->customer->address!!}</div>
                                                                <div class="email">{!!$Qouatation->customer->email!!}</div>
                                        </div>
                                        <div class="col invoice-details">
                                            <h3 class="invoice-id">Sales Quotation</h3>
                                            <div class="date">Ref.No #{!! $Qouatation->no!!}</div>
                                            <div class="date">Date #{!! $Qouatation->created_at!!}</div>
                                        </div>
                                    </div>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr>
                                                   <th >#</th>
                                                <th width="15%" class="text-left ">Item Code</th>
                                                <th class="text-left">Item Name</th>
                                                <th class="text-left">Description</th>
                                                <th width="10%" class="text-left">UOM</th>
                                                <th width="10%" class="text-right">Quantity</th>
                                                <th width="10%" class="text-right">Rate</th>
                                                <th width="10%" class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($Qouatation->QoutationDetails  as $index => $data)
                                            <tr>
                                                <td class="sn">{{$index +1}}</td>
                                                <td class="no">{!!$data->items->no!!}</td>
                                                <td class="text-left">{!!$data->items->name!!}</td>
                                                <td class="text-left">{!!$data->description!!}</td>
                                                <td class="qty">{!!$data->items->units->name!!}</td>
                                                <td class="unit">{!!$data->qty!!}</td>
                                                <td class="unit">{!!$data->price!!}</td>
                                                <td class="total">{!!$data->total!!}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="tfoo">
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="1">SUBTOTAL</td>
                                                <td colspan="1">{!! $Qouatation->amount!!}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="1">Discount {!! $Qouatation->discount!!}%</td>
                                                <td colspan="1">{!! ($Qouatation->amount * $Qouatation->discount ) / 100 !!}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="1">GRAND TOTAL</td>
                                                <td colspan="1">{!! $Qouatation->net_amount!!}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- <hr/><br/><br/> -->
                                    <div class="text-right">

                                                <tr>
                                                        <td colspan="8">Sig...................................</td>
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
