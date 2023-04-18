	function showLoader(id)
	{
		if(id == 'ads-bottom-head'){
	        $('.ads-bottom-head').show();
	    }else if(id == 'ads-middle'){
	       	$('.ads-middle').show();
	    }else if(id == 'sidebar-left'){
	        $('.sidebar-left').show();
	    }else if(id == 'sidebar-300'){
	       	$('.sidebar-300').show();
	    }else if(id == 'col-area-3'){
	       	$('.col-area-3').show();
	    }else if(id == 'col-area-4'){
	       	$('.col-area-4').show();
	    }else if(id == 'sidebar'){
	       	$('.widget-sidebar').show();
	    }else if(id == 'ads-top'){
	       	$('.ads-top').show();
	    }
	}
	function hideLoader()
	{
		$('.ads-bottom-head').hide();
        $('.ads-middle').hide();
        $('.sidebar-left').hide();
        $('.sidebar-300').hide();
        $('.col-area-3').hide();
		$('.col-area-4').hide();
		$('.widget-sidebar').hide();
		$('.ads-top').hide();
	}
	
// Script iklan
	function change(e){
		$('.format-id').on('change', function (e) {
			var val = $(this).val();
			var parent = $(e.target).parent().parent();
			if(val == 'choose'){
				parent.children('.search').show();
				parent.children('.tambah').show();
				parent.children('.info-id').show();
				parent.children('.info-teks').hide();
				parent.children('.teks').hide();
			}else if(val == 'text'){
				parent.children('.search').hide();
				parent.children('.tambah').hide();
				parent.children('.info-id').hide();
				parent.children('.info-teks').show();
				if(parent.children().find('textarea').length){
					parent.children('.teks').show();
				}else{
					parent.children('.teks').append('<textarea style="width:100%; margin-top:10px" name="" rows="10"></textarea>');
				}
			}
		});
	}
	// delete id of ads
	function deleteForm(e){
		var parent = $(e.target).parent();
			parent.remove();
	}
	// add id of ads
	function tambah(e){
		var parent = $(e.target).parent();
			parent.children('.search').append('<div class="naik"><input style="width:85%; float:left" class="banner form-control" type="text" value="" onClick="return autoComplete(event)"><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button><input type="hidden" name="banner" value="" class="imun form-control"></div>');
	}
	

	function widgetAds(targetid, id)
	{
		var str = id.lastIndexOf('-'),
		 	res = id.substr(0,str),
			rss = res.replace('ads', 'Iklan'),
			name = rss.replace(/-/g, " ");

		var ads930 = '';
			ads930 += '<div class="box box-default box-solid" id="'+id+'" data-widget="ads">';
			ads930 += '<div class="box-header with-border">'
			ads930 += '<h5 class="box-title">'+name+'</h5>';
			ads930 += '<div class="box-tools pull-right">';
			ads930 += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			ads930 += '</div></div>';
			ads930 += '<div class="box-body">';
			ads930 += '<div class="col-sm-12">';
			ads930 += 'Format Input Iklan';
			ads930 += '<div class="clearfix"></div>';
			ads930 += '<select name="" class="format-id form-control" onClick="return change(event)">';
			ads930 += '<option value="choose">Dipilih</option>';
			ads930 += '<option value="text" selected>Teks</option>';
			ads930 += '</select>';
			ads930 += '</div>';
			ads930 += '<div class="teks">';
			ads930 += '<textarea style="width:100%; margin-top:10px" name="" rows="10"></textarea>';
			ads930 += '</div>';
			ads930 += '<div style="display:none" class="ui-widget search"><label for="banner">Cari Iklan: </label>';
			ads930 += '<div class="naik"><input style="width:85%; float:left" class="banner form-control" type="text" value="" onClick="return autoComplete(event)" onKeyUp="return delIdBanner(event)"><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button>';
			ads930 += '<input type="hidden" name="banner" value="" class="imun form-control"></div></div>';
			ads930 += '<button class="btn btn-default btn-xs tambah pull-left" onClick="return tambah(event)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Input</button>';
			ads930 += '<p class="info-id" style="margin-top: 15px; float:left">*Apabila iklan dipilih lebih dari satu atau format semua, maka iklan yang tampil akan random atau acak.</p>';
			ads930 += '<p class="info-teks hided" style="margin-top: 15px; float:left">*Penggunaan teks untuk Adsense dan lainnya.</p>';
			ads930 += '</div>';
			ads930 += '<div class="box-footer">';
			ads930 += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			ads930 += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>';
			ads930 += '</div>';
		$(targetid).append(ads930);
	}

	function widgetsocial(targetid, id)
	{
		var str = id.lastIndexOf('-');
		var res = id.substr(0,str);
		var name = res.replace(/-/g, " ");
		if(res == 'widget-social'){
			var des = '<p>*Pengisian data facebook, twitter, google plus, dan istagram berada di halaman pengaturan. Disini hanya penempatannya saja.</p>';
		}else if(res == 'widget-kecamatan'){
			var des = '<p>*Widget Kecamatan untuk menampilkan semua kecamatan pada Kategori Kecamatan.</p>';
		}
		var widget = '';
			widget += '<div class="box box-default box-solid" id="'+id+'">';
			widget += '<div class="box-header with-border">'
			widget += '<h5 class="box-title">'+name+'</h5>';
			widget += '<div class="box-tools pull-right">';
			widget += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			widget += '</div></div>';
			widget += '<div class="box-body">';
			widget += des;
			widget += '</div>';
			widget += '<div class="box-footer">';
			widget += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			widget += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right">Simpan</a>';
			widget += '</div>';
		targetid.append(widget);
	}

	function widgetCategory(targetid, id)
	{
		var str = id.lastIndexOf('-');
		var res = id.substr(0,str);
		var name = res.replace(/-/g, " ");
		var widget = '';
			widget += '<div class="box box-default box-solid" id="'+id+'" data-widget="category">';
			widget += '<div class="box-header with-border">';
			widget += '<h5 class="box-title">'+name+'</h5>';
			widget += '<div class="box-tools pull-right">';
			widget += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			widget += '</div></div>';
			widget += '<div class="box-body"><h5>Judul</h5><input type="text" name="title" value="" class="title form-control">';
			widget += '<label for="banner">Cari Kategori: </label>';
			widget += '<div class="category">';
			widget += '<input class="form-control" type="text" value="" onClick="return autoCompleteCategory(event)" onKeyUp="return delIdBanner(event)">';
			widget += '<input type="hidden" value="" class="imun form-control"></div><h5>Jumlah</h5>';
			widget += '<input type="text" name="count" value="" class="count form-control" placeholder="Gunakan angka, ex: 10">';
			widget += '</div>';
			widget += '<div class="box-footer">';
			widget += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			widget += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>';
			widget += '<div class="box-footer">';
			widget += '</div></div>';
		targetid.append(widget);
	}

	function widgetPopuler(targetid, id)
	{
		var widget = '';
			widget += '<div class="box box-default box-solid" id="'+id+'" data-widget="category">';
			widget += '<div class="box-header with-border">';
			widget += '<h5 class="box-title">Widget List Populer</h5>';
			widget += '<div class="box-tools pull-right">';
			widget += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			widget += '</div></div>';
			widget += '<div class="box-body"><h5>Judul</h5><input type="text" name="title" value="" class="title form-control">';
			widget += '<h5>Jumlah</h5>';
			widget += '<input type="text" name="count" value="" class="count form-control" placeholder="Gunakan angka, ex: 10">';
			widget += '</div>';
			widget += '<div class="box-footer">';
			widget += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			widget += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>';
			widget += '<div class="box-footer">';
			widget += '</div></div>';
		targetid.append(widget);
	}

	function widgetImagesNews(targetid, id)
	{
		var widget = '';
			widget += '<div class="box box-default box-solid" id="'+id+'" data-widget="category">';
			widget += '<div class="box-header with-border">';
			widget += '<h5 class="box-title">Widget List Images</h5>';
			widget += '<div class="box-tools pull-right">';
			widget += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			widget += '</div></div>';
			widget += '<div class="box-body"><input type="hidden" name="title" value="" class="title form-control">';
			widget += '<h5>Jumlah per Tab</h5>';
			widget += '<input type="text" name="count" value="" class="count form-control" placeholder="Gunakan angka, ex: 10"><p>*Akan Menampilkan 2 Tab, Artikel Terpopuler dan Terbaru</p>';
			widget += '</div>';
			widget += '<div class="box-footer">';
			widget += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			widget += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>';
			widget += '<div class="box-footer">';
			widget += '</div></div>';
		targetid.append(widget);
	}

	function widgetFacebook(targetid, id)
	{
		var widget = '';
			widget += '<div class="box box-default box-solid" id="'+id+'" data-widget="facebook">';
			widget += '<div class="box-header with-border">';
			widget += '<h5 class="box-title">Widget Facebook Fans Like</h5>';
			widget += '<div class="box-tools pull-right">';
			widget += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button>';
			widget += '</div></div>';
			widget += '<div class="box-body">';
			widget += '<h5>Nama Facebook Fanspage</h5>';
			widget += '<input type="text" name="id" value="" class="id form-control" placeholder="Hanya namanya saja. ex: mitrakukar">';
			widget += '</div>';
			widget += '<div class="box-footer">';
			widget += '<a href="javascript: void[0]" class="hapus pull-left" style="color:red;" onClick="return hapus(event)">Hapus</a>';
			widget += '<a href="javascript: void[0]" class="btn btn-default btn-sm pull-right" onClick="return simpan(event)">Simpan</a>';
			widget += '<div class="box-footer">';
			widget += '</div></div>';
		targetid.append(widget);
	}