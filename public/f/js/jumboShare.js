(function($){
    $.fn.jumboShare = function( options ) {
        var rand = Math.floor((Math.random() * 1000) + 1);
        var settings = $.extend({
            // These are the defaults.
            url:window.location.href,
            text:document.title,
            twitterUsername:"mycodingtricks",
            id: rand,
            total: 0,
            position: 'prepend' //append|prepend
        }, options );
        // Greenify the collection based on the settings variable.
        this.each(function(){
          var elem = $(this);
          switch(settings.position){
              case 'append':
                  elem.append(init());
                  break;
              default: 
                  elem.prepend(init());
                  break;
          }
          $.getScript("//assets.pinterest.com/js/pinit.js");
          getCount();
        });
        function init(){
         var code = "<div class='mct_jumboShare' id='jumboShare_"+settings.id+"'>"+
            "<div class='mct_jumboShare_container'>"+
               "<div class='mct_jumboShare_counter' id='jumboShare_counter_"+settings.id+"'>"+
                  "0"+
               "</div>"+
               "<div class='mct_jumboShare_buttons' id='jumboShare_buttons_"+settings.id+"'>"+
                "<a target=_blank rel=nofollow href='https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(settings.url)+"&t="+encodeURI(settings.text)+"' class='jumboShare_btn facebook' title='Share ke Facebook'><i class='fa fa-facebook pull-left'></i></a>"+
                "<a target=_blank rel=nofollow href='https://twitter.com/intent/tweet?via="+settings.twitterUsername+"&url="+encodeURIComponent(settings.url)+"&text="+encodeURI(settings.text)+"' class='jumboShare_btn twitter' title='Share ke Twitter'><i class='fa fa-twitter pull-left'></i></a>"+
                "<a target=_blank rel=nofollow href='https://plus.google.com/share?url="+encodeURIComponent(settings.url)+"' title='Share ke Google+'><i class='fa fa-google-plus pull-left'></i></a>"+
                "<a target=_blank rel=nofollow href='whatsapp://send?text="+encodeURIComponent(settings.url)+"'><i class='fa fa-whatsapp pull-left'></i></a>"+
            "</div>"+
             "</div>";
          return code;
        }
        function convertNumber(n){
            if(n>=1000000000) return (n/1000000000).toFixed(1)+'G';
            if(n>=1000000) return (n/1000000).toFixed(1)+'M';
            if(n>=1000) return (n/1000).toFixed(1)+'K';
            return n;
        }
        function add(n){
            settings.total = settings.total+n;
        }
        function updateCounter(){
          $("#jumboShare_counter_"+settings.id).html(convertNumber(settings.total)+"<div>SHARES</div>").fadeIn();
        }
        function getCount(){
            var $this = this;
            $.getJSON('http://cdn.api.twitter.com/1/urls/count.json?url='+encodeURIComponent(settings.url)+'&callback=?',function(d){
                add(d.count);
                updateCounter();
            });
            /*$.getJSON("https://api.bufferapp.com/1/links/shares.json?callback=?&url="+encodeURIComponent(settings.url),function(data){
                add(data.shares);
                updateCounter();
            });*/
            $.getJSON('https://api.facebook.com/method/fql.query?format=json&query=SELECT+total_count+FROM+link_stat+WHERE+url+%3D+%27'+encodeURIComponent(settings.url)+'%27&callback=?',function(d){
                add(d[0].total_count);
                updateCounter();
            });
            /*$.getJSON("https://www.linkedin.com/countserv/count/share?url="+encodeURIComponent(settings.url)+"&format=jsonp&callback=?", function(data) {
                add(data.count);
                updateCounter();
            });
            $.getJSON("http://api.pinterest.com/v1/urls/count.json?callback=?&url="+encodeURIComponent(settings.url),function(data){
                add(data.count);
                updateCounter();
            });*/
            var GooglePlusdata = {
                "method":"pos.plusones.get",
                "id":settings.url,
                "params":{
                    "nolog":true,
                    "id":settings.url,
                    "source":"widget",
                    "userId":"@viewer",
                    "groupId":"@self"
                },
                "jsonrpc":"2.0",
                "key":"p",
                "apiVersion":"v1"
            };
            $.ajax({
                type: "POST",
                url: "https://clients6.google.com/rpc",
                processData: true,
                contentType: 'application/json',
                cache:true,
                data: JSON.stringify(GooglePlusdata),
                success: function(r){
                    add(r.result.metadata.globalCounts.count);
                    updateCounter();
                }
            });
        }
        return this;
    };
 
}(jQuery));
