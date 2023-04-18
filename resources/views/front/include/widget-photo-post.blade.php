<?php 
$setting = App\Setting::where('key', 'widget-photo-post')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

$s = $side['id'];
$c = App\Category::find($s);
$post = App\Post::whereHas('category', function($q) use ($s) {
  $q->whereId($s);
})->take($side['count'])->orderBy('id','desc')->get(); 
?>
      <div class="widget photo-post">
        <h2 class="widget-title" {{!empty($c->color)?'style=background-color:#'.$c->color:''}}><span class="icon-images pull-left"></span> 
          @if($side['title'] != '')
            {{$side['title']}}
          @else
            {{$c->title}}
          @endif
        </h2>
        <ul class="list-unstyled">
          @foreach($post as $p)
          <li>
            <div class="item clearfix">
                @if($p->image != '' || $p->image != null)
                <a href="{{url($p->slug)}}">
                  @desktop
                  <img src="{{asset('img/news/250x210/'.$p->image)}}" alt="" />
                  @elsedesktop
                  <img src="{{asset('img/news/80x80/'.$p->image)}}" alt="" />
                  @enddesktop
                </a>
                @endif
                <div class="item-content">
                  <header class="header-item">
                    <!--span class="icon-image pull-left"></span-->
                    <div class="item-right">
                      <h4><a href="{{url($p->slug)}}">{{$p->title}}</a></h4>
                      <ul class="list-inline kp-metadata clearfix">
                      <!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
                      <li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($p->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
                    </ul>
                    </div>
                  </header>
                </div>
              </div>
              <!-- item -->
          </li>
          @endforeach
          
        </ul>
      </div>