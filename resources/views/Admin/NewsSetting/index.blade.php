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
<div ng-controller="NewsSettingCtrl as vm">
	
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>News Setting</h1>
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
					<h4>This page is used to manage news in the news page</h4>
					<hr>
						<form class="form-horizontal style-form">	
							<div class="col-md-6 col-sm-4 col-xs-8">
				            	<input type="text" class="form-control" placeholder="Type any to filter data" ng-model="txtFilter">
					  		</div>
							
						  	<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="btn-group">
								  <button ng-click="vm.BtnAddNewsClick()" type="button" class="btn btn-primary">Add News</button>
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
				              <button style="margin-left:1%;" class="btn btn-grey btn-xs"><i class="glyphicon glyphicon-edit"></i></button> Edit News Info
				              <button style="margin-left:1%;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button> Delete News
				                <thead>
				                <tr>
				                    <th><i class="fa fa-bullhorn"></i>Title</th>
				                    <th class="hidden-xs"><i class="fa fa-bookmark"></i> Content</th>
				                    <th><i class=" fa fa-edit"></i>Action</th>
				                </tr>
				                </thead>
				                <tbody>

				          		<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

				                <tr ng-repeat="news in vm.News | filter : txtFilter">
				                    <td><a href="">@{{news.Title}}</a></td>
				                    <td class="hidden-xs">@{{news.Content}}</td>
				                    <td>
				                          <button class="btn btn-grey btn-xs" ng-click="vm.IconEditClick(news)" ><i class="glyphicon glyphicon-edit"></i></button>
				                          <button class="btn btn-danger btn-xs" ng-click="vm.IconDeleteClick(news)"><i class="glyphicon glyphicon-remove"></i></button>
				                          
				                    </td>
				                </tr>

				              </tbody>
				            </table>
					</div>	
			</div>
			</div>
		</div>	<!--row-->

		<div ng-if="vm.showAlertSuccessAdd" >
     	 		<div class="col-md-2 col-sm-2 alert alert-success alert-dismissible fade in" role="alert">Success add news
	     	 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
     	 		</div>
     	 </div>
     	 

		<!--form Add New Menu-->
		<div ng-if="vm.showFormNews">
			<div class="row mt">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h2>@{{vm.txtForm}}</h2>
				</div>
			</div>
			<div class="row mt">
				<form name="FormAddNewNews" class="form-horizontal style-form">		
					  <div class="col-md-12 col-sm-12 col-xs-12">  
					        <div class="form-group">
					          <label class="col-md-2 col-sm-4 control-label">Title</label>
					          <div class="col-sm-6">
					            <input type="text" class="form-control" ng-model="vm.txtTitle" required>
					          </div>
					        </div>
					        <div class="form-group">
					        	<label class="col-md-2 col-sm-4 control-label">Content</label>
						     	<div class="col-sm-6">
					              	<textarea class="form-control" 
					              	ng-model="vm.txtContent"
					              	ng-disabled="!vm.txtTitle" 
					              	required></textarea>
					        	</div>
					        </div>
					        <div class="col-sm-12">
					         		<button ng-click="vm.BtnSaveClick()" class="btn btn-primary btn-lg"
					         		ng-disabled="!vm.txtContent
				              		|| !vm.txtTitle" ng-if="vm.showBtnAdd">
				              		Save</button>
				              		<button ng-click="vm.BtnUpdateClick()" class="btn btn-primary btn-lg"
					         		ng-disabled="!vm.txtContent
				              		|| !vm.txtTitle" ng-if="vm.showBtnUpdate">
				              		Update</button> 
					         		<button ng-click="vm.BtnCancelClick()" class="btn btn-primary btn-lg" >Cancel</button>       
					         		<button type="reset" class="btn btn-primary btn-lg">Reset</button>           		
					        </div>
				        </div> 
				    </form>    
				</div>
			</div>
			<!--form Edit Menu-->
	</div>
</div>
		

@endsection

@section('PartialScript')
	<script src="AngularJS/Controllers/NewsSettingCtrl.js"></script>
	<script src="AngularJS/Services/NewsService.js"></script>
	<script src="AngularJS/Directives/ngFiles.js"></script>

@endsection