<style type="text/css">
	.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: rgba(245, 87, 87, 0);
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    //background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    //padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    //background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
</style>
<div class="container" id="wrapper">
	<div class="mix dogs col-sm-2"></div>
	<div class="mix cats col-sm-8" id="products" style=" padding: 10px; background: white;">
		<div class="col-xs-2 col-md-3" style="padding: 0px;">
		 	<li class="dropdown" style="border: #bbbbbb 1px solid; padding: 6px;">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By Category <b class="caret"></b></a>
			    <ul class="dropdown-menu">
			       	<a href="<?php echo base_url('Product');?>" class="list-group-item">All Category</a>
			        <a href="" class="list-group-item" ng-click="loadProduct_by_Cat(x.Id)" ng-repeat="x in categories">{{x.Name}}</a>
			    </ul>
			</li>
		</div>
		
	 	<div class="col-md-6"></div>
		<div class="col-md-3">

		 	<strong>Display</strong>
	        <div class="btn-group">
	            <a href="#" id="list" class="btn btn-default btn-sm">
	            	<span class="glyphicon glyphicon-th-list"></span>List
	            </a>
	            <a href="#" id="grid" class="btn btn-default btn-sm">
	            	<span class="glyphicon glyphicon-th"></span>Grid
	            </a>
	        </div>
	    </div>

	 	<div class="row">
			<div class="col-lg-12"><h4 style="padding:5px;background: #ff9800;color:white; height: 40px; line-height: 2"> Product Listing</h4></div>
		</div>
	    <div id="products" class="row list-group" style="box-shadow: none;">
	        <div class="item  col-xs-12 col-md-6 col-lg-3" ng-repeat="x in get_product | filter:searchBox ">
	        	<a href="<?php echo base_url('product/product_page_detail/{{x.P_id}}')?>">
		            <div class="thumbnail">
		                <img style="height: 160px;" class="group list-group-image" title="{{x.P_name}}" src="<?php echo base_url('assets/uploads/{{x.Path}}');?>"/>
		                <div class="caption">
		                    <p class="group inner list-group-item-heading">{{x.P_name}}</p><hr />
		                    <div class="row">
		                        <div class="col-xs-12 col-md-6">
		                            <p class="lead">${{x.Price}}</p>
		                        </div>
		                         <div class="col-xs-12 col-md-6">
		                         	<del><p class="lead" style="color: red">$900</p></del>
		                         </div>
		                    </div><!-- class row -->
		                </div><!-- class caption -->
		            </div>
	            </a>
	        </div>
    	</div>
    	<div class="row">
	    	<div class="mix cats col-sm-12">
	    			<a href="<?php echo base_url('Product');?>"><h5  class="well well-sm" style="text-align: center;">View all</h5></a>
	    	</div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
