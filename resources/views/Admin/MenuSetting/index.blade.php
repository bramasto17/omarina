@extends('Layouts/master')

@section('PartialCSS')
<style type="text/css">
  .col-centered{
    float: none;
    margin: 0 auto;
}
</style>

@endsection

@section('Content')
<div ng-controller="MenuSettingCtrl as vm">
	
		<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Menu Setting</h1>
					</div>
				</div>
			</div>
		</div>	
	
		<div ng-cloak class="container">
			<!--search box-->

			<div class="row">
				<div class="col-md-3">
	                @include('Includes/navadmin')
				</div>
				<div class="col-md-9">
				<!--filter-->
					<div class="row mb">
						<div class="col-md-9">
							<form class="form-horizontal style-form">	
								<div class="col-md-6 col-sm-4 col-xs-8">
					            	<input type="text" class="form-control" placeholder="Type any to filter data" ng-model="txtFilter">
						  		</div>
								
							  	<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="btn-group">
									  <button ng-click="vm.BtnAddNewItemClick()" type="button" class="btn btn-primary">Add New Item</button>
									</div>
							  	</div>
						  </form>
					    </div>
				    </div>
				<hr>
        		<!--table-->
				<div class="col-md-12">
						<div class="content-panel mt">
							<table class="table table-striped table-advance table-hover">
					              <button style="margin-left:1%;" class="btn btn-grey btn-xs"><i class="glyphicon glyphicon-edit"></i></button> Edit Item Info
					              <button style="margin-left:1%;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button> Delete Item
					                <thead>
					                <tr>
					                    <th><i class="fa fa-bullhorn"></i>Item Name</th>
					                    <th><i class="fa fa-bookmark"></i>Small Price</th>
					                    <th><i class="fa fa-bookmark"></i>Regular Price</th>
					                    <th class="hidden-xs"><i class="fa fa-bookmark"></i> Description</th>
					                    <th><i class=" fa fa-edit"></i>Action</th>
					                </tr>
					                </thead>
					                <tbody>

					          		<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

					                <tr ng-repeat="item in vm.Items | filter : txtFilter">
					                    <td><a href="basic_table.html#">@{{item.ItemName}}</a></td>
					                    <td>@{{item.SmallPrice}}</td>
					                    <td>@{{item.RegularPrice}}</td>
					                    <td class="hidden-xs">@{{item.Description}}</td>
					                    
					                    <td>
					                          {{-- <button class="btn btn-success btn-xs" ng-click="IconViewClick()"><i class="fa fa-check"></i></button> --}}
					                          <button class="btn btn-grey btn-xs" ng-click="vm.IconEditClick(item)" ><i class="glyphicon glyphicon-edit"></i></button>
					                          <button class="btn btn-danger btn-xs" ng-click="vm.IconDeleteClick(item)"><i class="glyphicon glyphicon-remove"></i></button>
					                          
					                    </td>
					                </tr>

					              </tbody>
					            </table>
						</div>	
				</div>
				</div>
			</div>	<!--row-->

			<div ng-if="vm.showAlertSuccessAdd" >
	     	 		<div class="col-md-2 col-sm-2 alert alert-success alert-dismissible fade in" role="alert">Success add new menu
		     	 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
	     	 		</div>
	     	 </div>
	     	 

			<!--form Add New Menu-->
			<div ng-if="vm.showFormAddNewItem">
				<div class="row mt">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h2>Add New Item</h2>
					</div>
				</div>
				<div class="row mt">
					<form name="FormAddNewItem" class="form-horizontal style-form">		
						  <div class="col-md-12 col-sm-12 col-xs-12">  
						        <div class="form-group">
						          <label class="col-md-2 col-sm-4 control-label">Item Name</label>
						          <div class="col-sm-6">
						              <input type="text" class="form-control" ng-model="vm.txtItemName" required>
						          </div>
						        </div>
						        <div class="form-group">
						          <label class="col-md-2 col-sm-4 control-label">Small Price</label>
						          <div class="col-sm-6">
						              <input type="number" class="form-control" 
						              ng-model="vm.txtSmallPrice"
						              ng-disabled="!vm.txtItemName" 
						              required>
						          </div>
						        </div>
						        <div class="form-group">
						          <label class="col-md-2 col-sm-4 control-label">Regular Price</label>
						          <div class="col-sm-6">
						              <input type="number" class="form-control" 
						              ng-model="vm.txtRegularPrice"
						              ng-disabled="!vm.txtSmallPrice || !vm.txtItemName" 
						              required>
						          </div>
						        </div>
						         <div class="form-group">
						          <label class="col-md-2 col-sm-4 control-label">Description</label>
						          <div class="col-sm-6">
						              <textarea class="form-control" 
						              ng-model="vm.txtDescription"
						              ng-disabled="!vm.txtSmallPrice
						              || !vm.txtItemName
						              || !vm.txtRegularPrice" 
						              required></textarea>
						          </div>
						        </div> 
						        <div class="form-group">
						        	<label class="col-md-2 col-sm-4 control-label">Picture</label>
						         	<div class="col-md-6 col-sm-6">
						              <input type="file" class="form-control" accept="image/*" 
						              ng-files="vm.GetUploadedFiles($files)"  
						              ng-disabled="!vm.txtDescription
						              || !vm.txtSmallPrice
						              || !vm.txtRegularPrice
						              || !vm.txtItemName" 
						              required >
						         	 </div>
						         	 <h4><b>File harus berupa gambar dan ukuran maksimal 2mb</b></h4>
						         	 <div class="col-md-offset-2">
						         	 		<div ng-if="vm.showAlertSuccessUpload" >
							         	 		<div class="col-md-2 col-sm-2 alert alert-success" role="alert">Success upload file<i class="glyphicon glyphicon-ok"></i></div>
							         	 </div>
							         	 
							         	 <div ng-if="vm.showAlertErrorUpload" class="col-md-2 col-sm-2 alert alert-danger" role="alert">Fail to upload<i class="glyphicon glyphicon-remove"></i></div>	
						         	 </div>
						         	 

						         </div>   
						         {{-- <div class="form-group"> --}}
							         <div class="col-sm-12">
							         		<button ng-click="vm.BtnSaveClick()" class="btn btn-primary btn-lg"
							         		ng-disabled="!vm.txtDescription
						              		|| !vm.txtSmallPrice
						              		|| !vm.txtRegularPrice
						              		|| !vm.txtItemName
						              		|| !vm.successUpload">
						              		Save</button>       
							         		<button ng-click="vm.BtnCancelAddClick()" class="btn btn-primary btn-lg" >Cancel</button>       
							         		<button type="reset" class="btn btn-primary btn-lg">Reset</button>           		
							         </div>
						         {{-- </div>     --}}
					        </div> 
					    </form>    
					</div>
				</div>


				<!--form Edit Menu-->
			<div ng-if="vm.showFormEditItem">
				<div class="row mt">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h2>Edit @{{vm.EditItemName}} Information</h2>
					</div>
				</div>
				<div class="row mt">
					<form name="FormAddNewItem" class="form-horizontal style-form">	
						 <div class="col-md-6 col-sm-6 col-xs-12">
						 	<div class="alert alert-warning" role="alert">
						 		<strong>Warning!</strong> Any update in this form will result in real information change
						 	</div>
		    				<div class="product-image-large">
		    					<img ng-src="Assets/img/product/@{{vm.EditItemName}}/@{{vm.ePicture}}" alt="Item Name" height="250px">
		    				</div>
		    			 </div>		
						  <div class="col-md-6 col-sm-6 col-xs-12">  
						        <div class="form-group">
						          <label class="col-md-3 col-sm-4 control-label">Item Name</label>
						          <div class="col-sm-6">
						              <input type="text" class="form-control" ng-model="vm.etxtItemName" required>
						          </div>
						        </div>
						        <div class="form-group">
						          <label class="col-md-3 col-sm-4 control-label">Small Price</label>
						          <div class="col-sm-6">
						              <input type="number" class="form-control" 
						              ng-model="vm.etxtSmallPrice"
						              required>
						          </div>
						        </div>
						        <div class="form-group">
						          <label class="col-md-3 col-sm-4 control-label">Regular Price</label>
						          <div class="col-sm-6">
						              <input type="number" class="form-control" 
						              ng-model="vm.etxtRegularPrice"
						              required>
						          </div>
						        </div>
						         <div class="form-group">
						          <label class="col-md-3 col-sm-4 control-label">Description</label>
						          <div class="col-sm-6">
						              <textarea class="form-control" 
						              ng-model="vm.etxtDescription"
						              required></textarea>
						          </div>
						        </div> 
						        <div class="form-group">
						        	<label class="col-md-3 col-sm-4 control-label">Picture</label>
						         	<div class="col-md-6 col-sm-6">
						              <input type="file" class="form-control" accept="image/*" 
						              ng-files="vm.GetUploadedFiles($files)"  
						              required >
						         	 </div>
						         	 <div class="col-md-12">
						         	 		<h4>Jika tidak ingin mengubah gambar, tidak perlu upload</h4>
						         	 		<h4>File harus berupa gambar dan ukuran maksimal 2mb</h4>

						         	 </div>
						         	 <br>
						         	 <div class="col-md-12">
											<div ng-show="vm.showAlertSuccessUpload" >
								         	 		<div class="col-md-8 col-sm-8 alert alert-success" role="alert"><strong>Success</strong> upload file
								         	 		<i class="glyphicon glyphicon-ok"></i></div>
								         	 </div>
								         	 
								         	 <div ng-show="vm.showAlertErrorUpload" class="col-md-8 col-sm-8 alert alert-danger" role="alert">Please upload image<i class="glyphicon glyphicon-remove"></i></div>						         	 	
						         	 </div>
						         	 

						         </div>   
						         {{-- <div class="form-group"> --}}
							         <div class="col-sm-12">
							         		<button ng-click="vm.BtnUpdateClick()" class="btn btn-primary btn-lg"
							         		ng-disabled="!vm.etxtDescription
						              		|| !vm.etxtSmallPrice
						              		|| !vm.etxtRegularPrice
						              		|| !vm.etxtItemName
						              		|| !vm.eSuccessUpload">
						              		Update</button>       
							         		<button ng-click="vm.BtnCancelEditClick()" class="btn btn-primary btn-lg" >Cancel</button>       
							         		<button type="reset" class="btn btn-primary btn-lg">Reset</button>           		
							         </div>
						         {{-- </div>     --}}
					        </div> 
					    </form>    
					</div>
				</div>

		</div>
</div>
		

@endsection

@section('PartialScript')
	<script src="AngularJS/Controllers/MenuSettingCtrl.js"></script>
	<script src="AngularJS/Services/MenuSettingService.js"></script>
	<script src="AngularJS/Directives/ngFiles.js"></script>

@endsection