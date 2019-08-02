@extends('Email/master')

@section('Content')
<div ng-controller="ConfirmationCtrl as vm">
	<div class="section" ng-cloak>
		<div class="container">
			<div class="row setup-content">
		        <div class="col-md-12">        		
		            <div class="col-md-10 col-sm-10 col-xs-10">
		            	<a href="{{route('home')}}"><img src="Assets/img/mPurpose-logo.png"></a>
					</div>
				</div>
			</div>
			<div class="row setup-content">
				<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
					<h3>Pesanan anda dengan nomor @{{vm.TransactionID}} telah diterima</h3>
					<p>Dear <b>Bramasto Wibisono</b>,</p>
					<p>
						Kami telah menerima pesanan anda, mohon lakukan pembayaran sebesar <b>Rp. @{{vm.GrandTotal}}</b> melalui transfer ke salah satu rekening yang ada di bawah : <br>
						Bank BCA Acc : 2291634780 a/n Tomy Purnama <br>
						Bank Permata Acc : 4000542623 a/n Tomy Purnama <br>

						<br><br>
						Setelah anda melakukan pembayaran, anda bisa mengkonfirmasi pembayaran dengan mengisi form konfirmasi <a href="confirmation">disini</a>.
					</p>
					<span>Detail pemesanan</span>
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
	               			<tr ng-repeat="product in vm.Cart">
								<td>@{{product.ItemName}}</td>
								<td class="text-center">@{{product.Type}}</td>
								<td class="text-center">@{{product.Package}} pcs/pack</td>
	                  		<td class="text-center">@{{product.Size}}</td>
								<td class="text-center">@{{product.ItemPrice}}</td>
								<td class="text-center">@{{product.Quantity}}</td>
								<td class="text-right">Rp. @{{product.TotalPrice}}</td>
						  	</tr>
			                <tr>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line text-center"><strong>Biaya Kirim</strong></td>
			                    <td class="no-line text-right">Rp. @{{vm.DeliveryFee}}</td>
			                </tr>
			                <tr>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line"></td>
			                    <td class="no-line text-center"><strong>Total</strong></td>
			                    <td class="no-line text-right">Rp. @{{vm.GrandTotal}}</td></td>
			                </tr>
						</tbody>
					</table>
					<span>Bila anda mengalami masalah bisa melihat bantuan kami <a href="faq"> disini</a> atau menghubungi kami <a href="about">disini</a>.</span>
					<span><br><br>Hormat Kami, <br> <b>Lumpia Omarina</b></span>
				</div>
			</div>
		</div><!--/container-->
	</div><!--/section-->
</div>	
@endsection    
@section("PartialScript")
	<script src="AngularJS/Controllers/ConfirmationCtrl.js"></script>
	<script src="AngularJS/Services/ConfirmationService.js"></script>
	<script src="AngularJS/Directives/ngFiles.js"></script>

	<script type="text/javascript">
		$(function() {
			var active = $("#confirmation");
		    active.addClass("active");
		});
	</script>
@endsection