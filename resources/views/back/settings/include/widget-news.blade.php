<?php 
$setting = App\Setting::where('key', 'widget-news')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
$category = App\Category::whereId($side['id'])->first();
?>

<div class="box box-default collapsed-box box-solid" id="widget-news-{{$value}}" data-widget="category">
	<div class="box-header with-border">
		<h5 class="box-title">Widget News</h5> 
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>
		</div>
	</div>
	<div class="box-body">
		<h5>Judul</h5>
		<input type="text" name="title" value="{{$side['title']}}" class="title form-control">
		<label for="banner">Cari Kategori: </label>
		<div class="category">
			@if($side['id'] != '')
		    <input class="form-control" type="text" value="{{$category->title}}" onClick="return autoCompleteCategory(event)" onKeyUp="return delIdBanner(event)">
			<input type="hidden" value="{{$category->id}}" class="imun form-control">
			@else
			<input class="form-control" type="text" value="" onClick="return autoCompleteCategory(event)" onKeyUp="return delIdBanner(event)">
			<input type="hidden" value="" class="imun form-control">
			@endif
		</div>
		<h5>Jumlah</h5>
		<input type="text" name="count" value="{{$side['count']}}" class="count form-control" placeholder="Gunakan angka, ex: 10">
	</div>
	<div class="box-footer">
		<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>
		<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>
	</div> 
</div>