@extends('layouts.back.index')

@section('title', 'Admin | Setting Home')

@section('content')

@section('cssin')
<link rel="stylesheet" href="{{asset('b/jquery-ui-1.11.4/jquery-ui.min.css')}}">
<style>
	.hided {
		display: none;
	}
	.tambah {
		margin-top: 10px;
	}
	.portlet {
	    margin: 0 1em 1em 0;
	    padding: 0.3em;
	}
	.portlet-header {
	    padding: 0.2em 0.3em;
	    margin-bottom: 0.5em;
	    position: relative;
	}
	.portlet-content {
	    padding: 0.4em;
	}
	.portlet-placeholder {
	    border: 1px dotted black;
	    margin: 0 1em 10px 0;
	    height: 42px;
	    width: 100%;
	}
	.box-body .box {
		margin-bottom: 10px;
	}
	.collapsed-box {
		cursor: move;
	}
	.ads-bottom-head, .ads-middle, .sidebar-left, .sidebar-300, .col-area-3, .col-area-4, .widget-sidebar {
		display: none;
	}
	.wid {
		margin-top: 10px;
	}
</style>
@endsection

<?php  $set = unserialize($sethome->value); ?>
<input type="hidden" id="page-display" value="homepage">
<section class="content-header">
      <h1>
        Tampilan Beranda / Homepage
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
	  	<div class="alert alert-{{ Session::get('flash_notification.level') }}">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	        {{ Session::get('flash_notification.message') }}
	    </div>
	@endif

    <section class="content">
    	<div class="row">
			<div class="col-md-5">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Widget yang Tersedia</h3>
		              <!--h3 class="box-title">Collapsible Accordion</h3-->
		            </div>
		            <div class="box-body">
		            	<div class="row">
							<div class="col-md-6">
								<a href="#myModal" data-id="ads-250" style="width:100%" class="btn btn-default open-WidgetDialog" data-toggle="modal">Iklan 250</a>
								<p>Iklan 200 merupakan iklan untuk sidebar berukuran 250px</p>
							</div>
							<div class="col-md-6">
								<a data-id="ads-300" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Iklan 300</a>
								<p>Iklan 200 merupakan iklan untuk sidebar berukuran 300px</p>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6">
								<a data-id="ads-930" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Iklan 930</a>
								<p>Iklan 930 merupakan iklan untuk sidebar berukuran 930px atau yang dibawahnya.</p>
							</div>
							<div class="col-md-6">
								<a data-id="widget-social" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Sosial</a>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6">
								<a data-id="widget-news" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget News</a>
							</div>
							<div class="col-md-6">
								<a data-id="widget-kecamatan" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Kecamatan</a>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6 wid">
								<a data-id="widget-lifestyle" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Lifestyle</a>
							</div>
							<div class="col-md-6 wid">
								<a data-id="widget-list-populer" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget List Populer Post</a>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6 wid">
								<a data-id="widget-tab-news" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Tab News</a>
							</div>
							<div class="col-md-6 wid">
								<a data-id="widget-facebook" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Facebook</a>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6 wid">
								<a data-id="widget-photo-post" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget Photo Post</a>
							</div>
							<div class="col-md-6 wid">
								<a data-id="widget-list-images-news" style="width:100%" class="btn btn-default open-WidgetDialog" href="#myModal" data-toggle="modal">Widget List Image News</a>
							</div>
						</div>
		            </div>
				</div>
			</div>
			
			<div class="col-md-7">
					<div class="row">
						<div class="col-md-6">
							<div class="box box-success">
								<div class="box-header with-border">
									<h4 class="box-title">Iklan 930 Atas</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc930" id="ads-bottom-head">

									<?php $ads_bottom_head = $set['ads-bottom-head']; ?>
				
									@foreach($ads_bottom_head as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay ads-bottom-head">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							<div class="box box-success">
								<div class="box-header with-border">
									<h4 class="box-title">Iklan 930 Tengah</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc930" id="ads-middle">
									
									<?php $ads_middle = $set['ads-middle']; ?>
				
									@foreach($ads_middle as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay ads-middle">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							<div class="box box-danger">
								<div class="box-header with-border">
									<h4 class="box-title">Sidebar Kiri Atas</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc" id="sidebar-left">
									
									<?php $sidebarleft = $set['sidebar-left']; ?>
				
									@foreach($sidebarleft as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay sidebar-left">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							<div class="box box-danger">
								<div class="box-header with-border">
									<h4 class="box-title">Sidebar Kanan Atas</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc" id="sidebar-300">
									
									<?php $sidebar_300 = $set['sidebar-300']; ?>
				
									@foreach($sidebar_300 as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay sidebar-300">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="box box-info">
								<div class="box-header with-border">
									<h4 class="box-title">Sidebar Kiri Bawah</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc" id="col-area-3">
									<input name="widget" type="hidden" value="col-area-3">
									<?php $col_area_3 = $set['col-area-3']; ?>
				
									@foreach($col_area_3 as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay col-area-3">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							<div class="box box-info">
								<div class="box-header with-border">
									<h4 class="box-title">Sidebar Tengah Bawah</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc" id="col-area-4">
									<?php $col_area_4 = $set['col-area-4']; ?>
				
									@foreach($col_area_4 as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay col-area-4">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
							<div class="box box-info">
								<div class="box-header with-border">
									<h4 class="box-title">Sidebar Kanan Bawah</h4>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" type="button" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="box-body boc" id="sidebar">
									<?php $sidebar = $set['sidebar']; ?>
				
									@foreach($sidebar as $side)
										<?php 
											  $d = strrpos($side, '-');
											  $frontWord = substr($side, 0, $d);
											  $h = strrpos($side, '-');
											  $backWord= substr($side, $d+1);
										?>
										@include('back.settings.include.'.$frontWord, ['value'=>$backWord])
										
									@endforeach
								</div>
								<div class="overlay widget-sidebar">
						            <i class="fa fa-refresh fa-spin"></i>
						        </div>
							</div>
						</div>
					</div>
				
			</div>
    	</div>
    </section>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Pilih Letak</h4>
    </div>
    <div class="modal-body">
    	<form class="form-horizontal">
    		<div class="radio sidebarwidget">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="sidebarleft" value="sidebar-left">Sidebar Kiri Atas
			  </label>
			</div>
			<div class="radio sidebarwidget sideright">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="sidebarright" value="sidebar-300">Sidebar Kanan Atas
			  </label>
			</div>
			<div class="radio ads930">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="adstop" value="ads-bottom-head">Iklan Atas 930
			  </label>
			</div>
			<div class="radio ads930">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="adsmiddle" value="ads-middle">Iklan Tengah 930
			  </label>
			</div>
			<div class="radio sidebarwidget">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="area3" value="col-area-3">Sidebar Kiri Bawah
			  </label>
			</div>
			<div class="radio sidebarwidget" >
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="area4" value="col-area-4">Sidebar Tengah Bawah
			  </label>
			</div>
			<div class="radio sidebarwidget">
			  <label>
			    <input class="dismis" type="radio" name="optionsRadios" id="area5" value="sidebar">Sidebar Kanan Bawah
			  </label>
			</div>
			<input type="hidden" value="" id="widgetid">
    	</form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button id="dropwidget" type="button" class="btn btn-primary" data-dismiss="modal">Pindahkan</button>
      </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	

@section('js')
<script src="{{asset('b/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
<script src="{{asset('b/js/widget.js')}}"></script>
<script>
	$(document).ready(function(){
		$(document).on("click", ".open-WidgetDialog", function () {
		     var myWidgetId = $(this).data('id');
		     $(".modal-body #widgetid").val( myWidgetId );
		     if(myWidgetId == 'ads-930'){
		     	$('.sidebarwidget').hide();
		     } else if(myWidgetId == 'ads-300'){
		     	$('.sidebarwidget, .ads930').hide();
		     	$('.sideright').show();
		     } else if(myWidgetId == 'ads-250'){
		     	$('.sideright,.ads930').hide();
		     }else {
		     	$('.ads930').hide();
		     	$('.sideright').show();
		     }
		});
		$('#myModal').on('hidden.bs.modal', function () {
			$('.dismis').prop('checked', false);
			$('.radio').show();
		});
	});
$(document).ready(function () {
		$('#dropwidget').click(function () {
			var type = $('#widgetid').val();
			var radio = $('input[name=optionsRadios]:checked').val();
			var adstop = $('#ads-bottom-head');
			var adsmiddle = $('#ads-middle');
			var sidebarleft = $('#sidebar-left');
			var sidebar300 = $('#sidebar-300');
			var colarea3 = $('#col-area-3');
			var colarea4 = $('#col-area-4');
			var sidebar = $('#sidebar');
			var col_ads_bottom_head = 'ads-bottom-head';
			var col_ads_middle = 'ads-middle';
			var col_sidebar_left = 'sidebar-left';
			var col_sidebar_300 = 'sidebar-300';
			var col_area_3 = 'col-area-3';
			var col_area_4 = 'col-area-4';
			var col_sidebar = 'sidebar';
			var page_display = $('#page-display').val();
			
			if(type == 'ads-930'){
				if(radio == 'ads-bottom-head'){
					var col = col_ads_bottom_head;
					var targetId = adstop;
					ajaxDropWidget(col, type, targetId, page_display);
				}
				else if(radio == 'ads-middle'){
					var col = col_ads_middle;
					var targetId = adsmiddle;
					ajaxDropWidget(col, type, targetId, page_display);
				}
			}
			else {
				if(radio == 'sidebar-left'){
					var col = col_sidebar_left;
					var targetId = sidebarleft;
					ajaxDropWidget(col, type, targetId, page_display);
				}
				else if(radio == 'sidebar-300'){
					var col = col_sidebar_300;
					var targetId = sidebar300;
					ajaxDropWidget(col, type, targetId, page_display);
				}
				else if(radio == 'col-area-3'){
					var col = col_area_3;
					var targetId = colarea3;
					ajaxDropWidget(col, type, targetId, page_display);
				}
				else if(radio == 'col-area-4'){
					var col = col_area_4;
					var targetId = colarea4;
					ajaxDropWidget(col, type, targetId, page_display);
				}
				else if(radio == 'sidebar'){
					var col = col_sidebar;
					var targetId = sidebar;
					ajaxDropWidget(col, type, targetId, page_display);
				}
			}

		});
	});
function ajaxDropWidget(col, key, targetId, page)
{
	showLoader(col);
	$.ajax({
		url: "{{url('kukaradmin/savewidget')}}",
		data: {column:col,key:key,page:page},
		dataType: "json",
		cache: false,
		success: function(data){
			var dataid = data.id;
			chooseWidget(key, targetId, data.id);
			hideLoader();
		}
	});
}
function chooseWidget(key, targetId, dataid)
{
	if(key == 'ads-930' || key == 'ads-250' || key == 'ads-300'){
		widgetAds(targetId, dataid);
	}else if (key == 'widget-social' || key == 'widget-kecamatan'){
		widgetsocial(targetId, dataid);
	}else if (key == 'widget-news' || key == 'widget-lifestyle' || key == 'widget-photo-post' || key == 'widget-tab-news'){
		widgetCategory(targetId, dataid);
	}else if(key == 'widget-list-populer') {
		widgetPopuler(targetId, dataid);
	}else if(key == 'widget-facebook') {
		widgetFacebook(targetId, dataid);
	}else if(key == 'widget-list-images-news') {
		widgetImagesNews(targetId, dataid);
	}
}
	
function delIdBanner(e)
{
	if(e.keyCode == 8 || e.keyCode == 46) {
		$(e.target).parent().find('.imun').val('');
	}
}
function simpan(e){
	var parent = $(e.target).parent().parent();
	var col = $(e.target).parent().parent().parent().attr('id');
	var item = $(e.target).parent().parent().attr('id');
	var data = parent.data('widget');
	
	if(data == 'ads'){
		var selected = parent.find(':selected').val();
		if(selected == 'choose'){
			var input = parent.find('.imun').serializeArray();
		}else if(selected == 'text') {
			var input = parent.find('textarea').val();
		}
			
		showLoader(col);
		$.ajax({
			url: "{{url('kukaradmin/saveinput')}}",
			data: {data:input,column:col,key:item,selected:selected},
			dataType: "json",
			cache: false,
			success: function(data){
				if(data.result == 'error'){
				alert('Data tidak tersimpan, data input harus diisi.');
				}
				hideLoader();
			}
		});
	}else if(data == 'category'){
		var input = parent.find('.imun').val();
		var title = parent.find('.title').val();
		var count = parent.find('.count').val();
		showLoader(col);
		$.ajax({
			url: "{{url('kukaradmin/saveinputcat')}}",
			data: {data:input,column:col,key:item,title:title,count:count,cat:data},
			dataType: "json",
			cache: false,
			success: function(data){
				if(data.status == 'error'){
					alert(data.message);
				}
				console.log(data.status);
				hideLoader();
			}
		});
	}else if(data == 'populer'){
		var title = parent.find('.title').val();
		var count = parent.find('.count').val();
		showLoader(col);
		$.ajax({
			url: "{{url('kukaradmin/saveinputcat')}}",
			data: {column:col,key:item,title:title,count:count,cat:data},
			dataType: "json",
			cache: false,
			success: function(data){
				if(data.status == 'error'){
					alert(data.message);
				}
				hideLoader();
			}
		});
	}else if(data == 'facebook'){
		var input = parent.find('.id').val();
		showLoader(col);
		$.ajax({
			url: "{{url('kukaradmin/saveinputcat')}}",
			data: {column:col,key:item,data:input,cat:data},
			dataType: "json",
			cache: false,
			success: function(data){
				if(data.status == 'error'){
					alert(data.message);
				}
				hideLoader();
			}
		});
	}
	
	
}

// hapus widged
	function hapus(e){
		var widget = $(e.target).parent().parent();
		var parentid = widget.parent().attr('id');
		var parent = widget.parent();
		var all = parent.children('.box').map(function(){ return this.id}).get();
		var widgetid = widget.attr('id');
		var page_display = $('#page-display').val();
		all = $.grep(all, function(value){
			return value != widgetid;
		});
		showLoader(parentid);
	    $.ajax({
	    	url: "{{url('kukaradmin/deletewidget')}}",
	    	data: {column: parentid, all:all, widgetid:widgetid,page:page_display},
	    	dataType: 'json',
	    	cache: false,
	    	success: function(data){
				widget.remove();
				hideLoader();	
	    	}
	    });
	}

	$( function() {
	    $( ".boc930" ).sortable({
	        connectWith: ".boc930",
	        handle: ".box-header",
	        cancel: ".portlet-toggle",
	        placeholder: "portlet-placeholder ui-corner-all",
	        sort: function(event, ui) {
                var $target = $(event.target);
                if (!/html|body/i.test($target.offsetParent()[0].tagName)) {
                    var top = event.pageY - $target.offsetParent().offset().top - (ui.helper.outerHeight(true) + -30);
                    ui.helper.css({'top' : top + 'px'});
                }
            },
            start: function(event, ui) {
            	var awal = $(event.target).attr('id');
            	var items = ui.item.index();
            	var allstart = $(this).children('.box').map(function(){ return this.id}).get();
            	var index = ui.item.index();
            	ui.item.data('awal', awal);
            	ui.item.data('allstart', allstart);

            	ui.item.data('index', index);
            },
            receive: function(event, ui) {
            	var start = ui.item.data('awal');
            	var allstart = ui.item.data('allstart');
            	var item = $(ui.item).attr('id');
            	var target = $(this).attr('id');
            	var all = $(this).children('.box').map(function(){ return this.id}).get();
            	var page_display = $('#page-display').val();
            	
            	ui.item.data('target', target);
            	
            	allstart = $.grep(allstart, function(value){
	            	return value != item;
	            });
	            showLoader(target);

            	$.ajax({
            		url: "{{url('kukaradmin/changeplace')}}",
            		data: {column:target, id:item, start:start, all:all, allstart:allstart, page:page_display},
            		dataType: 'json',
					cache: false,
            		success: function(data){
            			if(data.result == 'success'){
            				hideLoader();
            			}
            		}
            	});
            },
            stop: function(event, ui) {
            	var target = ui.item.data('target');
            	var ind = ui.item.data('index');
            	var index = ui.item.index();
            	var parent = $(this).attr('id');
            	var all = $(this).children('.box').map(function(){ return this.id}).get();
            	var page_display = $('#page-display').val();
            	
            	if( index != ind) {
            		if(target == parent || target == undefined){
            			showLoader(parent);
            			$.ajax({
		            		url: "{{url('kukaradmin/changenumber')}}",
		            		data: {column:parent, all:all, page:page_display},
		            		dataType: 'json',
							cache: false,
		            		success: function(data){
		            			if(data.result == 'success'){
		            				hideLoader();
		            			}
		            		}
		            	});
            		}
            	}
            },
	    });

		$(".box-default");
	 
	    $( ".portlet" )
	      	.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
	      	.find( ".box-header" )
	        .addClass( "ui-widget-header ui-corner-all" )
	        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	 
	    $( ".portlet-toggle" ).on( "click", function() {
	      	var icon = $( this );
	      	icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
	      	icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
	    });
	 });
	$( function() {
	    $( ".boc" ).sortable({
	        connectWith: ".boc",
	        handle: ".box-header",
	        cancel: ".portlet-toggle",
	        placeholder: "portlet-placeholder ui-corner-all",
	        sort: function(event, ui) {
                var $target = $(event.target);
                if (!/html|body/i.test($target.offsetParent()[0].tagName)) {
                    var top = event.pageY - $target.offsetParent().offset().top - (ui.helper.outerHeight(true) + -30);
                    ui.helper.css({'top' : top + 'px'});
                }
            },
            start: function(event, ui) {
            	var awal = $(event.target).attr('id');
            	var items = ui.item.index();
            	var allstart = $(this).children('.box').map(function(){ return this.id}).get();
            	var index = ui.item.index();
            	ui.item.data('awal', awal);
            	ui.item.data('allstart', allstart);

            	ui.item.data('index', index);
            },
            receive: function(event, ui) {
            	var start = ui.item.data('awal');
            	var allstart = ui.item.data('allstart');
            	var item = $(ui.item).attr('id');
            	var target = $(this).attr('id');
            	var all = $(this).children('.box').map(function(){ return this.id}).get();
            	var page_display = $('#page-display').val();
            	
            	ui.item.data('target', target);
            	
            	allstart = $.grep(allstart, function(value){
	            	return value != item;
	            });
	            showLoader(target);

            	$.ajax({
            		url: "{{url('kukaradmin/changeplace')}}",
            		data: {column:target, id:item, start:start, all:all, allstart:allstart, page:page_display},
            		dataType: 'json',
					cache: false,
            		success: function(data){
            			if(data.result == 'success'){
            				hideLoader();
            			}
            		}
            	});
            },
            stop: function(event, ui) {
            	var target = ui.item.data('target');
            	var ind = ui.item.data('index');
            	var index = ui.item.index();
            	var parent = $(this).attr('id');
            	var all = $(this).children('.box').map(function(){ return this.id}).get();
            	var page_display = $('#page-display').val();
            	
            	if( index != ind) {
            		if(target == parent || target == undefined){
            			showLoader(parent);
            			$.ajax({
		            		url: "{{url('kukaradmin/changenumber')}}",
		            		data: {column:parent, all:all, page:page_display},
		            		dataType: 'json',
							cache: false,
		            		success: function(data){
		            			if(data.result == 'success'){
		            				hideLoader();
		            			}
		            		}
		            	});
            		}
            	}
            },
	    });
	 
	    $( ".portlet" )
	      	.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
	      	.find( ".box-header" )
	        .addClass( "ui-widget-header ui-corner-all" )
	        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	 
	    $( ".portlet-toggle" ).on( "click", function() {
	      	var icon = $( this );
	      	icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
	      	icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
	    });
	 });
	
	
	// autocomplete for ads
	function autoComplete(e){
  		var target = $(e.target).parent().children('.imun');
  		$( '.banner' ).autocomplete({
	      source: "{{url('kukaradmin/setsearch')}}",
	      minLength: 2,
	      select: function(event, ui){
	      	$(target).val(ui.item.id);
	      }
	    });
  	}

  	function autoCompleteCategory(e){
  		var target = $(e.target).parent().children('.imun');
  		$(e.target).autocomplete({
  			source: "{{url('kukaradmin/setcategorysearch')}}",
  			minLength: 1,
		    select: function(event, ui){
		      	$(target).val(ui.item.id);
		    }
  		});
  	}

</script>
<script>

  
</script>

@endsection

@endsection