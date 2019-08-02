(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.controller('ProductCtrl',function($scope,ProductService,CartService){

			var vm = this;
			var Cart =[];
			vm.Products = [];
			
			vm.ItemID = "";
			vm.ItemName = "";
			vm.ItemPrice = "";
			vm.Description = "";

			vm.linkBackClick = linkBackClick;
			vm.loading = true;
			vm.showCatalog = false;
			vm.showDetail = false;
			vm.BtnDetailClick = BtnDetailClick;
			vm.BtnAddToCartClick = BtnAddToCartClick;

			Initialize();			
			function Initialize(){
				GetAllProduct();
				GetCart();
				//CartService.RemoveCart();
				
			}

			function Reset(){
				vm.ItemID = "";
				vm.ItemName = "";
				vm.ItemPrice = "";
				vm.Description = "";
				vm.Size = "";
				vm.Package ="";
				vm.Type="";
				vm.Quantity = "";

			}

			function GetAllProduct(){
				vm.loading=true;
				ProductService.GetAllProduct()
					.then(function(res){
						vm.Products = res.data;
						vm.loading = false;
						vm.showCatalog = true;
					});
			}

			function GetCart(){
				Cart = CartService.GetCart();
				console.log(Cart);
			}

			function BtnDetailClick(Product){
				vm.showCatalog = false;
				vm.showDetail = true;
				vm.ItemID = Product.ItemID;
				vm.ItemName = Product.ItemName;
				vm.SmallPrice = Product.SmallPrice;
				vm.RegularPrice = Product.RegularPrice;
				vm.Description = Product.Description;
				vm.Picture = Product.Picture;
			}

			function BtnAddToCartClick(){
				var price;
				if(vm.Size == "Kecil"){
					 price = vm.SmallPrice;
				}else if(vm.Size== "Reguler"){
					 price = vm.RegularPrice;
				}
				var ProductToCart = {
					ItemID : vm.ItemID,
					ItemName : vm.ItemName,
					ItemPrice : price,
					Picture : vm.Picture,
					Type : vm.Type,
					Size : vm.Size,
					Package : vm.Package,
					Quantity : vm.Quantity,
					TotalPrice : (vm.Package * vm.Quantity * vm.ItemPrice)
				}

				Cart.push(ProductToCart)
				CartService.SetCart(Cart);
				alert("Item telah dimasukkan ke Cart");
				GetCart();
				vm.showCatalog = true;
				vm.showDetail = false;
				Reset();
			}

			function linkBackClick(){
				vm.showCatalog = true;
				vm.showDetail = false;
				Reset();
			}

		});


})();