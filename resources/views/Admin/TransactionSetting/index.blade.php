@extends('Layouts/master')

@section('Content')
<div ng-controller="TransactionSettingCtrl as vm">
    

	<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Transaction Setting</h1>
					</div>
				</div>
			</div>
		</div>


	<!--table-->	
		<div class="container">
			<div class="row">
				<div class="col-md-3">
                @include('Includes/navadmin')
				</div>

				<div ng-cloak class="col-md-9">
						<div class="content-panel mt">
							<table class="table table-striped table-advance table-hover">
					      	  	  <hr>
					              <!-- Single button -->
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @{{vm.shownTransactionStatus}} <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                             <li><a href="javascript:void(0)" ng-click="vm.ddlStatusClick('Order Masuk')">Order Masuk</a></li>
                                            <li><a href="javascript:void(0)" ng-click="vm.ddlStatusClick('Menunggu Konfirmasi')">Menunggu Konfirmasi</a></li>
                                            <li><a href="javascript:void(0)" ng-click="vm.ddlStatusClick('Sedang Proses')">Sedang Proses</a></li>
                                            <li><a href="javascript:void(0)" ng-click="vm.ddlStatusClick('Telah Dikirim')">Telah Dikirim</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="javascript:void(0)" ng-click="vm.ddlStatusClick()">Semua Transaksi</a></li>
                                          </ul>
                                        </div>
					              
					                <thead>
					                <tr>
					                    <th><i class="fa fa-bullhorn"></i>TransactionID</th>
					                    <th class="hidden-xs"><i class="fa fa-bookmark"></i> Status</th>
					                    <th><i class="fa fa-bookmark"></i> Name</th>
					                    <th class="hidden-xs"><i class="fa fa-bookmark"></i> Email</th>
					                    <th class="hidden-xs"><i class=" fa fa-edit"></i> Phone</th>
					                    <th><i class=" fa fa-edit"></i>Action</th>
					                </tr>
					                </thead>

					                <tbody>
                                    <div></div>
					                <tr ng-repeat="transaction in vm.Transactions">
					                    <td>@{{transaction.TransactionID}}</td>
					                    <td class="hidden-xs">@{{transaction.Status}}</td>
					                    <td>@{{transaction.CustomerName}}</td>
					                    <td class="hidden-xs">@{{transaction.CustomerEmail}}</td>
					                    <td class="hidden-xs">@{{transaction.Phone}}</td>
					                    <td>
					                          <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"
                                              ng-click="vm.BtnViewClick(transaction)">View</a>
					                    </td>
					                </tr>
					              </tbody>
					            </table>
						</div>	
				</div>
			</div>	
		</div>

	<!-- Large modal -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Transaction Detail</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">TransactionID # @{{vm.TransactionID}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Customer Information:</strong><br>
    					@{{vm.CustomerName}}<br>
    					@{{vm.CustomerEmail}}<br>
    					@{{vm.Phone}}<br>
    					@{{vm.Address}}<br>
    					@{{vm.City}}<br>
    					@{{vm.Province}}<br>
    					@{{vm.Postcode}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					@{{vm.OrderDate}}<br><br>
    				</address>
    			</div>
    			<div ng-if="vm.shownTransactionStatus=='Menunggu Konfirmasi'" class="col-xs-6 text-right">
        			<address>
    					<strong>Payment Information:</strong><br>
                        @{{vm.BankFrom}} a/n @{{vm.AccountName}}<br>
                        Rekening: @{{vm.SenderAccount}}<br>  
    					To<br>
    					Omarina @{{vm.BankTo}}<br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div> 
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Nama</strong></td>
        							<td class="text-center"><strong>Tipe</strong></td>
                                    <td class="text-center"><strong>Package</strong></td>
        							<td class="text-center"><strong>Ukuran</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Jumlah</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr ng-repeat="detail in vm.DetailTransactions">
                                    <td>@{{detail.ItemName}}</td>
                                    <td class="text-center">@{{detail.Type}}</td>
                                    <td class="text-center">@{{detail.Package}} pcs/pack</td>
                                    <td class="text-center">@{{detail.Size}}</td>
                                    <td class="text-center">@{{detail.ItemPrice}}</td>
                                    <td class="text-center">@{{detail.Quantity}}</td>
                                    <td class="text-right">Rp. @{{detail.TotalPrice}}</td>
                               </tr>
    							<tr>
                                    <td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Rp. @{{vm.GrandTotal - vm.Delivery}}</td>
    							</tr>
    							<tr>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Pengiriman</strong></td>
    								<td class="no-line text-right">Rp. @{{vm.Delivery}}</td>
    							</tr>
    							<tr>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Transaksi</strong></td>
    								<td class="no-line text-right">Rp. @{{vm.GrandTotal}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <div ng-if="vm.shownTransactionStatus == 'Order Masuk'" class="row">
        <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
               <div class="cart-shippment-options">
                    <h6><i class="glyphicon glyphicon-plane"></i> <strong>Input Harga Pengiriman</strong></h6>
                    <div class="input-append">
                        <input type="number" ng-model="vm.txtDeliveryPrice">
                    </div>
                </div>
            </div>
    </div>
    <div ng-if="vm.shownTransactionStatus == 'Sedang Proses'" class="row">
        <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
               <div class="cart-shippment-options">
                    <h6><i class="glyphicon glyphicon-plane"></i><strong>Input Nomor Resi</strong></h6>
                    <div class="input-append">
                        <input type="number" ng-model="vm.txtNomorResi">
                    </div>
                </div>
            </div>
    </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button ng-click="vm.BtnCancelClick()" type="button" class="btn btn-default">Batalkan</button>
	        <button ng-disabled="!vm.txtDeliveryPrice" ng-click="vm.BtnAcceptClick()" ng-if="vm.shownTransactionStatus == 'Order Masuk'" type="button" class="btn btn-primary">Terima Order</button>
            <button ng-click="vm.BtnConfirmClick()" ng-if="vm.shownTransactionStatus == 'Menunggu Konfirmasi'" type="button" class="btn btn-primary">Konfirmasi</button>
            <button ng-disabled="!vm.txtNomorResi" ng-click="vm.BtnKirimClick()" ng-if="vm.shownTransactionStatus == 'Sedang Proses'" type="button" class="btn btn-primary">Kirim</button>
            
	      </div>
	    </div>
	  </div>
	</div>

</div>
@endsection

@section('PartialScript')
	<script src="AngularJS/Controllers/TransactionSettingCtrl.js"></script>
	<script src="AngularJS/Services/TransactionSettingService.js"></script>

@endsection