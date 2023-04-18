<?php 
$setting = App\Setting::where('key', 'widget-list-populer')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
?>

<div class="box box-default collapsed-box box-solid" id="widget-list-populer-{{$value}}" data-widget="populer">
	<div class="box-header with-border">
		<h5 class="box-title">Widget List Populer</h5> 
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>
		</div>
	</div>
	<div class="box-body">
		<h5>Judul</h5>
		<input type="text" name="title" value="{{$side['title']}}" class="title form-control">
		<h5>Jumlah</h5>
		<input type="text" name="count" value="{{$side['count']}}" class="count form-control" placeholder="Gunakan angka, ex: 10">
	</div>
	<div class="box-footer">
		<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>
		<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>
	</div> 
</div>