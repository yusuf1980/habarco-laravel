			<?php $imager = ['how-to-read-people-body-language-quiz-1-56156-l-140x140.png',
									'einstein.jpg',
									'download.jpg',
									'aHR0cDovL2ltZy5jY3JkLmNsZWFyY2hhbm5lbC5jb20vbWVkaWEvbWxpYi8zNjc0LzIwMTYvMDEvZGVmYXVsdC9ncmFjZW1pdGNoZWxsXzBfMTQ1MjAxNTM4My5qcGc=.jpg',
									'140.jpg',
									'maximiliansan_1428807503_140.jpg',
									'mcx23k1w5rvaul4h_140.jpg',
									'nature-wallpapers-hd-438034-l-140x140.png',
									'140x140xbeyonce.jpg.pagespeed.ic.C0uDBiACqu.jpg',
									'guessthemovie119.jpg',
									'3715339552054040_4.jpg',
									'LN_474686_BP_9.jpg',
									'sby-140x140.jpg',
									'a471596d-58a9-4ab8-8929-f5d560b29027_11.jpg',
									'imgad.jpg',
									'49445065-ba55-4d46-a12c-2fb586e73c92_11.jpg',
									'baa20708-e1e7-4c4f-a56d-4a7e770679c8_11.jpg',
									'47295cae-9a20-45d9-ade4-4dd90d794b65_11.jpg',
									'b2fce369-9fed-4b46-8bd7-9b23aeffb7d4_11.jpg',
									'c5e4c238-c9f8-4337-816b-8e29b81efdd5_11.jpg',
									'61c3d85d-d6b0-4bd6-b9eb-bfdd675079ea_11.jpg'
									];
					
					?>
					@foreach($posts as $p)
					<?php
						$d = strip_tags($p->description);
						if(strlen($d) >= 220) {
							$d = strip_tags($d);
							$desc = strpos($d, ' ', 190);
							$desc = substr($d, 0, $desc);
						}else {
							$desc = $d;
						}
						
					?>
					<li class="item">
						<article class="entry-item">
							<div class="entry-thumb">
								<a href="{{url($p->slug)}}">
									@if($p->image != '' || $p->image != null)
									@desktop
										<img src="{{asset('img/news/140x140/'.$p->image)}}" alt="">
									@elsedesktop
										<img src="{{asset('img/news/80x80/'.$p->image)}}" alt="">
									@enddesktop
									@endif
								</a>
							</div>
							<div class="entry-content">
								<h4 class="entry-title">
									<a href="{{url($p->slug)}}">
									 	{{$p->title}}
									</a>
								</h4>
								<span class="ket">
									<?php $c = $p->category->first(); 
										  $carb = $carbon::createFromTimeStamp(strtotime($p->created_at));
									?>
									{{$c->title--}} | {{ $carb->formatLocalized('%A, %d %B %Y') }} {{$carb->format('H:i')}} 
								</span>
								<p>
									{{$desc}} ...
								</p>
							</div>
						</article>
					</li>
					@endforeach