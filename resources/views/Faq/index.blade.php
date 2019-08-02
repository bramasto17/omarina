@extends('Layouts/master')


@section('Content')
	
	<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>FREQUENTLY ASKED QUESTION</h1>
					</div>
				</div>
			</div>
		</div>


	<div class="section">
		<div class="container">
			<div class="row">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						         <i class="glyphicon glyphicon-chevron-right"></i> Memesan Melalui Website
						        </a>
						      </h4>
						    </div>
						    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						      <div class="panel-body">
						       1. Akses menu kami dengan cara klik tombol product dan pilih product/rasa yang Anda 	   inginkan, klik tombol detail serta pilih tipe penyajian, ukuran dan juga jumlah yang ingin Anda pesan, setelah semua sudah di isi klik tombol add to cart dan pesanan Anda akan di masukan ke cart Anda.<br/><br/>

						       2. Setelah Anda selesai memesan semua product yang Anda inginkan, klik tombol cart di bagian kanan atas layar Anda, Anda dapat memeriksa pesanan Anda atau mengubah pesanan Anda, jika seluruh product yang ada di cart sudah sesuai dengan keinginan Anda klik Proceed to Checkout. <br/><br/>

						       3. Pada laman Checkout, Anda harus mengisi data Anda lalu klik tombol setup profile jika sudah mengisi data Anda dengan lengkap.<br/><br/>

						       4. Pastikan kembali pesanan dan data Anda di Verify Order, Jika sudah sesuai seluruhnya klik tombol Verify. <br/><br/>

						       5. Anda akan mendapat email dari kami tentang detail pembayaran dan catat Transaksion ID (Nomor Pesanan) Anda untuk verifikasi pembayaran dan bukti pesanan Anda.

						       6.Cara pembayaran dapat dilakukan via transfer ke rekening :<br/>
								Bank BCA  Acc : 2291634780 a/n Tomy Purnama<br/>
								Bank Permata Acc : 4000542623 a/n Tomy Purnama
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwo">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						        <i class="glyphicon glyphicon-chevron-right"></i>  Payment Confirmation
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="panel-body">
						        Setelah Anda melakukan pembayaran ke rekening kami, klik tombol Confirmation dan isi data transfer Anda dengan lengkap di : Transaction ID, Bank Tujuan, Bank pengirim, nomor rekening anda, dan jumlah pembayaran. Pastikan data yang anda isi benar, klik tombol Confirm, Anda akan mendapatkan email berisikan nomor resi dan detail transaksi dari kami paling lambat 1x24 jam  dan pesanan anda siap dikirim. Hubungi kami ke nomor telpon yang telah di sediakan jika Anda memiliki pertanyaan.
						      </div>
						    </div>
						  </div>


						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingThree">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						         <i class="glyphicon glyphicon-chevron-right"></i> Memesan melalui WhatsApp di nomor 08176543888 atau 0819-08771000
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						      <div class="panel-body">
						        Pada pemesanan di Whatsapp, harap dicantumkan Lumpia Rasa apa, dalam kondisi beku (frozen) atau digoreng, serta jumlahnya. Contoh : Lumpia Rasa Sapi, digoreng, 5 buah.
				Kemudian harap dicantumkan juga alamat pengiriman dengan lengkap dan keterangan lain yang diperlukan.<br/>
			Cara pembayaran dapat dilakukan via transfer ke rekening :<br/>
			Bank BCA  Acc : 2291634780 a/n Tomy Purnama<br/>
			Bank Permata Acc : 4000542623 a/n Tomy Purnama<br/>
			Setelah Anda melakukan transfer, bukti transfer difoto kemudian dikirimkan via Whatsapp kepada kami agar kami dapat mulai mengerjakan pesanan Anda. Harap bukti transfer dikirimkan pada hari yang sama.
						      </div>
						    </div>
						  </div>
						</div>



						  <!-- div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingThree">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						         <i class="glyphicon glyphicon-chevron-right"></i> Collapsible Group Item #3
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						      <div class="panel-body">
						        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						      </div>
						    </div>
						  </div>
						</div> -->

			</div>

		</div>

	</div>


@endsection
@section("PartialScript")
	<script type="text/javascript">
		$(function() {
			var active = $("#faq");
		    active.addClass("active");
		});
	</script>
@endsection