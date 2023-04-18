<?php 
$setting = App\Setting::where('key', 'ads-300')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
?>

@if($side['format'] == 'choose')
<?php $banners = App\Banner::withDrafts()->where('startdate', '<', $carbon->now())->where('enddate','>', $carbon->now())->whereIn('id', $side['id'])->get(); ?>


								@if($banners->count() > 0)	
								
									<div class="box box-default collapsed-box box-solid" id="ads-300-{{$value}}" data-widget="ads">
							            <div class="box-header with-border">
							              	<h5 class="box-title">Iklan 300</h5> 

							              	<div class="box-tools pull-right">
							                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>
							              	</div>
							            </div>
							            <div class="box-body">
							            	<input type="hidden" value="" id="type">
							            	<div class="col-sm-12">
							              		Format Input Iklan
							              		<div class="clearfix"></div>
							              		<select name="" class="format-id form-control" onClick="return change(event)">
							              			<option value="choose" {{$side['format']=='choose'?'selected':''}}>Dipilih</option>
							              			<option value="text" {{$side['format']=='text'?'selected':''}}>Teks</option>
							              		</select>
							              	</div>
							              	
							              	<div class="teks">

							              	</div>
							              	
							              	<div class="ui-widget search">
											  <label for="banner">Cari Iklan: </label>
											  @foreach($banners as $banner)
											  <div class="naik">
												  <input style="width:85%; float:left" class="banner form-control" type="text" value="{{$banner->title}}" onClick="return autoComplete(event)" onKeyUp="return delIdBanner(event)"><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button>
												  <input type="hidden" name="banner" value="{{$banner->id}}" class="imun form-control">
											  </div>
											  @endforeach
											</div>
											
											<button class="btn btn-default btn-xs tambah pull-left" onClick="return tambah(event)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Input</button>
							              	<p class="info-id" style="margin-top: 15px; float:left">*Apabila iklan dipilih lebih dari satu atau format semua, maka iklan yang tampil akan random atau acak.</p>
							              	<p class="info-teks hided" style="margin-top: 15px; float:left">*Penggunaan teks untuk Adsense dan lainnya.</p>
							              	
							            </div>
							            <div class="box-footer">
							            	<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>
							            	<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>
							            </div> 
							        </div>
							    
							    @endif
@else
								<div class="box box-default collapsed-box box-solid" id="ads-300-{{$value}}" data-widget="ads">
							            <div class="box-header with-border">
							              	<h5 class="box-title">Iklan 300</h5> 

							              	<div class="box-tools pull-right">
							                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>
							              	</div>
							            </div>
							            <div class="box-body">
							            	<div class="col-sm-12">
							              		Format Input Iklan
							              		<div class="clearfix"></div>
							              		<select name="" class="format-id form-control" onClick="return change(event)">
							              			<option value="choose" {{$side['format']=='choose'?'selected':''}}>Dipilih</option>
							              			<option value="text" {{$side['format']=='text'?'selected':''}}>Teks</option>
							              		</select>
							              	</div>
							              	
							              	<div class="teks">
							              		<textarea style="width:100%; margin-top:10px" name="" rows="10">{{$side['id']}}</textarea>
							              	</div>
							              	
							              	<div style="display:none;" class="ui-widget search">
											  <label for="banner">Cari Iklan: </label>
											  <div class="naik">
												  <input style="width:85%; float:left" class="banner form-control" type="text" value="" onClick="return autoComplete(event)" onKeyUp="return delIdBanner(event)"><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button>
												  <input type="hidden" name="banner" value="" class="imun form-control">
											  </div>
											</div>
											
											<button class="btn btn-default btn-xs tambah pull-left" onClick="return tambah(event)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Input</button>
							              	<p class="info-id" style="margin-top: 15px; float:left">*Apabila iklan dipilih lebih dari satu atau format semua, maka iklan yang tampil akan random atau acak.</p>
							              	<p class="info-teks hided" style="margin-top: 15px; float:left">*Penggunaan teks untuk Adsense dan lainnya.</p>
							              	
							            </div>
							            <div class="box-footer">
							            	<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>
							            	<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>
							            </div> 
							        </div>
@endif									



