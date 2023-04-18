<?php 
$setting = App\Setting::where('key', 'widget-facebook')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
?>

<div class="box box-default collapsed-box box-solid" id="widget-facebook-{{$value}}" data-widget="facebook">
	<div class="box-header with-border">
		<h5 class="box-title">Widget Facebook Fans Like</h5> 
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>
		</div>
	</div>
	<div class="box-body">
		<h5>Nama Facebook Fanspage</h5>
		<input type="text" name="id" value="{{$side['id'] !== ''? $side['id']: ''}}" class="id form-control" placeholder="Hanya namanya saja. ex: mitrakukar">
	</div>
	<div class="box-footer">
		<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>
		<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>
	</div> 
</div>